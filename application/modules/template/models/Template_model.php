<?php defined('BASEPATH') or exit('No direct script access allowed');
#------------------------------------    
# Author: Bdtask Ltd
# Author link: https://www.bdtask.com/
# Dynamic style php file
# Developed by :Isahaq
#------------------------------------    

class Template_model extends CI_Model
{

    public function setting()
    {
        return $this->db->get('web_setting')->row();
    }

  public function bdtask_company_info()
{
    $encryption_key = Config::$encryption_key;
    
    $query = "SELECT 
        company_id,
        CAST(AES_DECRYPT(company_name, '{$encryption_key}') AS CHAR) AS company_name,
        CAST(AES_DECRYPT(email, '{$encryption_key}') AS CHAR) AS email,
        CAST(AES_DECRYPT(address, '{$encryption_key}') AS CHAR) AS address,
        CAST(AES_DECRYPT(mobile, '{$encryption_key}') AS CHAR) AS mobile,
        CAST(AES_DECRYPT(website, '{$encryption_key}') AS CHAR) AS website,
        CAST(AES_DECRYPT(vat_no, '{$encryption_key}') AS CHAR) AS vat_no,
        CAST(AES_DECRYPT(cr_no, '{$encryption_key}') AS CHAR) AS cr_no,
        instance_type,
        status
    FROM company_information
    WHERE status = 1";
    
    return $this->db->query($query)->result_array();
}

    public function bdtask_bank_list()
    {
        $this->db->select('*');
        $this->db->from('bank_add');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    public function out_of_stock_count()
    {
        $encryption_key = Config::$encryption_key;

        $raw_sql = "
            SELECT
                CAST(pi.max_stock_level     AS DECIMAL(18,4)) AS max_stock_level,
                CAST(pi.min_stock_level     AS DECIMAL(18,4)) AS min_stock_level,
                CAST(pi.reorder_stock_level AS DECIMAL(18,4)) AS reorder_stock_level,
                CAST(pi.reserve_stock_level AS DECIMAL(18,4)) AS reserve_stock_level,
                IFNULL(SUM(AES_DECRYPT(sd.stock, '$encryption_key')), 0) AS master_stock_qty
            FROM stock_details sd
            INNER JOIN product_information pi ON pi.id = CAST(sd.product AS UNSIGNED)
            WHERE pi.status = 1
            GROUP BY pi.id
        ";

        $with_status_sql = "
            SELECT
                CASE
                    WHEN master_stock_qty <= reserve_stock_level                                                                     THEN 'Out of Stock'
                    WHEN master_stock_qty <= GREATEST(reorder_stock_level, reserve_stock_level)                                      THEN 'Reorder'
                    WHEN master_stock_qty <= GREATEST(min_stock_level, reorder_stock_level, reserve_stock_level)                     THEN 'Near Order'
                    WHEN master_stock_qty <= GREATEST(max_stock_level, min_stock_level, reorder_stock_level, reserve_stock_level)    THEN 'Sufficient Stock'
                    ELSE 'Overstock'
                END AS status
            FROM ($raw_sql) AS raw_data
        ";

        $result = $this->db->query(
            "SELECT COUNT(*) AS cnt FROM ($with_status_sql) AS s WHERE s.status != 'Sufficient Stock'"
        )->row_array();

        return isset($result['cnt']) ? (int)$result['cnt'] : 0;
    }

    public function expiry_alert_count()
    {
        $encryption_key = Config::$encryption_key;

        $setting = $this->db->select('COALESCE(expiry_alert_days,0) AS expiry_alert_days', false)
            ->from('web_setting')
            ->order_by('setting_id', 'asc')
            ->limit(1)
            ->get()
            ->row();

        $expiry_alert_days = isset($setting->expiry_alert_days) ? (int)$setting->expiry_alert_days : 0;

        $this->db->select("
            sb.id,
            sb.edate,
            (
                SELECT IFNULL(SUM(CAST(AES_DECRYPT(sd.stock, '{$encryption_key}') AS DECIMAL(18,4))), 0)
                  FROM stock_details sd
                 WHERE sd.product = sb.product AND sd.batch = sb.id
            ) + (
                SELECT IFNULL(SUM(CAST(AES_DECRYPT(pd.stock, '{$encryption_key}') AS DECIMAL(18,4))), 0)
                  FROM phystock_details pd
                 WHERE pd.product = sb.product AND pd.batch = sb.id
            ) AS master_stock_qty
        ", false);
        $this->db->from('stockbatch sb');
        $this->db->where('sb.busage', 'single');
        $this->db->where('sb.status', 1);
        $this->db->where('sb.edate IS NOT NULL', null, false);
        $this->db->where('sb.edate !=', '0000-00-00');

        $rows = $this->db->get()->result_array();
        $today = date('Y-m-d');
        $count = 0;

        foreach ($rows as $row) {
            if (empty($row['edate'])) {
                continue;
            }

            $expiry_date = date('Y-m-d', strtotime($row['edate']));
            if (!$expiry_date) {
                continue;
            }

            $master_stock_qty = (float)$row['master_stock_qty'];

            $is_expired = (strtotime($today) >= strtotime($expiry_date));
            $alert_start = date('Y-m-d', strtotime($expiry_date . ' -' . $expiry_alert_days . ' day'));
            $is_to_be_expired = (!$is_expired && strtotime($today) >= strtotime($alert_start));

            if (($is_expired || $is_to_be_expired) && $master_stock_qty > 0) {
                $count++;
            }
        }

        return $count;
    }
}
<div class="metro-print-wrapper">
<style>
    @page {
        size: 10in 8in;
        margin: 0;
    }

    .metro-print-wrapper {
        width: 10in;
        min-height: 8in;
        box-sizing: border-box;
    }

    @media print {
        button {
            display: none;
        }

        body {
            font-family: 'Verdana', sans-serif;
            line-height: 1.5;


        }
    }


    td {
        width: 5px;
        height: 14px;
        overflow: hidden;
        padding: 0;
        border: 1px solid rgba(255, 255, 255, 0);
        /* border: 1px solid #000; */
    }

    .fixed-width2 {
        display: inline-block;
        width: 38px;
        height: 18px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 15px;
        text-align: center;
        font-weight: bold;
        font-family: 'Calibri';

    }

    .fixed-width1 {
        display: inline-block;
        width: 400px;
        height: 18px;
        overflow: hidden;
        /* text-overflow: ellipsis; */
        /* white-space: nowrap; */
        font-size: 15px;
        padding-left: 30px;
        text-align: left;
        font-weight: bold;
        font-family: 'Calibri';


    }

    .fixed-width3 {
        display: inline-block;
        width: 115px;
        height: 18px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 15px;
        padding-right: 15px;
        text-align: right;
        font-weight: bold;
        font-family: 'Calibri';



    }

    .fixed-width4 {
        display: inline-block;
        width: 215px;
        height: 18px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 15px;
        padding-left: 10px;
        text-align: right;
        font-weight: bold;
        font-family: 'Calibri';



    }


    .text-item {
        display: block;
        margin-left: 356px;
        /* Left margin for all items */
        font-size: 13px;
        /* Font size for all items */
        letter-spacing: 1px;
        /* Letter spacing for all items */
        margin-bottom: 1px;
        /* Bottom margin for spacing */
        font-family: 'Calibri';
    }

    .text-item2 {
        display: block;
        /* Left margin for all items */
        font-size: 15px;
        /* Font size for all items */
        /* Letter spacing for all items */
        margin-bottom: 3.5px;
        /* Bottom margin for spacing */
        font-family: 'Calibri';
    }
    
    .text-item20 {
        display: block;
        /* Left margin for all items */
        font-size: 10px;
        /* Font size for all items */
        /* Letter spacing for all items */
        margin-bottom: 3.5px;
        /* Bottom margin for spacing */
        font-family: 'Calibri';
    }

    .text-item3 {
        display: block;
        /* Left margin for all items */
        font-size: 14px;
        /* Font size for all items */
        /* Letter spacing for all items */
        margin-bottom: 1px;
        /* Bottom margin for spacing */
        font-family: 'Calibri';
    }

    .text-item4 {
        display: block;
        /* Left margin for all items */
        font-size: 16px;
        /* Font size for all items */
        /* Letter spacing for all items */
        margin-bottom: 3.5px;
        /* Bottom margin for spacing */
        font-family: 'Calibri';
        text-align: right;
    }
     .text-item6 {
        display: block;
        /* Left margin for all items */
        font-size: 21px;
        /* Font size for all items */
        /* Letter spacing for all items */
        margin-bottom: 3.5px;
        /* Bottom margin for spacing */
        font-family: 'Calibri';
        text-align: right;
    }

    .row-lg th {
        line-height: 19px;
    }

    .row-lg1 th {
        line-height: 52px;
    }


    .row-sm th {
        line-height: 5px;
    }

    .row-xs th {
        line-height: 9px;
    }
</style>



<button onclick="window.print()">Print This Page</button>


<!-- <span style="margin-top: 100x;"> -->
<table style="display: inline-table;margin-top: 40px; margin-left: 10px;border-collapse:collapse;vertical-align: top;">
    <tr class="row-lg">
        <th style="width: 50px;padding:0;height:5px;"></th>
        <th style="width:200px; text-align: left;padding:0;height:5px; "><span class="text-item2">
                <?php echo date("m/d/Y", strtotime($date)); ?>
            </span></th>
        <th style="width: 10px;padding:0;height:5px;"></th>
        <th style="width:20px; text-align: left;padding:0;height:5px;"><span class="text-item2">
                <?php echo $tax_invoice_id; ?>

            </span></th>
    </tr>
    <tr class="row-lg">
        <th style="width: 50px;padding:0;height:5px;"></th>
        <th style="width:200px; text-align: left;padding:0;height:5px; "></th>
        <th style="width: 10px;padding:0;height:5px;"></th>
        <th style="width:200px; text-align: left;padding:0;height:5px;">

        </th>
    </tr>
    <tr class="row-sm">
        <th style="width: 50px;padding:0;height:2px;">
            
        </th>
        <th style="width:190px; text-align: left;padding:0;height:10px; ">
             <span class="text-item2">
            <?php
        if($this->session->userdata('user_level2')!=3){
                       echo "409378773-7000";
                   }else{
                       echo ".";
                   }
        
        ?>
           
</span>
        </th>
        <th style="width: 60px;padding:0;height:10px;text-align: left;"></th>
        <th style="width:200px; text-align: left;padding:0;height:10px;">
 <?php if (!empty($tinno)) { ?>
                    <span class="text-item2">
                    <?php
                    
                    
                    
                    echo $tinno ?>
                    </span>
                <?php } else { ?>
                    <span class="text-item2" style="color: white; background-color: white;">
                        .
                    </span>
                <?php } ?>
        </th>
    </tr>
    <tr class="row-xs">
        <th style="width: 50px;"></th>
        <th style="width:200px; text-align: left; "><span class="text-item2">
        </th>
        <th style="width: 10px;text-align: left;"> <span class="text-item2"></span></th>
        <th style="width:200px; text-align: left;"><b><span class="text-item2">
                    <?php echo $customer_name ?>
                </span></b></th>
    </tr>
    <tr class="row-lg1">
        <th style="width: 80px;">.</th>
        <th style="width:190px; text-align: left; ">
        </th>
        <th style="width: 200px;"></th>
        <th style="width:200px; text-align: left;"><b><span class="text-item2">


                </span></b></th>
    </tr>
    <tr class="row-xs">
        <th style="width: 50px;"></th>
        <th style="width:200px; text-align: left; ">
        </th>
        <th style="width: 10px;"></th>
        <th style="width:200px; text-align: left;">
            <b>
                <?php if (!empty($customer_mobile)) { ?>
                    <span class="text-item2">
                        <?php echo $customer_mobile; ?>
                    </span>
                <?php } elseif (!empty($details1)) { ?>
                    <span class="text-item2">
                        <?php echo $details1; ?>
                    </span>
                <?php } else { ?>
                    <span class="text-item2" style="color: white; background-color: white;">
                        .
                    </span>
                <?php } ?>
            </b>
        </th>
    </tr>
</table>

<div style="height: 360px;margin-top:90px;">
    <?php
    $total = 0;
    foreach ($invoice_all_data as $invoice_data) { ?>
        <table style="margin-bottom: 10px;">
            <tbody>
                <tr>

                    <td style="width: 185px;height:10px;">
                        <span class="fixed-width1">
                            <?php echo $invoice_data['product_name']; ?>
                        </span>
                    </td>

                    <td style="width: 38px;height:10px;">
                        <span class="fixed-width2">
                            <?php echo number_format($invoice_data['quantity'], 0); ?> </span>
                    </td>

                    <td style="width: 80px;height:10px;">
                        <span class="fixed-width3">
                            <?php echo number_format($invoice_data['product_rate'], 2, '.', ','); ?>
                        </span>
                    </td>
                    <td style="width: 80px;height:10px;">
                        <span class="fixed-width4">
                            <?php echo number_format($invoice_data['total_price'], 2, '.', ','); ?>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php
        // $total = $invoice_data['total_price'] + $total;
    }

    ?>
</div>

<footer>

    <span>
        <table style="display: inline-table; margin-left: 10px;height:0.3px;border-spacing:0 20px;margin-top:20px">
            <tr>


                <th style="width: 620px;padding:0;height:20px;"></th>
                <th style="width:140px; text-align: left;padding:0;height:20px;"><span class="text-item4">
                        <?php echo number_format($total23, 2, '.', ','); ?>
                    </span></th>
            </tr>
               <tr>


                <th style="width: 620px;padding:0;height:20px;"></th>
                <th style="width:140px; text-align: left;padding:0;height:20px;"><span class="text-item4">
                         <?php echo number_format($total_vat_amnt, 2, '.', ','); ?>
                    </span></th>
            </tr>
               <tr>


                <th style="width: 620px;padding:0;height:20px;"></th>
                <th style="width:140px; text-align: left;padding:0;height:20px;"><span class="text-item6">
                    <span class="text-item6">
                        <?php echo number_format($grandTotal, 2, '.', ','); ?>
                    </span>
                   </th>
            </tr>

        </table>
    </span>

</footer>
</div>
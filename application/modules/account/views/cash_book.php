<!-- Cash Book -->
<style>
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
        display: none;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo $title; ?></h4>
                </div>
            </div>
            <br />
            <div class="panel-body" style="margin-left: 120px;">

                <?php
                date_default_timezone_set('Asia/Colombo');
                $today = date('Y-m-d');
                ?>

                <!-- 1. Branch -->
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <div class="input-group mr-4" style="width: 250px;">
                        <select class="form-control" id="branch" name="branch" style="width: 250px;" tabindex="1">
                        </select>
                    </div>
                </div>

                <!-- 2. Payment Nature -->
                <div class="form-group">
                    <label for="payment_nature">Payment Nature</label>
                    <div class="input-group mr-4" style="width: 250px;">
                        <select class="form-control" id="payment_nature" name="payment_nature" style="width: 250px;" tabindex="2" onchange="onNatureChange()">
                            <option value="">All Nature</option>
                            <option value="Cash Nature">Cash Nature</option>
                            <option value="Bank Nature">Bank Nature</option>
                        </select>
                    </div>
                </div>

                <!-- 3. Payment Type (filtered by Nature) -->
                <div class="form-group">
                    <label for="your_dropdown_id"><?php echo display('payment_type'); ?></label>
                    <div class="input-group mr-4" style="width: 250px;">
                        <select name="multipaytype[]" class="form-control" id="your_dropdown_id" style="width: 250px;" tabindex="3">
                            <option value="">All Payment Types</option>
                            <?php foreach ($all_pmethod as $services) { ?>
                                <option value="<?php echo $services['id']; ?>" data-nature="<?php echo htmlspecialchars($services['nature'] ?? ''); ?>"><?php echo $services['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- 4. Date Range -->
                <div class="form-group" style="margin-bottom: 10px;">
                    <input type="checkbox" id="single_date_checkbox" name="single_date_checkbox">
                    <label for="single_date_checkbox">Single Date</label>
                </div>
                <div class="form-group" style="display: flex; gap: 20px;">
                    <div>
                        <label for="from_date">From Date: </label>
                        <input type="text" name="from_date" class="form-control datepicker" id="from_date"
                            placeholder="<?php echo display('start_date') ?>" value="<?php echo $today ?>" style="width: 200px;">
                    </div>
                    <div id="to_date_container">
                        <div>
                            <label for="to_date">To Date:</label>
                            <input type="text" name="to_date" class="form-control datepicker" id="to_date"
                                placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>" style="width: 200px;">
                        </div>
                    </div>
                </div>

                <!-- 5. Password -->
                <div class="form-group">
                    <label for="password" class="mr-2 mb-0">Password</label>
                    <input type="password" tabindex="4" class="form-control" name="password" id="password" value="" style="width: 200px;" autocomplete="off">
                </div>

                <button type="button" id="btn-filter" class="btn btn-success" onclick="onFilterButtonClick()">
                    Generate Report
                </button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="baseUrl2" id="baseUrl2" class="baseUrl" value="<?php echo base_url(); ?>" />
<?php
echo "<script>";
echo "let password_enable=" . json_encode($this->session->userdata('password_enable')) . ";";
echo "let usertype=" . json_encode($this->session->userdata('user_level2')) . ";";
echo "</script>";
?>
<script src="<?php echo base_url('my-assets/js/admin_js/sales_report.js') ?>" type="text/javascript"></script>
<script>
    var allPaymentMethods = <?php echo json_encode(array_map(function($s) {
        return ['id' => $s['id'], 'name' => $s['name'], 'nature' => $s['nature'] ?? ''];
    }, $all_pmethod ?: [])); ?>;

    let type2 = '';
    let type  = "";

    $(document).ready(function() {
        getBranchDropdown(0);
        type2 = (usertype == 3) ? "B" : "A";
    });

    function getBranchDropdown(branchId) {
        var base_url = $('#base_url').val();
        $.ajax({
            type: "post",
            url: base_url + "store/store/getbranchbyuserid",
            success: function(data) {
                var branches = JSON.parse(data);
                var $branchDropdown = $('#branch');
                $branchDropdown.empty();
                $branchDropdown.append('<option value="" disabled selected>Select Branch</option>');
                $.each(branches, function(index, branch) {
                    $branchDropdown.append('<option value="' + branch.id + '">' + branch.name + '</option>');
                    if (branch.default != 0) {
                        $branchDropdown.val(branch.id);
                    }
                });
                if (branchId > 0) {
                    $branchDropdown.val(branchId);
                }
            }
        });
    }

    function onNatureChange() {
        var selectedNature = $('#payment_nature').val();
        var $payType = $('#your_dropdown_id');
        $payType.empty();
        $payType.append('<option value="">All Payment Types</option>');
        allPaymentMethods.forEach(function(pm) {
            if (!selectedNature || pm.nature === selectedNature) {
                $payType.append('<option value="' + pm.id + '">' + pm.name + '</option>');
            }
        });
    }

    function onFilterButtonClick() {
        type = type2;
        if (password_enable == "1") {
            if (document.getElementById('password').value == '') {
                alert("Password shouldn't be empty");
                return;
            }
            $.ajax({
                url: $('#base_url').val() + 'dashboard/setting/checkpasswordReport',
                type: 'POST',
                data: { password: document.getElementById('password').value },
                success: function(response) {
                    if (JSON.parse(response) == "wrong password") {
                        alert("Wrong Password");
                        return;
                    }
                    if (type == "A" && JSON.parse(response) != "A") {
                        alert("Wrong Password");
                        return;
                    }
                    type = JSON.parse(response);
                    generateReport();
                },
                error: function(error) { console.log(error); }
            });
        } else {
            generateReport();
        }
    }

    function generateReport() {
        $.ajax({
            type: "post",
            url: $('#baseUrl2').val() + 'report/report/cashbook_reportdata',
            data: {
                from_date: $('#from_date').val(),
                to_date: document.getElementById('single_date_checkbox').checked ? $('#from_date').val() : $('#to_date').val(),
                empid: type,
                istype: document.getElementById('single_date_checkbox').checked,
                payment: $('#your_dropdown_id').val(),
                payment_nature: $('#payment_nature').val(),
                branch: $('#branch').val()
            },
            success: function(data1) {
                datas = JSON.parse(data1);
                if (datas.length != 0) {
                    window.open('generate_cashbook', '_blank');
                } else {
                    alert("There is no data available for the selected parameters.");
                }
            }
        });
    }
</script>
<script>
    document.getElementById('single_date_checkbox').addEventListener('change', function() {
        let toDate          = document.getElementById('to_date');
        let toDateContainer = document.getElementById('to_date_container');
        if (this.checked) {
            toDate.value = document.getElementById('from_date').value;
            toDateContainer.style.display = 'none';
        } else {
            toDateContainer.style.display = 'block';
        }
    });
</script>

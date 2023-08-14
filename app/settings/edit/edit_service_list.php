<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getprefix_detail = $getdata->my_sql_query($connect, NULL, "service_list", "se_li_id='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-body">
    <div class="form-group">
        <div class="col-12 mb-3">
            <label class="mb-2" for="se_group_edit">อาคาร</label>
            <select name="se_group_edit" class="form-control mb-3 select2" id="se_group_edit" onchange="getroomList_edit(this.value)" required>
                <option value="">--- เลือกข้อมูล ---</option>
                <option value="1">อาคาร Vertex View </option>
                <option value="2">อาคาร Horizon </option>
                <option value="3">อาคาร Vertical View </option>
            </select>
        </div>
        <div class="col-12 mb-3">
            <label class="mb-2" for="se_id_edit">ชั้น</label>
            <select class="form-control mb-3 select2" name="se_id_edit" id="se_id_edit" required>
                <option value="">--- เลือก ชั้น ---</option>
            </select>
            <div class="invalid-feedback">
                เลือก ชั้น .
            </div>
        </div>
        <div class="col-12 mb-3">
            <label>ชื่อห้อง/รหัสห้อง</label>
            <input type="text" name="edit_se_li_name" id="edit_se_li_name" class="form-control mb-3" value="<?php echo @$getprefix_detail->se_li_name; ?>">
            <input hidden name="se_li_id" value="<?php echo @$getprefix_detail->se_li_id; ?>">

            <!-- <textarea class="form-control mb-3" name="edit_se_li_name" id="edit_se_li_name" cols="30" rows="5"><?php echo @$getprefix_detail->se_li_name; ?></textarea> -->
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2({
            dropdownParent: $("#edit_service_list")
        });

    });
</script>
<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getstype_detail = $getdata->my_sql_query($connect, NULL, "status_type", "stype_key='" . addslashes($_GET['key']) . "'");
?>
<div class="modal-body">
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label for="edit_name_status">ชื่อสถานะ</label>
            <input type="text" name="edit_name_status" id="edit_name_status" class="form-control" value="<?php echo @$getstype_detail->stype_name; ?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="edit_color_status">Color Tag</label>
            <input type="color" name="edit_color_status" id="edit_color_status" class="form-control" value="<?php echo @$getstype_detail->stype_color; ?>">
        </div>
    </div>
    <input name="stype_key" value="<?php echo @addslashes($_GET['key']); ?>" hidden>
</div>
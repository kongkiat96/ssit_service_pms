<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getctype_detail = $getdata->my_sql_query($connect, NULL, "card_type", "ctype_key='" . addslashes($_GET['key']) . "'");
?>
<div class="modal-body">
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label for="edit_name_type">ชื่อสถานะประเภท</label>
            <input type="text" name="edit_name_type" id="edit_name_type" class="form-control" value="<?php echo @$getctype_detail->ctype_name; ?>">
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="edit_color_type">Color Tag</label>
            <input type="color" name="edit_color_type" id="edit_color_type" class="form-control" value="<?php echo @$getctype_detail->ctype_color; ?>">
        </div>
    </div>
    <input name="ctype_key" value="<?php echo @addslashes($_GET['key']); ?>" hidden>
</div>
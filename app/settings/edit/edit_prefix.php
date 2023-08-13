<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getprefix_detail = $getdata->my_sql_query($connect, NULL, "prefix_title", "prefix_key='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-header">
    <h5 class="modal-title"><strong>แก้ไขข้อมูล</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <hr class="mt-0" />
</div>
<div class="modal-body">
  <div class="form-group row">
    <div class="col-12">
      <label class="form-label-md fw-semibold mb-2" for="edit_prefix_title">ชื่อคำนำหน้านาม</label>
      <input type="text" name="edit_prefix_title" id="edit_prefix_title" class="form-control" value="<?php echo @$getprefix_detail->prefix_title; ?>">
    </div>

    <input type="text" name="prefix_key" id="prefix_key" value="<?php echo @$getprefix_detail->prefix_key; ?>" hidden readonly>
  </div>
</div>
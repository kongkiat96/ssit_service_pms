<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getlocation = $getdata->my_sql_query($connect, NULL, "locations", "id='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-header">
    <h5 class="modal-title"><strong>แก้ไขข้อมูล</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <hr class="mt-0" />
</div>
<div class="modal-body">
	<div class="form-group row">
		<input type="hidden" name="location_id" id="location_id" value="<?php echo @$getlocation->id; ?>">
		<div class="col-12">
			<label class="form-label-md fw-semibold mb-2" for="edit_location">ชื่อสถานที่ตั้ง</label>
			<input type="text" name="edit_location" id="edit_location" class="form-control" value="<?php echo @$getlocation->name; ?>">
		</div>

	</div>

</div>
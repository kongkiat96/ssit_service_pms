<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getdepartment = $getdata->my_sql_query($connect, NULL, "department_name", "id='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-header">
    <h5 class="modal-title"><strong>แก้ไขข้อมูล</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <hr class="mt-0" />
</div>
<div class="modal-body">
	<div class="form-group row">
		<div class="col-12">
			<label  class="form-label-md fw-semibold mb-2" for="edit_department">ชื่อแผนก</label>
			<input type="text" name="edit_department" id="edit_department" class="form-control" value="<?php echo @$getdepartment->department_name; ?>">
		</div>

		
		<input type="hidden" name="dep_id" id="dep_id" value="<?php echo @$getdepartment->id; ?>">
	</div>
</div>
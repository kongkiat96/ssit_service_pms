<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getcompany = $getdata->my_sql_query($connect, NULL, "company", "id='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-header">
    <h5 class="modal-title"><strong>แก้ไขข้อมูล</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <hr class="mt-0" />
</div>
<div class="modal-body">
	<div class="form-group row">
		<input type="hidden" name="dep_id" id="dep_id" value="<?php echo @$getcompany->id; ?>">
		<div class="col-12">
			<label class="form-label-md fw-semibold mb-2" for="edit_company">ชื่อบริษัท</label>
			<input type="text" name="edit_company" id="edit_company" class="form-control" value="<?php echo @$getcompany->company_name; ?>">
		</div>

	</div>

</div>
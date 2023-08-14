<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getlayout = $getdata->my_sql_query($connect, NULL, "layout_type", "id='" . addslashes($_GET['key']) . "'");
?>
<div class="modal-body">
	<div class="form-group row">
		<div class="col-8">
			<label for="edit_layout">แผนผัง</label>
			<input type="text" name="edit_layout" id="edit_layout" class="form-control" value="<?php echo @$getlayout->layout_name; ?>">
		</div>
		<div class="col-4">
			<label for="">สถานะการแสดง</label>
			<h2 class="forn-control">
				<?php
				if (@$getlayout->layout_status == 1) {
					echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$getlayout->id . '" onclick="changeUsinglayout(\'' . @$getlayout->id . '\');"><i class="fa fa-unlock-alt" id="icon-' . @$getlayout->id . '"></i> <span id="text-' . @$getlayout->id . '">แสดง</span></button>';
				} else {
					echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$getlayout->id . '" onclick="changeUsinglayout(\'' . @$getlayout->id . '\');"><i class="fa fa-lock" id="icon-' . @$getlayout->id . '"></i> <span id="text-' . @$getlayout->id . '">ซ่อน</span></button>';
				}
				?>
			</h2>
		</div>
		<input type="hidden" name="dev_id" id="dev_id" value="<?php echo @$getlayout->id; ?>">


	</div>
</div>
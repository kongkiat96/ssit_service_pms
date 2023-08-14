<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$getprefix_detail = $getdata->my_sql_query($connect, NULL, "service", "se_id='" . addslashes($_GET['key']) . "'");
?>
<div class="modal-body">
	<div class="form-group mb-2">
		<label for="edit_se_name">ชื่อหมวดหมู่</label>
		<input type="text" name="edit_se_name" id="edit_se_name" class="form-control" value="<?php echo @$getprefix_detail->se_name; ?>" autocomplete="off">
	</div>
	<div class="form-group mb-2">
		<label for="edit_se_group">เปลี่ยอาคาร</label>
		<select name="edit_se_group" id="edit_se_group" class="form-control select2">
			<?php if ($getprefix_detail->se_group == '1') {
				echo '<option value="1" selected>อาคาร Vertex View </option>
				<option value="2">อาคาร Horizon </option>
				<option value="3">อาคาร Vertical View </option>';
			} elseif ($getprefix_detail->se_group == '2') {
				echo '<option value="1">อาคาร Vertex View </option>
				<option value="2" selected>อาคาร Horizon </option>
				<option value="3">อาคาร Vertical View </option>';
			}elseif ($getprefix_detail->se_group == '3') {
				echo '<option value="1">อาคาร Vertex View </option>
				<option value="2">อาคาร Horizon </option>
				<option value="3"selected>อาคาร Vertical View </option>';
			}
			?>
		</select>
	</div>
	<input hidden name="se_id" value="<?php echo @$getprefix_detail->se_id; ?>">
</div>
<script>
    $(document).ready(function() {
        $(".select2").select2({
            dropdownParent: $("#edit_service")
        });

    });
</script>
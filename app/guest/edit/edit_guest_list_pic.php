<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$userdata = $getdata->my_sql_query($connect, NULL, "user", "user_key='" . $_SESSION['ukey'] . "'");
mysqli_set_charset($connect, "utf8");

$guest_list = $getdata->my_sql_query($connect, NULL, "bm_guest_detail", "ID='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-body">
    <div class="form-group row">
        <div class="col-12">
            <label for="edit_guest_list_pic">แก้ไขรูปภาพบริวาร</label>
            <input type="file" name="pic" id="edit_guest_list_pic" class="form-control">
        </div>

    </div>

    <div class="form-group">
        <input name="pic_id" value="<?php echo $guest_list->ID; ?>" hidden>
        <input name="code_guest" value="<?php echo $guest_list->code_guest; ?>" hidden>
        <input name="pic_log" value="<?php echo $guest_list->pic; ?>" hidden>
    </div>

    <script>
        $('.select2bs42').select2({
            theme: 'bootstrap4',
            width: '100%'
        });
    </script>
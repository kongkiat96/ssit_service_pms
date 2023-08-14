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

$guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "key_guest='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-body">
    <div class="form-group row">
        <div class="col-md-4 col-sm-12">
            <label for="building">อาคาร</label>
            <select name="building" id="building" class="form-control select2bs42 input-sm" required style="width: 100%;" onchange="getroomListcheck_edit(this.value)">
                <option value="">--- เลือกข้อมูล ---</option>
                <option value="1">อาคาร Vertex View </option>
                <option value="2">อาคาร Horizon </option>
                <option value="3">อาคาร Vertical View </option>
            </select>
            <div class="invalid-feedback">
                เลือก อาคาร.
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="floor">ชั้น</label>
            <select name="floor" id="floor" class="form-control select2bs42 input-sm" required style="width: 100%;" onchange="getroomListcheckroom_edit(this.value)">
                <option value="">--- เลือกข้อมูล ---</option>
            </select>
            <div class="invalid-feedback">
                เลือก ชั้น.
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <label for="room">ห้อง</label>
            <select name="room" id="room" class="form-control select2bs42 input-sm" required style="width: 100%;">
                <option value="">--- เลือกข้อมูล ---</option>

            </select>
            <div class="invalid-feedback">
                เลือก ห้อง.
            </div>
        </div>
    </div>




    <div class="form-group">
        <input name="key_guest" value="<?php echo @htmlspecialchars($_GET['key']); ?>" hidden>
        <input name="user_update" value="<?php echo @$userdata->user_key; ?>" hidden>
        <input name="room_log" value="<?php echo $guest_detail->room; ?>" hidden>
    </div>

    <script>
        $(document).ready(function() {
            $("#building").select2({
                dropdownParent: $("#edit_guest_room")
            });
            $("#floor").select2({
                dropdownParent: $("#edit_guest_room")
            });
            $("#room").select2({
                dropdownParent: $("#edit_guest_room")
            });
        });
    </script>
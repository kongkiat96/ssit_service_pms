<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$userdata = $getdata->my_sql_query($connect, NULL, "user", "user_key='" . $_SESSION['ukey'] . "'");
mysqli_set_charset($connect, "utf8");

$guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "room='" . htmlspecialchars($_GET['key']) . "' AND status = '2'");

$PNG_TEMP_DIR = '../../plugins/phpqrcode/temp/';
$PNG_WEB_DIR = '../plugins/phpqrcode/temp/';
require("../../plugins/phpqrcode/qrlib.php");
//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);

$filename = '../../plugins/phpqrcode/temp/guest-' . md5(@urlqr() . $guest_detail->key_guest . '|' . 'H' . '|' . '2') . '.png';
QRcode::png(@urlqr() . $guest_detail->key_guest, $filename, 'H', 2, 2);


?>
<div class="modal-body">
    <?php if ($guest_detail->key_guest != NULL) { ?>
        <div class="col-12 text-center">
            <?php echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><br/>';
            //echo @$guest_detail->code;  
            ?>
        </div>
        <div class="col-12 mt-2">
            <a href="<?php echo @urlqr() . $guest_detail->key_guest; ?>" target="_blank" class="mb-1 btn btn-outline-info btn-lg btn-block"><i class="fas fa-share-square"></i> คลิกเพื่อตรวจสอบ</a>
        </div>


    <?php } elseif ($_SESSION['uclass'] == '1') { ?>

        <div class="col-12 mt-2">
            <a href="#" class="mb-1 btn btn-outline-warning btn-lg btn-block"><i class="fas fa-bell"></i> ติดต่อเจ้าหน้าที่</a>
        </div>

    <?php } else { ?>
        <div class="col-12 mt-2">
            <a href="<?php echo @urlqr() . $guest_detail->key_guest; ?>" target="_blank" class="mb-1 btn btn-outline-success btn-lg btn-block"><i class="fas fa-share-square"></i> เพิ่มข้อมูลเข้าพัก</a>
        </div>
    <?php } ?>

    <div class="form-group">
        <input name="room_log" value="<?php echo $guest_detail->key_guest; ?>" hidden>
    </div>

</div>

<script>
    $('.select2bs42').select2({
        theme: 'bootstrap4',
        width: '100%'
    });
</script>
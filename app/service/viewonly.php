<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
$chk_case = $getdata->my_sql_query($connect, NULL, "problem_list", "ticket='" . htmlspecialchars($_GET['key']) . "'");
$getEmployee = $getdata->my_sql_query($connect, NULL, "employee", "em_key = '".$chk_case->user_key."' AND em_status = '1' ORDER BY em_class DESC");
?>
<div class="modal-header">
    <h5 class="modal-title"><strong>ตรวจสอบข้อมูลงานที่เสร็จสิ้น</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <hr class="mt-0" />

</div>
<div class="modal-body">
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills nav-fill mb-3" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                    aria-selected="true">
                    <i class="tf-icons bx bxs-user-detail"></i> ข้อมูลการแจ้ง

                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-justified-before" aria-controls="navs-pills-justified-before"
                    aria-selected="false">
                    <i class="tf-icons bx bx-image"></i> รูปภาพประกอบ
                </button>
            </li>
            <?php if($chk_case->pic_after != null){?>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-justified-after" aria-controls="navs-pills-justified-after"
                    aria-selected="false">
                    <i class="tf-icons bx bx-image"></i> รูปภาพหลังแก้ไข
                </button>
            </li>
            <?php } ?>
        </ul>
        <div class="tab-content">
            <div class="row">
                <div class="col-12">
                    <label class="form-label-md fw-semibold mb-2">
                        <h5 class="modal-title" id="exampleModalLabel3"><strong>Ticket :
                                <u><?php echo $chk_case->ticket; ?></u></strong></h5>
                    </label>
                </div>
            </div>
            <hr class="mt-2" />
            <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">ชื่อ - นามสกุล</label>
                        <input type="text" class="form-control"
                            value="<?php echo @getemployeeName($chk_case->user_key); ?>" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">แจ้งซ่อมวัสดุ /ครุภัณฑ์</label>
                        <input type="text" class="form-control" value="<?php echo $chk_case->se_asset; ?>" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">แผนก / ฝ่าย</label>
                        <input type="text" class="form-control"
                            value="<?php echo @getDepartment($getEmployee->em_department); ?>" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">ตำแหน่ง</label>
                        <input type="text" class="form-control" value="<?php echo $getEmployee->em_position; ?>"
                            disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">สถานที่ตั้ง</label>
                        <input type="text" class="form-control"
                            value="<?php echo @getLocation($chk_case->se_location); ?>" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">พื้นที่/ห้อง</label>
                        <input type="text" class="form-control"
                            value="<?php echo $chk_case->se_room; ?>" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <label class="form-label-md fw-semibold mb-2">รายละเอียดเพิ่มเติม</label>
                        <textarea class="form-control" rows="3" disabled><?php echo $chk_case->se_other; ?></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">วันที่และเวลาที่แจ้ง</label>
                        <input type="text" class="form-control"
                            value="<?php echo @dateConvertor($chk_case->date).' '. $chk_case->time_start; ?>" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">ข้อมูลการติดต่อกลับ</label>
                        <input type="text" class="form-control" value="<?php echo $chk_case->se_namecall; ?>" disabled>
                    </div>
                </div>
                <h5 class="modal-title mt-4"><strong>ส่วนของผู้ดำเนินการ</strong></h5>
                <hr class="mt-2" />
                <div class="row mt-3">
                    <div class="col-md-6 col-sm-12">
                        <label name="status" class="form-label-md fw-semibold mb-2">สถานะ</label>
                        <select id="select2" name="status" class="form-control" required autofocus disabled>
                            <option value="" selected>--- เลือกข้อมูล ---</option>
                            <?php
                                $select_status = $getdata->my_sql_select($connect, NULL, "use_status", "status ='1' ORDER BY date_create");
                                if ($_SESSION['uclass'] == 1) {
                                echo '<option value="57995055c28df9e82476a54f852bd214">ยกเลิกการแจ้ง</option>';
                                echo '<option value="5cafc78523f4f5e4812f9545b2ba5ae7">แจ้งดำเนินการอีกครั้ง</option>';
                                } else {
                                    while ($show_status = mysqli_fetch_object($select_status)) {
                                        if ($show_status->status_key == $chk_case->status) {
                                        echo '<option value="' . $show_status->status_key . '" selected>' . $show_status->status_name . '</option>';
                                        } else {
                                        echo '<option value="' . $show_status->status_key . '">' . $show_status->status_name . '</option>';
                                        }
                                    }
                                }
                            ?>

                        </select>
                        <div class="invalid-feedback">
                            <label class="form-label-md fw-semibold mt-2">ระบุ สถานะปัจจุบัน.</label>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2">ผู้ดำเนินงาน</label>
                        <input type="text" class="form-control"
                            value="<?php echo $chk_case->admin_update != null ?  @getemployeeName($chk_case->admin_update) : @getemployeeName($_SESSION['ukey']); ?>"
                            readonly>
                        <input type="text" class="form-control" name="admin_update"
                            value="<?php echo $chk_case->admin_update != null ?  $chk_case->admin_update : $_SESSION['ukey']; ?>"
                            hidden>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="navs-pills-justified-before" role="tabpanel">
                <?php
                    if ($chk_case->pic_before == null) {
                        echo '<img class="img-thumbnail" src="../resource/it/file_pic_now/no-img.png" width="100%">';
                    } else {
                        echo '<img class="img-thumbnail" src="../resource/it/delevymo/' . $chk_case->pic_before . '" width="100%">';
                    }
                ?>
            </div>
            <?php if($chk_case->pic_after != null){?>
            <div class="tab-pane fade" id="navs-pills-justified-after" role="tabpanel">
                    <img class="img-thumbnail" src="../resource/it/delevymo/<?php echo $chk_case->pic_after; ?>" width="100%">';
            </div>
            <?php } ?>
            <input type="text" class="form-control" name="ticket" value="<?php echo $chk_case->ticket; ?>" hidden>
            
            <input type="text" name="pic_log" hidden value="<?php echo $chk_case->pic_after; ?>">
           
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#select2").select2({
        dropdownParent: $("#getwork")
    });
});
</script>
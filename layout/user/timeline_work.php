<?php
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
$chk_case = $getdata->my_sql_query($connect, NULL, "problem_list", "ticket='" . htmlspecialchars($_GET['key']) . "'");
$chk_detail = $getdata->my_sql_select($connect, NULL, "problem_comment", "ticket='" . htmlspecialchars($_GET['key']) . "' ORDER BY date DESC");
$count_detail = $getdata->my_sql_show_rows($connect, "problem_comment", "ticket='" . htmlspecialchars($_GET['key']) . "'");
?>
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel3"><strong>ตรวจสอบข้อมูล Ticket :
            <u><?php echo $chk_case->ticket; ?></u></strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body pt-0">
    <hr />
    <div class="card-body">
        <ul class="timeline timeline-dashed mt-3 ml-2 mr-2">
            <li class="timeline-item timeline-item-primary mb-4">
                <span class="timeline-indicator timeline-indicator-primary">
                    <i class="bx bx-paper-plane"></i>
                </span>
                <div class="timeline-event">
                    <div class="timeline-header border-bottom mb-3">
                        <h6 class="mb-0">แจ้งและบันทึกเรื่องเข้าสู่ระบบ</h6>
                        <small class="text-muted"><?php echo @dateConvertor($chk_case->date);?> , เวลา :
                            <?php echo $chk_case->time_start; ?></small>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between mb-2">
                        <div>
                            <span>รายละเอียดที่แจ้ง</span>
                            <i class="bx bx-right-arrow-alt scaleX-n1-rtl mx-3"></i>
                            <span><?php echo $chk_case->se_other; ?>, ชื่อวัสดุ/ครุภัณฑ์ :
                                <?php echo $chk_case->se_asset; ?></span>
                        </div> สถานที่ตั้ง : <?php echo @getLocation($chk_case->se_location); ?>

                    </div>
                    <div class="d-flex flex-wrap justify-content-between mb-2">
                        <div>
                            <span>ข้อมูลสถานที่</span>
                            <i class="bx bx-right-arrow-alt scaleX-n1-rtl mx-3"></i>
                            <span> สถานที่ตั้ง : <?php echo @getLocation($chk_case->se_location); ?>, พื้นที่/ห้อง : <?php echo $chk_case->se_room; ?></span>
                        </div>

                    </div>
                </div>
            </li>
            <?php if($chk_case->admin_update != null){ ?>
            <li class="timeline-item timeline-item-info mb-4">
                <span class="timeline-indicator timeline-indicator-info">
                    <i class='bx bx-user-voice'></i>
                </span>
                <div class="timeline-event">
                    <div class="timeline-header border-bottom mb-3">
                        <h6 class="mb-0">เจ้าหน้าที่รับเรื่องดำเนินการ</h6>
                        <small class="text-muted"><?php echo @dateConvertor($chk_case->date_update);?> , เวลา :
                            <?php echo $chk_case->time_update; ?></small>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between mb-2">
                        <div>
                            <span>ผู้รับเรื่องดำเนินการ</span>
                            <i class="bx bx-right-arrow-alt scaleX-n1-rtl mx-3"></i>
                            <span><?php echo @getemployeeName($chk_case->admin_update); ?></span>
                        </div>



                    </div>
                    <div class="d-flex flex-wrap justify-content-between mb-2">
                        <div>
                            <span>สถานะจากผู้รับเรื่องดำเนินการ</span>
                            <i class="bx bx-right-arrow-alt scaleX-n1-rtl mx-3"></i>
                            <span><?php echo $chk_case->status != null ? @useStatus($chk_case->status) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?></span>
                        </div>

                    </div>
                </div>
            </li>
            <?php } ?>

            <?php if($count_detail >= '1'){ ?>
            <li class="timeline-item timeline-item-dark mb-4">
                <span class="timeline-indicator timeline-indicator-dark">
                    <i class="bx bx-comment-detail"></i>
                </span>
                <div class="timeline-event">
                    <div class="timeline-header border-bottom mb-3">
                        <h6 class="mb-0">รายละเอียดจากเจ้าหน้าที่</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php 
                        $i = 0;
                        while ($showdeatil = mysqli_fetch_object($chk_detail)) {
                            $i++
                    ?>
                        <li
                            class="list-group-item d-flex flex-wrap justify-content-between align-items-center border-top-0 p-0">
                            <div class="d-flex flex-wrap align-items-center">
                                <ul
                                    class="list-unstyled users-list avatar-group d-flex align-items-center m-0 my-3 me-2">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Vinnie Mostowy" class="avatar avatar-xs pull-up">

                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Allen Rieske" class="avatar avatar-xs pull-up">

                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Julee Rossignol" class="avatar avatar-xs pull-up">

                                    </li>
                                </ul>
                                <span><?php echo @dateTimeConvertor($showdeatil->date) .' : ' .$showdeatil->comment; ?></span>
                            </div>
                            <?php echo @useStatus($showdeatil->status); ?>

                        </li>

                        <?php } ?>
                    </ul>
                </div>
            </li>
            <?php } ?>
            <?php if($chk_case->status == '2e34609794290a770cb0349119d78d21'){?>
            <li class="timeline-item timeline-item-success mb-4">
                <span class="timeline-indicator timeline-indicator-success">
                    <i class="bx bx-check-circle"></i>
                </span>
                <div class="timeline-event">
                    <div class="timeline-header border-bottom mb-3">
                        <h6 class="mb-0">ให้คะแนนการดำเนินงาน</h6>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between mb-2">
                        <div>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" <?php echo $chk_case->rate == '5' ? 'checked' : ''; ?>/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" <?php echo $chk_case->rate == '4' ? 'checked' : ''; ?>/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" <?php echo $chk_case->rate == '3' ? 'checked' : ''; ?>/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" <?php echo $chk_case->rate == '2' ? 'checked' : ''; ?>/>
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" <?php echo $chk_case->rate == '1' ? 'checked' : ''; ?>/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="timeline-end-indicator timeline-indicator-success">
                <i class="bx bx-check-circle"></i>
            </li>
            <?php } ?>
        </ul>
    </div>

</div>
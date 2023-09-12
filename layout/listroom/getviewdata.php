<?php
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "room='" . htmlspecialchars($_GET['key']) . "' AND status = '2'");
?>
<!-- <?php echo COUNT($guest_detail->key_guest); ?> -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel4">แสดงรายการข้อมูลผู้เข้าพัก : <strong><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel4">รายการห้องพัก :
        <strong>
            <?php
            if ($guest_detail->sys_procress == '1') {
                echo @building($guest_detail->building) . ' ' . @prefixConvertorService($guest_detail->floor) . ' ห้อง ' . @prefixConvertorServiceList($guest_detail->room);
            } elseif ($guest_detail->sys_procress == '2') {
                echo '<span class="badge bg-label-danger">ยกเลิกข้อมูล</span>';
            } elseif ($guest_detail->sys_procress == '0') {
                echo '<span class="badge bg-label-primary">ข้อมูลไม่สมบูรณ์</span>';
            }
            ?>
        </strong>
    </h5>
</div>
<div class="modal-body">
    <div id="accordionPopoutIcon" class="accordion mt-3 accordion-popout">
        <div class="accordion-item card">
            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionPopoutIconOne">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#detailGuest" aria-controls="detailGuest" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>
                    <strong>ข้อมูลผู้เข้าพัก</strong>
                </button>
            </h2>

            <div id="detailGuest" class="accordion-collapse collapse show" data-bs-parent="#accordionPopoutIcon">
                <div class="accordion-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <strong>รูปภาพ</strong>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            if ($guest_detail->pic == null) {
                                                echo '<img class="img-thumbnail" src="resource/guest/file_pic_now/no-img.png" width="100%">';
                                            } else {
                                                echo '<img class="img-thumbnail" src="resource/guest/delevymo/' . $guest_detail->pic . '" width="100%">';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <strong>รายละเอียดผู้เข้าพัก</strong>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>หมายเลขโทรศัพท์ :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for=""><?php echo $guest_detail->tel; ?></label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>ตำแหน่งงาน :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for=""><?php echo $guest_detail->position; ?></label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>ประเภทบุคลากร :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for=""><?php echo status_guest($guest_detail->status_guest); ?></label>
                                                </div>
                                            </div>
                                            <?php if ($guest_detail->status_guest == '3') { ?>
                                                <div class="row mb-3">
                                                    <div class="col-sm-6 col-md-4 text-start">
                                                        <label for=""><strong>วันสิ้นสุดสัญญา :</strong></label>
                                                    </div>
                                                    <div class="col-6 text-start">
                                                        <label for=""><?php echo dateConvertor($guest_detail->end_date); ?></label>
                                                    </div>
                                                </div>
                                            <?php } ?>





                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>ฝ่าย :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for=""><?php echo getComName($guest_detail->company_id); ?></label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>สำนัก :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for=""><?php echo getDepartName($guest_detail->department); ?></label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>วันที่เข้าพัก :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for="">
                                                        <?php if ($guest_detail->check_in == NULL) {
                                                            echo '<span class="badge badge-danger">ยังไม่มีการระบุ</span>';
                                                        } else {
                                                            echo @dateOnlyFromTimeConvertor($guest_detail->check_in);
                                                        } ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>วันที่ออกห้องพัก :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for="">
                                                        <?php if ($guest_detail->check_out == NULL) {
                                                            echo '<span class="badge bg-label-danger">ยังไม่มีการระบุ</span>';
                                                        } else {
                                                            echo @dateOnlyFromTimeConvertor($guest_detail->check_out);
                                                        } ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>จำนวนบริวาร :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for="">
                                                        <?php if ($guest_detail->status_guest_detail == '1') { ?>
                                                            <label for="prefix_code"><?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $guest_detail->code . "'");
                                                                                        echo $count_guest_detail; ?> ท่าน</label>
                                                        <?php } else { ?>
                                                            <span class="badge bg-label-info">ไม่แจ้งบริวาร</span>
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 col-md-4 text-start">
                                                    <label for=""><strong>ผู้บันทึกข้อมูล :</strong></label>
                                                </div>
                                                <div class="col-6 text-start">
                                                    <label for=""><?php echo @getemployee($guest_detail->user_key); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($guest_detail->status_guest_detail == '1') { ?>
            <div class="accordion-item card">
                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionPopoutIconTwo">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#detailfollow" aria-controls="detailfollow" aria-expanded="false">
                        <i class="fas fa-users me-2"></i>
                        <strong>ข้อมูลบริวาร</strong>
                    </button>
                </h2>
                <div id="detailfollow" class="accordion-collapse collapse" data-bs-parent="#accordionPopoutIcon">
                    <?php if ($count_guest_detail != '0') { ?>
                        <div class="col-12">
                            <div class="alert alert-success" role="alert"><b>ข้อมูลบริวารของเจ้าหน้าที่ <u><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></u></b></div>
                            <div class="row">
                                <!-- style="width: 108%" -->
                                <?php
                                $i = 0;
                                $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' AND relation != '5' ORDER BY create_time");
                                while ($showlist = mysqli_fetch_object($getdetail)) {
                                    $i++
                                ?>

                                    <div class="col-sm-12 col-md-4">
                                        <div class="card">
                                            <!-- <img class="card-img-top" src="../../assets/img/elements/2.jpg" alt="Card image cap" /> -->
                                            <?php
                                            if ($showlist->pic == null) {
                                                echo '<img class="card-img-center mx-auto" src="resource/guest/file_pic_now/no-img.png" width="200px" height="200px">';
                                            } else {
                                                echo '<img class="card-img-center mx-auto" src="resource/guest/delevymo/' . $showlist->pic . '" width="200px" height="200px">';
                                            }
                                            ?>
                                            <div class="card-body">
                                                <div class="card-title"><strong>ลำดับที่ : </strong><?php echo $i; ?></div>
                                                <div class="row">
                                                    <div class="col-md-5 col-sm-12 text-start mb-2">
                                                        ชื่อ - นามสกุล :
                                                    </div>
                                                    <div class="col-md-7 col-sm-12 text-start">
                                                        <label for=""> <?php echo @prefixConvertor($showlist->prefix_name) . '' . $showlist->fname . ' ' . $showlist->lname; ?></label>
                                                    </div>
                                                    <!-- <div class="row m-1"> -->
                                                    <div class="col-md-5 col-sm-12 text-start mb-2">
                                                        ความสัมพันธ์ :
                                                    </div>
                                                    <div class="col-md-7 col-sm-12 text-start">
                                                        <label for=""><?php echo @relation($showlist->relation); ?></label>
                                                    </div>
                                                    <!-- </div> -->

                                                    <!-- <div class="row m-1"> -->
                                                    <div class="col-md-6 col-sm-12 text-start mb-2">
                                                        หมายเลขโทรศัพท์ :
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 text-start" style="margin-left: -26px;">
                                                        <label for=""><?php echo $showlist->tel; ?></label>
                                                    </div>
                                                    <!-- </div> -->
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php $getdetailOther = $getdata->my_sql_query($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' AND relation = '5' ORDER BY create_time"); ?>
            <?php if (COUNT($getdetailOther) >= 1) { ?>
                <div class="accordion-item card">
                    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionPopoutIconTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#detailfollowOther" aria-controls="detailfollowOther" aria-expanded="false">
                            <i class="fas fa-users me-2"></i>
                            <strong>บุคคลภายนอกได้รับอนุมัติจาก ผสทอภ.</strong>
                        </button>
                    </h2>
                    <div id="detailfollowOther" class="accordion-collapse collapse" data-bs-parent="#accordionPopoutIcon">
                        <?php if ($count_guest_detail != '0') { ?>
                            <div class="col-12">
                                <div class="alert alert-success" role="alert"><b>ข้อมูลบุคคลภายนอกได้รับอนุมัติจาก ผสทอภ.ของเจ้าหน้าที่ <u><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></u></b></div>
                                <div class="row">
                                    <!-- style="width: 108%" -->
                                    <?php
                                    $i = 0;
                                    $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' AND relation = '5' ORDER BY create_time");
                                    while ($showlist = mysqli_fetch_object($getdetail)) {
                                        $i++
                                    ?>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="card">
                                                <!-- <img class="card-img-top" src="../../assets/img/elements/2.jpg" alt="Card image cap" /> -->
                                                <?php
                                                if ($showlist->pic == null) {
                                                    echo '<img class="card-img-center mx-auto" src="resource/guest/file_pic_now/no-img.png" width="200px" height="200px">';
                                                } else {
                                                    echo '<img class="card-img-center mx-auto" src="resource/guest/delevymo/' . $showlist->pic . '" width="200px" height="200px">';
                                                }
                                                ?>
                                                <div class="card-body">
                                                    <div class="card-title"><strong>ลำดับที่ : </strong><?php echo $i; ?></div>
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-12 text-start mb-2">
                                                            ชื่อ - นามสกุล :
                                                        </div>
                                                        <div class="col-md-7 col-sm-12 text-start" style="padding-left: 25px;">
                                                            <label for=""> <?php echo @prefixConvertor($showlist->prefix_name) . '' . $showlist->fname . ' ' . $showlist->lname; ?></label>
                                                        </div>
                                                        <!-- <div class="row m-1"> -->
                                                        <div class="col-md-5 col-sm-12 text-start mb-2">
                                                            ความสัมพันธ์ :
                                                        </div>
                                                        <div class="col-md-7 col-sm-12 text-start" style="padding-left: 25px;">
                                                            <label for=""><?php echo @relation($showlist->relation); ?></label>
                                                        </div>
                                                        <!-- </div> -->

                                                        <!-- <div class="row m-1"> -->
                                                        <div class="col-md-6 col-sm-12 text-start mb-2">
                                                            หมายเลขโทรศัพท์ :
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 text-start" style="margin-left: -26px;">
                                                            <label for=""><?php echo $showlist->tel; ?></label>
                                                        </div>
                                                        <!-- </div> -->

                                                        <div class="col-md-6 col-sm-12 text-start mb-2">
                                                            เลขที่เอกสารที่ได้รับการอนุมัติ :
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 text-start" style="margin-left: -26px;">
                                                            <label for=""><?php echo $showlist->detail; ?></label>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>




</div>
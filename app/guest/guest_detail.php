<?php require_once 'procress/datasave.php'; ?>
<?php $getmenus = $getdata->my_sql_query($connect, null, 'menus', "menu_status ='1' AND menu_key = '3ea03351897df2d73bf8cf9490320d32'"); ?>
<?php if (htmlspecialchars($_GET['key']) == NULL) {
    echo '<script>window.location="index.php?p=guest";</script>';
} else {
    $guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "key_guest='" . htmlspecialchars($_GET['key']) . "'");
    $getall = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "ID <> 'hidden' AND code_guest = '" . $guest_detail->code . "'");
} ?>


<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fas fa-users"></i> <span>เพิ่มรายละเอียดบริวาร</span></h3>
        <hr class="mt-2">
    </div>
</div>
<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item">
            <a href="index.php?p=guest"><?php echo '<span>' . $getmenus->menu_name . '</span>'; ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">เพิ่มรายละเอียดบริวาร [<?php echo @$guest_detail->code; ?>]</li>
    </ol>
</nav>

<div class="modal fade" id="edit_guest" tabindex="-1" role="dialog" aria-labelledby="edit_guest" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><strong>แก้ไขข้อมูล</strong></h3>
                </div>
                <hr>

                <div class="guest">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_edit_guest">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="edit_guest_room" role="dialog" aria-labelledby="edit_guest_room" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><strong>แก้ไขข้อมูล</strong></h3>
                </div>
                <hr>
                <div class="room">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_edit_guest_room">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="edit_guest_list_pic" role="dialog" aria-labelledby="edit_guest_list_pic" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><strong>แก้ไขข้อมูล</strong></h3>
                </div>
                <hr>
                <div class="list_pic">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_edit_guest_list_pic">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="edit_guest_list" role="dialog" aria-labelledby="edit_guest_list" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><strong>แก้ไขข้อมูล</strong></h4>
                </div>
                <hr>
                <div class="guest_list">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_edit_guest_detail">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="edit_guest_pic" role="dialog" aria-labelledby="edit_guest_pic" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><strong>แก้ไขข้อมูล</strong></h4>
                </div>
                <hr>
                <div class="pic">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_edit_guest_pic">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="save_guest" role="dialog" aria-labelledby="save_guest" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" validate>
            <div class="modal-content">
                <div class="modal-header">
                    <h4><strong>ยืนยันข้อมูล</strong></h4>
                </div>
                <hr>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="sys_procress">สถานะปัจจุบัน</label>
                            <select name="sys_procress" id="sys_procress" class="form-control select2" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <option value="1">ยืนยันข้อมูล</option>
                                <option value="2">ยกเลิกข้อมูล</option>
                            </select>
                            <div class="invalid-feedback">
                                เลือก สถานะปัจจุบัน.
                            </div>
                            <!-- Fornotify -->
                            <input type="text" hidden name="room" value="<?php echo $guest_detail->room; ?>">
                            <input type="text" hidden name="key_guest" value="<?php echo $guest_detail->key_guest; ?>">
                            <input type="text" hidden name="full_name" value="<?php echo $guest_detail->fname . ' ' . $guest_detail->lname; ?>">
                            <input type="text" hidden name="position" value="<?php echo $guest_detail->position; ?>">
                            <input type="text" hidden name="checkin" value="<?php echo @dateOnlyFromTimeConvertor($guest_detail->check_in); ?>">
                            <input type="text" hidden name="checkout" value="<?php echo @dateOnlyFromTimeConvertor($guest_detail->check_out); ?>">
                            <input type="text" hidden name="count" value="<?php echo @number_format($getall); ?>">
                            <input type="text" hidden name="statusCheck" value="<?php echo $guest_detail->status; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="show_guest_follow">แสดงข้อมูลบริวาร</label>
                            <select name="show_guest_follow" id="show_guest_follow" class="form-control select2" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <option value="1">แสดง</option>
                                <option value="2">ไม่แสดง</option>
                            </select>
                            <div class="invalid-feedback">
                                เลือก แสดงข้อมูลบริวาร.
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_confirm">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="col-12 mb-4">
    <!-- <small class="text-light fw-semibold">Validation</small> -->
    <div id="wizard-validation" class="bs-stepper mt-2 linear">
        <div class="bs-stepper-header">
            <div class="step active" data-target="#account-details-validation">
                <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                    <span class="bs-stepper-circle">1</span>
                    <span class="m-1">
                        <span class="bs-stepper-title">ข้อมูลผู้เข้าพัก</span>
                        <!-- <span class="bs-stepper-subtitle">Setup Account Details</span> -->
                    </span>
                </button>
            </div>
            <div class="line">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step active" data-target="#personal-info-validation">
                <button type="button" class="step-trigger" aria-selected="true">
                    <span class="bs-stepper-circle">2</span>
                    <span class="mt-1">
                        <span class="bs-stepper-title">รายละเอียดการเข้าพัก</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <!-- Account Details -->
            <div class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework text-end">
                <div class="content-header mb-3">
                    <h4 class="mb-0"><strong>สถานะปัจจุบัน : </strong>
                        <?php if ($guest_detail->sys_procress == '0') {
                            echo '<span class="badge bg-label-warning">รอการยืนยันข้อมูล</span>';
                        } elseif ($guest_detail->sys_procress == '1') {
                            if ($guest_detail->status == '0') {
                                echo '<span class="badge bg-label-success">ยืนยันข้อมูลออกพัก</span>';
                            } else {
                                echo '<span class="badge bg-label-success">ยืนยันข้อมูลเข้าพัก</span>';
                            }
                        } else {
                            echo '<span class="badge bg-label-danger">ยกเลิกข้อมูลเข้าพัก</span>';
                        }
                        ?>
                    </h4>
                </div>



                <!-- </form> -->
            </div>
            <!-- Personal Info -->
            <div class="card">
                <div class="card-header bg-dark text-white font-weight-bold mb-3">
                    รายละเอียดข้อมูล
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <?php
                            if ($guest_detail->pic == null) {
                                echo '<img class="img-thumbnail mx-auto" src="../resource/guest/file_pic_now/no-img.png" width="100%">';
                            } else {
                                echo '<img class="img-thumbnail mx-auto" src="../resource/guest/delevymo/' . $guest_detail->pic . '" width="50%">';
                            }
                            ?>
                            <br>
                            <div class="row">
                                <a class="btn btn-sm btn-info ml-auto text-white" data-bs-toggle="modal" data-bs-target="#edit_guest_pic" data-whatever="<?php echo @$guest_detail->key_guest; ?>"><i class="fas fa-camera"></i> <strong>แก้ไขรูปภาพ</strong></a>

                            </div>

                            <?php if ($_SESSION['user_class'] == '3') { ?>
                            <?php } ?>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ชื่อ - นามสกุล : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ตำแหน่งงาน : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo @$guest_detail->position; ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>สังกัด : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo getDepartName($guest_detail->department); ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ฝ่าย : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo getComName($guest_detail->company_id); ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ประเภทบุคลากร : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo status_guest($guest_detail->status_guest); ?></div>
                                <?php if ($guest_detail->status_guest == '3') { ?>
                                    <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>วันที่สิ้นสุดโครงการ : </strong></div>
                                    <div class="col-sm-12 col-md-3 mb-3"><?php echo dateConvertor($guest_detail->end_date); ?></div>
                                <?php } ?>


                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>หมายเลขโทรศัพท์ : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo $guest_detail->tel; ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>สถานะ : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3">
                                    <?php if ($guest_detail->status == '1') {
                                        echo '<span class="badge bg-label-warning">รอการยืนยันเข้าพัก</span>';
                                    } elseif ($guest_detail->status == '2') {
                                        echo '<span class="badge bg-label-success">เข้าพัก</span>';
                                    } elseif ($guest_detail->status == '9') {
                                        echo '<span class="badge bg-label-danger">ยกเลิกข้อมูล</span>';
                                    } else {
                                        echo '<span class="badge bg-label-danger">ออกจากห้องพัก</span>';
                                    } ?>
                                </div>
                                <?php if ($_SESSION['uclass'] != '1') { ?>
                                    <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>วันที่เข้าพัก : </strong></div>
                                    <div class="col-sm-12 col-md-3 mb-3">
                                        <?php if ($guest_detail->check_in == NULL) {
                                            echo '<span class="badge bg-label-danger">ยังไม่มีการระบุ</span>';
                                        } else {
                                            echo @dateOnlyFromTimeConvertor($guest_detail->check_in);
                                        } ?>
                                    </div>
                                <?php } ?>


                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>จำนวนบริวาร : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3">
                                    <?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $guest_detail->code . "'");
                                    echo $count_guest_detail; ?> ท่าน
                                </div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>วันที่ออกจากห้องพัก : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3">
                                    <?php if ($guest_detail->check_out == NULL) {
                                        echo '<span class="badge bg-label-danger">ยังไม่มีการระบุ</span>';
                                    } else {
                                        echo @dateOnlyFromTimeConvertor($guest_detail->check_out);
                                    } ?>
                                </div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ชื่ออาคาร : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo building($guest_detail->building); ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ชั้น : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo prefixConvertorService($guest_detail->floor); ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ชื่อห้อง/รหัสห้อง : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo prefixConvertorServiceList($guest_detail->room); ?></div>

                                <div class="col-sm-12 col-md-3 mb-3 text-end"><strong>ผู้บันทึกข้อมูล : </strong></div>
                                <div class="col-sm-12 col-md-3 mb-3"><?php echo getemployee($guest_detail->user_key); ?></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">

                    <button type="button" class="mb-1 btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#edit_guest" data-whatever="<?php echo @$guest_detail->key_guest; ?>">
                        <i class="fas fa-edit"></i> เพิ่มสถานะและแก้ไขข้อมูล
                    </button>
                    <button type="button" class="mb-1 btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit_guest_room" data-whatever="<?php echo @$guest_detail->key_guest; ?>">
                        <i class="fas fa-edit"></i> แก้ไขข้อมูลเข้าห้องพัก
                    </button>

                    <!-- <a class="btn btn-md btn-info " data-toggle="modal" data-target="#edit_guest" data-whatever="<?php echo @$guest_detail->key_guest; ?>"><i class="fas fa-edit"></i> เพิ่มสถานะและแก้ไขข้อมูล</a> -->
                    <!-- <a class="btn btn-md btn-warning " data-toggle="modal" data-target="#edit_guest_room" data-whatever="<?php echo @$guest_detail->key_guest; ?>"><i class="fas fa-edit"></i> แก้ไขข้อมูลเข้าห้องพัก</a> -->
                </div>
            </div>
            <hr>
            <div class="card broder-warning ">
                <div class="card-header bg-dark text-white font-weight-bold mb-3">
                    ข้อมูลบริวาร
                </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                        <?php if ($_SESSION['uclass'] != '1') { ?>
                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <label for="card_code">Code</label>

                                    <input type="text" name="card_code" id="card_code" value="<?php echo $guest_detail->code; ?>" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="prefixname">คำนำหน้าชื่อ</label>
                                    <select name="prefixname" id="prefixname" class="form-control select2" style="width: 100%;">
                                        <option value="">--- เลือกข้อมูล ---</option>
                                        <?php $getprefix = $getdata->my_sql_select($connect, NULL, "members_prefix", "prefix_status ='1'");
                                        while ($showprefix = mysqli_fetch_object($getprefix)) {
                                            echo '<option value="' . $showprefix->prefix_code . '">' . $showprefix->prefix_title . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        เลือก คำนำหน้า.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="fname">ชื่อบริวาร</label>
                                    <input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="ชื่อบริวาร">
                                    <div class="invalid-feedback">
                                        ระบุ ชื่อบริวาร.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="lname">นามสกุลบริวาร</label>
                                    <input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="นามสกุลบริวาร">
                                    <div class="invalid-feedback">
                                        ระบุ นามสกุลบริวาร.
                                    </div>
                                </div>
                                <!-- <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="position">ตำแหน่ง</label>
                                    <input type="text" name="position" id="position" class="form-control input-sm" placeholder="ตำแหน่ง">
                                    <div class="invalid-feedback">
                                        ระบุ ตำแหน่ง.
                                    </div>
                                </div> -->

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="tel">หมายเลขโทรศัพท์</label>
                                    <input type="tel" name="tel" id="tel" class="form-control input-sm" placeholder="หมายเลขโทรศัพท์" maxlength="10" pattern="[0-9]{10}" oninput="validatePhoneNumber()">
                                    <div class="invalid-feedback">
                                        ระบุ หมายเลขโทรศัพท์.
                                    </div>
                                </div>
                                <!-- <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="idcard">เลขบัตรประจำตัวประชาชน/หนังสือเดินทาง</label>
                                    <input type="text" name="idcard" id="idcard" class="form-control input-sm" placeholder="เลขบัตรประจำตัวประชาชน/หนังสือเดินทาง">
                                    <div class="invalid-feedback">
                                        ระบุ เลขบัตรประจำตัวประชาชน/หนังสือเดินทาง.
                                    </div>
                                </div> -->

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="pic">รูปถ่าย</label>
                                    <input type="file" name="pic" id="pic" class="form-control input-sm" placeholder="รูปถ่าย">
                                    <div class="invalid-feedback">
                                        ระบุ รูปถ่าย.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="relation">ความสัมพันธ์</label>
                                    <select name="relation" id="relation" class="form-control select2" style="width: 100%;">
                                        <option value="">--- เลือกข้อมูล ---</option>
                                        <option value="1">บุตร</option>
                                        <option value="2">คู่สมรส</option>
                                        <option value="3">บิดา</option>
                                        <option value="4">มารดา</option>
                                        <!-- <option value="5">บุคคลภายนอกฯ</option> -->
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="detail">รายละเอียดเพิ่มเติม (ถ้ามี)</label>
                                    <textarea name="detail" id="" cols="20" rows="2" class="form-control"></textarea>
                                </div>

                                <div class="col-12 text-center">

                                    <button class="ladda-button btn btn-warning btn-square btn-ladda bg-warning" data-style="expand-left" type="submit" name="save_guest_detail">
                                        <span class="fas fa-list-ol"> เพิ่มข้อมูลบริวาร</span>
                                        <span class="ladda-spinner"></span>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="col-12 mt-5">
                            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                                <!-- style="width: 108%" -->
                                <?php
                                $i = 0;
                                $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' AND relation != '5'  ORDER BY create_time");
                                while ($showlist = mysqli_fetch_object($getdetail)) {
                                    $i++
                                ?>


                                    <div class="col">
                                        <div class="card h-100">
                                            <!-- <img class="card-img-top" src="../../assets/img/elements/2.jpg" alt="Card image cap" /> -->
                                            <?php
                                            if ($showlist->pic == null) {
                                                echo '<img class="card-img-center mx-auto" src="../resource/guest/file_pic_now/no-img.png" width="200px" height="200px">';
                                            } else {
                                                echo '<img class="card-img-center mx-auto" src="../resource/guest/delevymo/' . $showlist->pic . '" width="200px" height="200px">';
                                            }
                                            ?>





                                            <div class="card-body">
                                                <?php if ($_SESSION['uclass'] != '1') { ?>
                                                    <!-- <a class="btn btn-sm btn-info ml-auto text-white" data-toggle="modal" data-target="#edit_guest_list_pic" data-whatever="<?php echo @$showlist->ID; ?>"><i class="fas fa-camera"></i> <strong>แก้ไขรูปภาพ</strong></a> -->
                                                    <div class="row">
                                                        <!-- <div class="mx-auto"> -->
                                                        <button type="button" class="btn btn-sm btn-warning ml-auto text-white" data-bs-toggle="modal" data-bs-target="#edit_guest_list_pic" data-whatever="<?php echo @$showlist->ID; ?>">
                                                            <i class="fas fa-camera"></i> <strong>แก้ไขรูปภาพ</strong>
                                                        </button>
                                                        <!-- </div> -->
                                                    </div>




                                                <?php } ?>
                                                <br>
                                                <h5 class="card-title"><strong>ลำดับที่ : </strong><?php echo $i; ?><h5>
                                                        <div class="row m-1">
                                                            <div class="col-6 text-right">
                                                                ชื่อ - นามสกุล :
                                                            </div>
                                                            <div class="col-6">
                                                                <label for=""> <?php echo @prefixConvertor($showlist->prefix_name) . '' . $showlist->fname . ' ' . $showlist->lname; ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="row m-1">
                                                            <div class="col-6 text-right">
                                                                ความสัมพันธ์ :
                                                            </div>
                                                            <div class="col-6">
                                                                <label for=""><?php echo @relation($showlist->relation); ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="row m-1">
                                                            <div class="col-6 text-right">
                                                                หมายเลขโทรศัพท์ :
                                                            </div>
                                                            <div class="col-6">
                                                                <label for=""><?php echo $showlist->tel; ?></label>
                                                            </div>
                                                        </div>

                                            </div>
                                            <?php if ($_SESSION['uclass'] != '1') { ?>
                                                <div class="text-center" style="background-color:#f0f8ff00">

                                                    <button type="button" class="mb-1 btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_guest_list" data-whatever="<?php echo @$showlist->ID; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="mb-1 btn btn-outline-danger btn-sm" onclick="deletelist('<?php echo @$showlist->ID; ?>');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>




                    </form>

                </div>



            </div>
            <hr>
            <div class="card broder-warning ">
                <div class="card-header bg-dark text-white font-weight-bold mb-3">
                บุคคลภายนอกได้รับอนุมัติจาก ผสทอภ.
                </div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                        <?php if ($_SESSION['uclass'] != '1') { ?>
                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <label for="card_code2">Code</label>

                                    <input type="text" name="card_code2" id="card_code2" value="<?php echo $guest_detail->code; ?>" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="prefixname2">คำนำหน้าชื่อ</label>
                                    <select name="prefixname2" id="prefixname2" class="form-control" style="width: 100%;">
                                        <option value="">--- เลือกข้อมูล ---</option>
                                        <?php $getprefix = $getdata->my_sql_select($connect, NULL, "members_prefix", "prefix_status ='1'");
                                        while ($showprefix = mysqli_fetch_object($getprefix)) {
                                            echo '<option value="' . $showprefix->prefix_code . '">' . $showprefix->prefix_title . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        เลือก คำนำหน้า.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="fname2">ชื่อบุคคลภายนอก</label>
                                    <input type="text" name="fname2" id="fname2" class="form-control input-sm" placeholder="ชื่อบุคคลภายนอก">
                                    <div class="invalid-feedback">
                                        ระบุ ชื่อบุคคลภายนอก.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="lname2">นามสกุลบุคคลภายนอก</label>
                                    <input type="text" name="lname2" id="lname2" class="form-control input-sm" placeholder="นามสกุลบุคคลภายนอก">
                                    <div class="invalid-feedback">
                                        ระบุ นามสกุลบุคคลภายนอก.
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="tel2">หมายเลขโทรศัพท์</label>
                                    <input type="tel" name="tel2" id="tel2" class="form-control input-sm" placeholder="หมายเลขโทรศัพท์" maxlength="10" pattern="[0-9]{10}">
                                    <div class="invalid-feedback">
                                        ระบุ หมายเลขโทรศัพท์.
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="pic">รูปถ่าย</label>
                                    <input type="file" name="pic" id="pic" class="form-control input-sm" placeholder="รูปถ่าย">
                                    <div class="invalid-feedback">
                                        ระบุ รูปถ่าย.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="relation2">ความสัมพันธ์</label>
                                    <select name="relation2" id="relation2" class="form-control" style="width: 100%;" disabled>
                                        <option value="5" selected>บุคคลภายนอก</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="detail2">เลขที่เอกสารที่ได้รับการอนุมัติ</label>
                                    <input type="text" name="detail2" id="detail2" class="form-control input-sm" placeholder="เลขที่เอกสารที่ได้รับการอนุมัติ">
                                    <div class="invalid-feedback">
                                        ระบุ เลขที่เอกสารที่ได้รับการอนุมัติ.
                                    </div>
                                </div>

                                <div class="col-12 text-center">

                                    <button class="ladda-button btn btn-warning btn-square btn-ladda bg-warning" data-style="expand-left" type="submit" name="save_guest_detail_other">
                                        <span class="fas fa-list-ol"> เพิ่มข้อมูลบุคคลภายนอก</span>
                                        <span class="ladda-spinner"></span>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="col-12 mt-5">
                            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                                <!-- style="width: 108%" -->
                                <?php
                                $i = 0;
                                $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' AND relation = '5' ORDER BY create_time");
                                while ($showlist = mysqli_fetch_object($getdetail)) {
                                    $i++
                                ?>


                                    <div class="col">
                                        <div class="card h-100">
                                            <!-- <img class="card-img-top" src="../../assets/img/elements/2.jpg" alt="Card image cap" /> -->
                                            <?php
                                            if ($showlist->pic == null) {
                                                echo '<img class="card-img-center mx-auto" src="../resource/guest/file_pic_now/no-img.png" width="200px" height="200px">';
                                            } else {
                                                echo '<img class="card-img-center mx-auto" src="../resource/guest/delevymo/' . $showlist->pic . '" width="200px" height="200px">';
                                            }
                                            ?>





                                            <div class="card-body">
                                                <?php if ($_SESSION['uclass'] != '1') { ?>
                                                    <!-- <a class="btn btn-sm btn-info ml-auto text-white" data-toggle="modal" data-target="#edit_guest_list_pic" data-whatever="<?php echo @$showlist->ID; ?>"><i class="fas fa-camera"></i> <strong>แก้ไขรูปภาพ</strong></a> -->
                                                    <div class="row">
                                                        <!-- <div class="mx-auto"> -->
                                                        <button type="button" class="btn btn-sm btn-warning ml-auto text-white" data-bs-toggle="modal" data-bs-target="#edit_guest_list_pic" data-whatever="<?php echo @$showlist->ID; ?>">
                                                            <i class="fas fa-camera"></i> <strong>แก้ไขรูปภาพ</strong>
                                                        </button>
                                                        <!-- </div> -->
                                                    </div>




                                                <?php } ?>
                                                <br>
                                                <h5 class="card-title"><strong>ลำดับที่ : </strong><?php echo $i; ?><h5>
                                                        <div class="row m-1">
                                                            <div class="col-6 text-right">
                                                                ชื่อ - นามสกุล :
                                                            </div>
                                                            <div class="col-6">
                                                                <label for=""> <?php echo @prefixConvertor($showlist->prefix_name) . '' . $showlist->fname . ' ' . $showlist->lname; ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="row m-1">
                                                            <div class="col-6 text-right">
                                                                ความสัมพันธ์ :
                                                            </div>
                                                            <div class="col-6">
                                                                <label for=""><?php echo @relation($showlist->relation); ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="row m-1">
                                                            <div class="col-6 text-right">
                                                                หมายเลขโทรศัพท์ :
                                                            </div>
                                                            <div class="col-6">
                                                                <label for=""><?php echo $showlist->tel; ?></label>
                                                            </div>
                                                        </div>

                                            </div>
                                            <?php if ($_SESSION['uclass'] != '1') { ?>
                                                <div class="text-center" style="background-color:#f0f8ff00">

                                                    <button type="button" class="mb-1 btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_guest_list" data-whatever="<?php echo @$showlist->ID; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="mb-1 btn btn-outline-danger btn-sm" onclick="deletelist('<?php echo @$showlist->ID; ?>');">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>




                    </form>

                </div>



            </div>
        </div>
        <!-- <div class="card-footer text-center"> -->
        <div class="card">
            <div class="card-body text-center">
                <?php if ($guest_detail->status == '0' || $guest_detail->status == '9' || $_SESSION['uclass'] == '1') { ?>
                    <a href="index.php" class="btn btn-md btn-danger" onclick="window.close();"><i class="fa fa-reply"></i> ปิดหน้าแท็บ</a>
                    <button class="btn btn-success btn-next btn-md" type="submit" data-bs-toggle="modal" data-bs-target="#save_guest">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1">ยืนยันข้อมูล</span>
                        <i class='bx bx-save'></i>
                    </button>
                <?php } else { ?>
                    <a href="index.php" class="btn btn-md btn-danger" onclick="window.close();"><i class="fa fa-reply"></i> ปิดหน้าแท็บ</a>
                    <button class="btn btn-success btn-next btn-md" type="submit" data-bs-toggle="modal" data-bs-target="#save_guest">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1">ยืนยันข้อมูล</span>
                        <i class='bx bx-save'></i>
                    </button>
                    <!-- <button class="ladda-button btn btn-warning btn-square btn-ladda bg-success" data-style="expand-left" type="button" data-toggle="modal" data-target="#save_guest">
                        <span class=""> </span>
                        <span class="ladda-spinner"></span>
                    </button> -->
                <?php } ?>
            </div>
        </div>

        <!-- </div> -->
    </div>
</div>

<script>
    var phoneNumberInput = document.getElementById("tel");
  var errorMessage = document.getElementById("error-message");

  phoneNumberInput.addEventListener("input", function() {
    var phoneNumber = phoneNumberInput.value;
    if (!/^\d+$/.test(phoneNumber)) {
      errorMessage.textContent = "กรุณากรอกเฉพาะตัวเลขโทรศัพท์มือถือ";
    } else {
      errorMessage.textContent = "";
    }
  });

</script>
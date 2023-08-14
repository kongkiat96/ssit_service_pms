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
        <h3 class="page-header"><i class="fas fa-users fa-2x"></i> <span>เพิ่มรายละเอียดบริวาร</span></h3>
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
<div class="mb-3">
    <div class="col-12">
        <ul class="progressbar" style="width: 111%">
            <li class="active">เพิ่มข้อมูลเจ้าหน้าที่</li>
            <li class="active">เพิ่มข้อมูลบริวาร</li>
            <?php if ($guest_detail->sys_procress == '0') {
                echo '<li class=""><span class="badge badge-warning">รอการยืนยันข้อมูล</span></li>';
            } elseif ($guest_detail->sys_procress == '1') {
                if ($guest_detail->status == '0') {
                    echo '<li class="active">ยืนยันข้อมูลออกพัก</li>';
                } else {
                    echo '<li class="active"><span class="badge badge-success">ยืนยันข้อมูลเข้าพัก</span></li>';
                }
            } else {
                echo '<li class="active"><span class="badge badge-danger">ยกเลิกข้อมูลเข้าพัก</span></li>';
            }
            ?>

        </ul>
    </div>
</div>
<?php echo @$alert; ?>

<!-- Modal Edit Detail -->
<div class="modal fade" id="edit_guest" role="dialog" aria-labelledby="edit_guest" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="guest">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_edit_guest">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                        <span class="ladda-spinner"></span>
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
                    <h5 class="modal-title">แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="pic">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_edit_guest_pic">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                        <span class="ladda-spinner"></span>
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
                    <h5 class="modal-title">แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="room">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_edit_guest_room">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit List -->
<div class="modal fade" id="edit_guest_list" role="dialog" aria-labelledby="edit_guest_list" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขข้อมูลบริวาร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="guest_list">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_edit_guest_detail">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                        <span class="ladda-spinner"></span>
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
                    <h5 class="modal-title">แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="list_pic">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_edit_guest_list_pic">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->

<div class="modal fade" id="save_guest" role="dialog" aria-labelledby="save_guest" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate id="waitsave3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ยืนยันข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="sys_procress">สถานะปัจจุบัน</label>
                            <select name="sys_procress" id="sys_procress" class="form-control select2bs4" required style="width: 100%;">
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
                        <div class="col-12">
                            <label for="show_guest_follow">แสดงข้อมูลบริวาร</label>
                            <select name="show_guest_follow" id="show_guest_follow" class="form-control select2bs4" required style="width: 100%;">
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
                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_confirm">
                        <span class="fas fa-save"> บันทึก</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="card mb-3">
    <div class="card-header bg-success text-white font-weight-bold">
        <div class="row">
            <span class="ml-3">รายละเอียด</span>
            <?php if ($_SESSION['uclass'] != '1') { ?>
                <div class="col-6 ml-auto text-right">
                    <a class="btn btn-md btn-info " data-toggle="modal" data-target="#edit_guest" data-whatever="<?php echo @$guest_detail->key_guest; ?>"><i class="fas fa-edit"></i> เพิ่มสถานะและแก้ไขข้อมูล</a>
                    <a class="btn btn-md btn-warning " data-toggle="modal" data-target="#edit_guest_room" data-whatever="<?php echo @$guest_detail->key_guest; ?>"><i class="fas fa-edit"></i> แก้ไขข้อมูลเข้าห้องพัก</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group row text-center">
            <div class="col-md-3">
                <?php
                if ($guest_detail->pic == null) {
                    echo '<img class="img-thumbnail" src="../resource/guest/file_pic_now/no-img.png" width="100%">';
                } else {
                    echo '<img class="img-thumbnail" src="../resource/guest/delevymo/' . $guest_detail->pic . '" width="70%">';
                }
                ?>
                <br>
                <?php if ($_SESSION['user_class'] == '3') { ?>
                    <a class="btn btn-sm btn-info ml-auto text-white" data-toggle="modal" data-target="#edit_guest_pic" data-whatever="<?php echo @$guest_detail->key_guest; ?>"><i class="fas fa-camera"></i> แก้ไขรูปภาพ</a>
                <?php } ?>
            </div>
            <div class="col-md-9">
                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>ชื่อ - นามสกุล : </strong></label>
                    </div>
                    <div class="col-md-3 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php echo @prefixConvertor($guest_detail->prefix_name).$guest_detail->fname . ' ' . $guest_detail->lname; ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>ตำแหน่ง : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code">
                            <?php
                            //echo @prefixConvertorDepartment($guest_detail->position); 
                            echo @$guest_detail->position;
                            ?></label>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="department"><strong>สังกัด : </strong></label>
                    </div>
                    <div class="col-md-3 col-sm-6 text-md-left text-sm-center">
                        <label for="department"><?php echo getDepartName($guest_detail->department); ?></label>
                    </div>
                    <div class="col-md-3 col-sm-6 text-md-right text-sm-center">
                        <label for="status_guest"><strong>สถานะ : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="status_guest">
                            <?php
                            echo @status_guest($guest_detail->status_guest);
                            ?></label>
                    </div>
                </div>
                <?php
                if ($guest_detail->status_guest == '3') { ?>
                    <div class="form-group row mt-2">
                        <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                            <label for="prefix_name"><strong>วันที่สิ้นสุดโครงการ : </strong></label>
                        </div>
                        <div class="col-md-3 col-sm-6 text-md-left text-sm-center">
                            <label for="prefix_code"><?php  echo @dateConvertor($guest_detail->end_date); ?></label>
                        </div>
                    </div>
                <?php } ?>


                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>หมายเลขโทรศัพท์ : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php echo $guest_detail->tel; ?></label>
                    </div>
                    <?php if ($_SESSION['uclass'] != '1') { ?>
                        <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                            <label for="prefix_name"><strong>เลขบัตรประจำตัวประชาชน : </strong></label>
                        </div>
                        <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                            <label for="prefix_code"><?php echo $guest_detail->id_card; ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>สถานะ : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php if ($guest_detail->status == '1') {
                                                        echo '<span class="badge badge-warning">รอการยืนยันเข้าพัก</span>';
                                                    } elseif ($guest_detail->status == '2') {
                                                        echo '<span class="badge badge-success">เข้าพัก</span>';
                                                    } elseif ($guest_detail->status == '9') {
                                                        echo '<span class="badge badge-danger">ยกเลิกข้อมูล</span>';
                                                    } else {
                                                        echo '<span class="badge badge-danger">ออกจากห้องพัก</span>';
                                                    } ?></label>
                    </div>
                    <?php if ($_SESSION['uclass'] != '1') { ?>
                        <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                            <label for="prefix_name"><strong>วันที่เข้าพัก : </strong></label>
                        </div>
                        <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                            <label for="prefix_code"><?php if ($guest_detail->check_in == NULL) {
                                                            echo '<span class="badge badge-danger">ยังไม่มีการระบุ</span>';
                                                        } else {
                                                            echo @dateOnlyFromTimeConvertor($guest_detail->check_in);
                                                        } ?></label>
                        </div>
                    <?php } ?>

                </div>

                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>จำนวนบริวาร : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $guest_detail->code . "'");
                                                    echo $count_guest_detail; ?> ท่าน</label>
                    </div>
                    <?php if ($_SESSION['uclass'] != '1') { ?>
                        <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                            <label for="prefix_name"><strong>วันที่ออกจากห้องพัก : </strong></label>
                        </div>
                        <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                            <label for="prefix_code"><?php if ($guest_detail->check_out == NULL) {
                                                            echo '<span class="badge badge-danger">ยังไม่มีการระบุ</span>';
                                                        } else {
                                                            echo @dateOnlyFromTimeConvertor($guest_detail->check_out);
                                                        } ?></label>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>ชื่ออาคาร : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php echo @building($guest_detail->building); ?></label>
                    </div>

                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>ชื่อชั้น : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php echo @prefixConvertorService($guest_detail->floor); ?></label>
                    </div>
                </div>

                <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>ชื่อห้อง/รหัสห้อง : </strong></label>
                    </div>
                    <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php echo @prefixConvertorServiceList($guest_detail->room); ?></label>
                    </div>

                </div>

                <!-- <div class="form-group row mt-2">
                    <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                        <label for="prefix_name"><strong>รายละเอียดเพิ่มเติม : </strong></label>
                    </div>
                    <div class="col-md-8 col-sm-6 text-md-left text-sm-center">
                        <label for="prefix_code"><?php
                                                    if ($guest_detail->detail == NULL) {
                                                        echo '<strong class ="text-danger">ไม่มีข้อมูล</strong>';
                                                    } else {
                                                        echo $guest_detail->detail;
                                                    }
                                                    ?></label>
                    </div>

                </div> -->
                <?php if ($_SESSION['uclass'] != '1') { ?>
                    <div class="form-group row mt-2">
                        <div class="col-md-4 col-sm-6 text-md-right text-sm-center">
                            <label for="prefix_name"><strong>ผู้บันทึกข้อมูล : </strong></label>
                        </div>
                        <div class="col-md-2 col-sm-6 text-md-left text-sm-center">
                            <label for="prefix_code"><?php echo @getemployee($guest_detail->user_key); ?></label>
                        </div>
                    </div>
                <?php } ?>
            </div>



        </div>

    </div>
    <div class="card broder-warning ">
        <div class="card-header bg-dark text-white font-weight-bold">
            ข้อมูลบริวาร
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">
                <?php if ($_SESSION['uclass'] != '1') { ?>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="card_code">Code</label>

                            <input type="text" name="card_code" id="card_code" value="<?php echo $guest_detail->code; ?>" class="form-control input-sm" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-12">
                            <label for="prefixname">คำนำหน้าชื่อ</label>
                            <select name="prefixname" id="prefixname" class="form-control select2bs4" style="width: 100%;">
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
                        <div class="col-md-4 col-sm-12">
                            <label for="fname">ชื่อบริวาร</label>
                            <input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="ชื่อบริวาร">
                            <div class="invalid-feedback">
                                ระบุ ชื่อบริวาร.
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="lname">นามสกุลบริวาร</label>
                            <input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="นามสกุลบริวาร">
                            <div class="invalid-feedback">
                                ระบุ นามสกุลบริวาร.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-12">
                            <label for="position">ตำแหน่ง (ถ้ามี)</label>
                            <!-- <select name="position" id="position" class="form-control select2bs4" style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <?php
                                //$getprefix = $getdata->my_sql_select($connect, NULL, "department_name");
                                //while ($showprefix = mysqli_fetch_object($getprefix)) {
                                //    echo '<option value="' . $showprefix->id . '">' . $showprefix->department_name . '</option>';
                                //}
                                ?>
                            </select> -->
                            <input type="text" name="position" id="position" class="form-control input-sm" placeholder="ตำแหน่ง (ถ้ามี)">
                            <div class="invalid-feedback">
                                ระบุ ตำแหน่ง.
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="tel">หมายเลขโทรศัพท์</label>
                            <input type="tel" name="tel" id="tel" class="form-control input-sm" placeholder="หมายเลขโทรศัพท์">
                            <div class="invalid-feedback">
                                ระบุ หมายเลขโทรศัพท์.
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="idcard">เลขบัตรประจำตัวประชาชน/หนังสือเดินทาง</label>
                            <input type="text" name="idcard" id="idcard" class="form-control input-sm" placeholder="เลขบัตรประจำตัวประชาชน/หนังสือเดินทาง">
                            <div class="invalid-feedback">
                                ระบุ เลขบัตรประจำตัวประชาชน/หนังสือเดินทาง.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-4 col-sm-12">
                            <label for="pic">รูปถ่าย</label>
                            <input type="file" name="pic" id="pic" class="form-control input-sm" placeholder="รูปถ่าย">
                            <div class="invalid-feedback">
                                ระบุ รูปถ่าย.
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="relation">ความสัมพันธ์</label>
                            <select name="relation" id="relation" class="form-control select2bs4" style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <option value="1">บุตร</option>
                                <option value="2">คู่สมรส</option>
                                <option value="3">บิดา</option>
                                <option value="4">มารดา</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="detail">รายละเอียดเพิ่มเติม (ถ้ามี)</label>
                            <textarea name="detail" id="" cols="20" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 text-center">

                            <button class="ladda-button btn btn-warning btn-square btn-ladda bg-warning" data-style="expand-left" type="submit" name="save_guest_detail">
                                <span class="fas fa-list-ol"> เพิ่มข้อมูล</span>
                                <span class="ladda-spinner"></span>
                            </button>
                        </div>
                    </div>
                <?php } ?>


                <div class="col-12">
                    <div class="row">
                        <!-- style="width: 108%" -->
                        <?php
                        $i = 0;
                        $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' ORDER BY create_time");
                        while ($showlist = mysqli_fetch_object($getdetail)) {
                            $i++
                        ?>

                            <div class="card col-md-4 col-sm-12 mt-3" style="border:0px solid #e5e9f2">
                                <div class="card-header text-center" style="background-color:#f0f8ff00">
                                    <?php
                                    if ($showlist->pic == null) {
                                        echo '<img class="img-thumbnail text-center" src="../resource/guest/file_pic_now/no-img.png" width="100%">';
                                    } else {
                                        echo '<img class="img-thumbnail" src="../resource/guest/delevymo/' . $showlist->pic . '" width="60%">';
                                    }
                                    ?>
                                    <br>
                                    <?php if ($_SESSION['uclass'] != '1') { ?>
                                        <a class="btn btn-sm btn-info ml-auto text-white" data-toggle="modal" data-target="#edit_guest_list_pic" data-whatever="<?php echo @$showlist->ID; ?>"><i class="fas fa-camera"></i> แก้ไขรูปภาพ</a>
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>ลำดับที่ : </strong><?php echo $i; ?><h5>
                                            <div class="row m-1">
                                                <div class="col-6 text-right">
                                                    ชื่อ - นามสกุล :
                                                </div>
                                                <div class="col-6">
                                                    <label for=""> <?php echo @prefixConvertor($showlist->prefix_name) . ' ' . $showlist->fname . ' ' . $showlist->lname; ?></label>
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
                                    <div class="card-footer text-center" style="background-color:#f0f8ff00">
                                        <a data-toggle="modal" data-target="#edit_guest_list" data-whatever="<?php echo @$showlist->ID; ?>" class="btn btn-sm btn-outline-info" title="แก้ไข"><i class="fas fa-edit"></i></a>

                                        <a onclick="deletelist('<?php echo @$showlist->ID; ?>');" class="btn btn-sm btn-outline-danger" title="ลบ"><i class="fa fa-times"></i></a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>




            </form>

        </div>



    </div>
    <div class="card-footer text-center">

        <?php if ($guest_detail->status == '0' || $guest_detail->status == '9' || $_SESSION['uclass'] == '1') { ?>
            <a href="#" class="btn btn-xs btn-outline-danger" onclick="window.close();"><i class="fa fa-reply"></i> กลับ</a>

        <?php } else { ?>
            <a href="index.php" class="btn btn-lg btn-danger" onclick="window.close();"><i class="fa fa-reply"></i> กลับ</a>
            <button class="ladda-button btn btn-warning btn-square btn-ladda bg-success" data-style="expand-left" type="button" data-toggle="modal" data-target="#save_guest">
                <span class="fas fa-save"> ยืนยันข้อมูล</span>
                <span class="ladda-spinner"></span>
            </button>
        <?php } ?>
    </div>
</div>
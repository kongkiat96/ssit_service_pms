<?php $getmenus = $getdata->my_sql_query($connect, null, 'menus', "menu_status ='1' AND menu_case = '" . $_GET['p'] . "' AND menu_key != 'c6c8729b45d1fec563f8453c16ff03b8'"); ?>

<div class="row">
    <div class="col-12">
        <h3 class="page-header"><?php echo '<i class="fas ' . $getmenus->menu_icon . '"></i> <span>' . $getmenus->menu_name . '</span>'; ?></h3>
        <hr class="mt-2">
    </div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo '<span>' . $getmenus->menu_name . '</span>'; ?></li>
    </ol>
</nav>



<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>รายการผู้เข้าพัก <?php echo '<span>' . $getmenus->menu_name . '</span>'; ?></h2>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php
            $i = 0;
            $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '1' AND se_status = '1'");
            while ($showlist = mysqli_fetch_object($getbuilding)) {
                $i++
            ?>
                <li class="nav-item">
                    <a class="nav-link" id="pills-building_<?php echo $showlist->se_id; ?>-tab" data-toggle="pill" href="#pills-building_<?php echo $showlist->se_id; ?>" role="tab" aria-controls="pills-building_<?php echo $showlist->se_id; ?>" aria-selected="true"><i class="fas fa-hotel"> &nbsp <?php echo $showlist->se_name; ?></i></a>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php
            $i = 0;
            $getbuilding_detail = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '1' AND se_status = '1'");
            while ($showlist_detail = mysqli_fetch_object($getbuilding_detail)) {
                $i++
            ?>
                <div class="tab-pane fade" id="pills-building_<?php echo $showlist_detail->se_id; ?>" role="tabpanel" aria-labelledby="pills-building_<?php echo $showlist_detail->se_id; ?>-tab">

                    <div class="row ">
                        <div class="col-sm-2">
                            <ul class="nav nav-tabs nav-stacked flex-column">
                                <?php
                                $i = 0;
                                $getfloor = $getdata->my_sql_select($connect, NULL, "service_list", "se_id = '" . $showlist_detail->se_id . "' AND se_group = '1' AND se_li_status != '0'");
                                while ($showfloor = mysqli_fetch_object($getfloor)) {
                                    $i++
                                ?>
                                    <li class="nav-item">
                                        <a href="#vtab_<?php echo $showfloor->se_li_id; ?>" class="nav-link" data-toggle="tab" aria-expanded="true">
                                            <i class="mdi mdi-home"></i> รหัสห้อง <?php echo $showfloor->se_li_name; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="tab-content col-sm-10">
                            <?php
                            $i = 0;
                            $getfloor_detail = $getdata->my_sql_select($connect, NULL, "service_list", "se_id = '" . $showlist_detail->se_id . "' AND se_group = '1' AND se_li_status != '0'");
                            while ($showfloor_detail = mysqli_fetch_object($getfloor_detail)) {
                                $i++
                            ?>
                                <div class="tab-pane fade" id="vtab_<?php echo $showfloor_detail->se_li_id; ?>" aria-expanded="true">
                                    <?php
                                    $guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "room = '" . $showfloor_detail->se_li_id . "' AND status = '2' AND sys_procress = '1'");
                                    $check = $getdata->my_sql_show_rows($connect, "bm_guest", "room = '" . $showfloor_detail->se_li_id . "' AND status = '2' AND sys_procress = '1'");
                                    ?>

                                    <?php
                                    if ($check == '0') {
                                        echo '<div class="alert alert-info" role="alert"><b>รหัสห้อง <u>' . $showfloor_detail->se_li_name . '</U> สถานะ ว่าง </b></div>';
                                    } else { ?>
                                        <div class="card card-default bg-light">
                                            <div class="card-header card-header-border-bottom">
                                                <h2> รหัสห้อง <u> <?php echo $showfloor_detail->se_li_name; ?></U></h2>
                                                <?php if ($_SESSION['uclass'] == '3') { ?>
                                                    <a href="index.php?p=guest_detail&key=<?php echo $guest_detail->key_guest; ?>" class="btn btn-md btn-primary ml-auto" target="_blank"><i class="fas fa-edit"></i> เปลี่ยนแปลงข้อมูล</a>
                                                <?php } ?>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="row text-center">
                                                            <div class="col-md-4 col-sm-12">
                                                                <?php
                                                                if ($guest_detail->pic == null) {
                                                                    echo '<img class="img-thumbnail" src="../resource/guest/file_pic_now/no-img.png" width="100%">';
                                                                } else {
                                                                    echo '<img class="img-thumbnail" src="../resource/guest/delevymo/' . $guest_detail->pic . '" width="90%">';
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-8 col-sm-12 mt-3">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>ชื่อ - นามสกุล : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <h5> <label for="prefix_code"><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></label></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>ตำแหน่ง : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <h5> <label for="prefix_code"><?php echo $guest_detail->position; ?></label></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>สังกัด : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <h5> <label for="prefix_code"><?php echo getDepartName($guest_detail->department); ?></label></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>สถานะผู้เข้าพัก : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <h5> <label for="prefix_code"><?php echo @status_guest($guest_detail->status_guest); ?></label></h5>
                                                                    </div>
                                                                </div>
                                                                <?php if ($guest_detail->status_guest == '3') { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                            <h5><label for="prefix_name"><strong>วันที่สิ้นสุดสัญญา : </strong></label></h5>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                            <h5> <label for="prefix_code"><?php echo @dateConvertor($guest_detail->end_date); ?></label></h5>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>หมายเลขโทรศัพท์ : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <h5> <label for="prefix_code"><?php echo $guest_detail->tel; ?></label></h5>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>สถานะ : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <h5> <label for="prefix_code"><?php if ($guest_detail->status == '1') {
                                                                                                            echo '<span class="badge badge-warning">รอการยืนยันเข้าพัก</span>';
                                                                                                        } elseif ($guest_detail->status == '2') {
                                                                                                            echo '<span class="badge badge-success">เข้าพัก</span>';
                                                                                                        } elseif ($guest_detail->status == '9') {
                                                                                                            echo '<span class="badge badge-danger">ยกเลิกข้อมูล</span>';
                                                                                                        } else {
                                                                                                            echo '<span class="badge badge-danger">ออกจากห้องพัก</span>';
                                                                                                        } ?></label></h5>
                                                                    </div>
                                                                </div>
                                                                <?php if ($_SESSION['uclass'] != '1') { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                            <h5><label for="prefix_name"><strong>วันที่เข้าพัก : </strong></label></h5>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                            <h5> <label for="prefix_code"><?php if ($guest_detail->check_in == NULL) {
                                                                                                                echo '<span class="badge badge-danger">ยังไม่มีการระบุ</span>';
                                                                                                            } else {
                                                                                                                echo @dateOnlyFromTimeConvertor($guest_detail->check_in);
                                                                                                            } ?></label></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                            <h5><label for="prefix_name"><strong>วันที่ออกจากห้องพัก : </strong></label></h5>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                            <h5> <label for="prefix_code"><?php if ($guest_detail->check_out == NULL) {
                                                                                                                echo '<span class="badge badge-danger">ยังไม่มีการระบุ</span>';
                                                                                                            } else {
                                                                                                                echo @dateOnlyFromTimeConvertor($guest_detail->check_out);
                                                                                                            } ?></label></h5>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                        <h5><label for="prefix_name"><strong>จำนวนบริวาร : </strong></label></h5>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 text-sm-center">
                                                                        <?php if ($guest_detail->status_guest_detail == '1') { ?>
                                                                            <h5> <label for="prefix_code"><?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $guest_detail->code . "'");
                                                                                                            echo $count_guest_detail; ?> ท่าน</label></h5>
                                                                        <?php } else { ?>
                                                                            <h5> <label for="prefix_code"> ไม่แจ้งบริวาร</label></h5>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>
                                                                <?php if ($guest_detail->detail != NULL) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                            <h5><label for="prefix_name"><strong>รายละเอียดเพิ่มเติม : </strong></label></h5>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                            <h5> <label for="prefix_code"><?php echo $guest_detail->detail; ?></label></h5>
                                                                        </div>
                                                                    </div>

                                                                <?php } ?>

                                                                <?php if ($_SESSION['uclass'] != '1') { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                            <h5><label for="prefix_name"><strong>ผู้บันทึกข้อมูล : </strong></label></h5>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                            <h5> <label for="prefix_code"><?php echo @getemployee($guest_detail->user_key); ?></label></h5>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr>
                                                <?php if ($guest_detail->status_guest_detail == '1') { ?>

                                                    <?php if ($count_guest_detail != '0') { ?>
                                                        <div class="col-12">
                                                            <div class="alert alert-success" role="alert"><b>ข้อมูลบริวารของเจ้าหน้าที่ <u><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></u></b></div>
                                                            <div class="row">
                                                                <!-- style="width: 108%" -->
                                                                <?php
                                                                $i = 0;
                                                                $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $guest_detail->code . "' ORDER BY create_time");
                                                                while ($showlist = mysqli_fetch_object($getdetail)) {
                                                                    $i++
                                                                ?>

                                                                    <div class="card col-md-6 col-sm-12  bg-light" style="border:0px solid #e5e9f2">
                                                                        <div class="card-header" style="background-color:#f0f8ff00; justify-content: center;">
                                                                            <?php
                                                                            if ($showlist->pic == null) {
                                                                                echo '<img class="img-thumbnail text-center" src="../resource/guest/file_pic_now/no-img.png" width="100%">';
                                                                            } else {
                                                                                echo '<img class="img-thumbnail" src="../resource/guest/delevymo/' . $showlist->pic . '" width="60%">';
                                                                            }
                                                                            ?>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><strong>ลำดับที่ : </strong><?php echo $i; ?><h5>
                                                                                    <div class="row m-1">
                                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                                            ชื่อ - นามสกุล :
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                                            <label for=""> <?php echo @prefixConvertor($showlist->prefix_name) . ' ' . $showlist->fname . ' ' . $showlist->lname; ?></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row m-1">
                                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                                            ความสัมพันธ์ :
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                                            <label for=""><?php echo @relation($showlist->relation); ?></label>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row m-1">
                                                                                        <div class="col-md-6 col-sm-12 text-sm-center text-md-right">
                                                                                            หมายเลขโทรศัพท์ :
                                                                                        </div>
                                                                                        <div class="col-md-6 col-sm-12 text-sm-center">
                                                                                            <label for=""><?php echo $showlist->tel; ?></label>
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
                                                <?php } ?>



                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
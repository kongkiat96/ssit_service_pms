<?php
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
if (isset($_POST['search'])) {
    if ($_POST['date_start'] != null && $_POST['date_end'] != null) {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out,bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department,
        bm_guest_detail.prefix_name AS gdetail_prefix, bm_guest_detail.fname AS gdetail_fname,bm_guest_detail.lname AS gdetail_lname,bm_guest_detail.relation AS gdetail_relation", "bm_guest LEFT JOIN bm_guest_detail ON bm_guest_detail.code_guest = bm_guest.code", "check_in >= '" . $date_start . "'  AND check_in <= '" . $date_end . "' AND bm_guest.status != '9'");
    } elseif ($_POST['date_start'] != null && $_POST['date_end'] == null) {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out, bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department,
        bm_guest_detail.prefix_name AS gdetail_prefix, bm_guest_detail.fname AS gdetail_fname,bm_guest_detail.lname AS gdetail_lname,bm_guest_detail.relation AS gdetail_relation", "bm_guest LEFT JOIN bm_guest_detail ON bm_guest_detail.code_guest = bm_guest.code", "check_in >= '" . $date_start . "' AND bm_guest.status != '9'");
    } elseif ($_POST['date_start'] == null && $_POST['date_end'] != null) {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out, bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department,
        bm_guest_detail.prefix_name AS gdetail_prefix, bm_guest_detail.fname AS gdetail_fname,bm_guest_detail.lname AS gdetail_lname,bm_guest_detail.relation AS gdetail_relation", "bm_guest LEFT JOIN bm_guest_detail ON bm_guest_detail.code_guest = bm_guest.code", "check_in <= '" . $date_end . "' AND bm_guest.status != '9'");
    } else {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out, bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department,
        bm_guest_detail.prefix_name AS gdetail_prefix, bm_guest_detail.fname AS gdetail_fname,bm_guest_detail.lname AS gdetail_lname,bm_guest_detail.relation AS gdetail_relation", "bm_guest LEFT JOIN bm_guest_detail ON bm_guest_detail.code_guest = bm_guest.code", "bm_guest.status != '9'");
    }
}

?>

<?php $getmenus = $getdata->my_sql_query($connect, null, 'menus', "menu_status ='1' AND menu_case = '" . $_GET['p'] . "' AND menu_key != 'c6c8729b45d1fec563f8453c16ff03b8'"); ?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><?php echo '<i class="fas ' . $getmenus->menu_icon . '"></i> <span>' . $getmenus->menu_name . '</span>'; ?></h3>
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
<?php echo $alert; ?>
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>รายงานผู้เข้าห้องพัก/ออกห้องพัก ประจำปี <?php echo date('Y') + 543; ?></h2>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-style-border pl-0 justify-content-between justify-content-xl-start" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="employee-tab" data-toggle="tab" href="#employee" role="tab" aria-controls="employee" aria-selected="true">รายงานผู้เข้าพัก/ออกพัก</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent3">
            <div class="row mt-3 mb-0">
                <div class="col-md-4 col-sm-12">
                    <div class="media widget-media p-4 bg-white border">
                        <i class="mdi mdi-account-group text-blue mr-4"></i>
                        <div class="media-body align-self-center">
                            <h4 class="text-primary mb-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "bm_guest", "key_guest <> 'hidden' AND sys_procress = '1'");
                                                            echo @number_format($getall); ?></h4>
                            <p>จำนวนผู้เข้าห้องพัก/ออกห้องพักทั้งสิ้น</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="media widget-media p-4 rounded bg-white border">
                        <i class="mdi mdi-login text-success mr-4"></i>
                        <div class="media-body align-self-center">
                            <h4 class="text-success mb-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "bm_guest", "key_guest <> 'hidden' AND status = '2'");
                                                            echo @number_format($getall); ?></h4>
                            <p>จำนวนผู้เข้าห้องพัก</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="media widget-media p-4 rounded bg-white border">
                        <i class="mdi mdi-logout text-danger mr-4"></i>
                        <div class="media-body align-self-center">
                            <h4 class="text-danger mb-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "bm_guest", "key_guest <> 'hidden' AND status = '1'");
                                                            echo @number_format($getall); ?></h4>
                            <p>จำนวนผู้ออกจากห้องพัก</p>
                        </div>
                    </div>
                </div>


            </div>
            <hr>

            <div class="tab-pane pt-3 fade show active" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                <div class="row">
                    <div class="col-12 text-center">
                        <form action="<?php echo $SERVER_NAME; ?>" method="post">
                            <div class="form-group row">
                                <div class="col-md-2 col-sm-12">
                                    <label for="date_start">วันที่เข้าห้องพัก</label>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <input type="date" name="date_start" id="date_start" class="form-control" onfocus="this.value=''" value="<?php echo $date_start; ?>">
                                </div>
                                <div class="col-2"><label for="to">ถึง</label></div>
                                <div class="col-md-2 col-sm-12">
                                    <label for="date_end">วันที่ออกห้องพัก</label>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <input type="date" name="date_end" id="date_end" class="form-control" placeholder="" onfocus="this.value=''" value="<?php echo $date_end; ?>">
                                </div>
                            </div>
                            <?php if (isset($_POST['search'])) { ?>
                                <button class="ladda-button btn btn-primary btn-square btn-ladda bg-danger" onclick="reloadPage()" data-style="expand-left">
                                    <span class="fas fa-trash-alt"> ล้างค่า</span>
                                    <span class="ladda-spinner"></span>
                                </button>

                                <button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" data-style="expand-left" type="submit" name="search">
                                    <span class="fas fa-file-download"> ค้นหา</span>
                                    <span class="ladda-spinner"></span>
                                </button>
                            <?php } else { ?>
                                <button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" data-style="expand-left" type="submit" name="search">
                                    <span class="fas fa-file-download"> ค้นหา</span>
                                    <span class="ladda-spinner"></span>
                                </button>
                            <?php } ?>
                        </form>

                    </div>
                </div>
                <?php if (isset($_POST['search'])) { ?>
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="responsive-data-table">

                                <table id="example" class="table dt-responsive nowrap hover" style="font-family: sarabun; font-size: 14px; text-align: center;" width="100%">
                                    <thead class="font-weight-bold text-center">
                                        <tr>
                                            <td>ลำดับ</td>
                                            <td>ชื่อ - นาสกุลเจ้าหน้าที่</td>
                                            <td>ตำแหน่ง/สังกัด</td>
                                            <td>รหัสห้อง</td>
                                            <td>ชื่อ - นามสกุลบริวาร</td>
                                            <!-- <td>ความสัมพันธ์</td>
                                            <td>วันที่เข้าห้องพัก</td>
                                            <td>วันที่ออกห้องพัก</td> 
                                            <td>สถานะ</td> -->
                                            <td>รหัสอ้างอิง</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while ($show_total = mysqli_fetch_object($getquery)) {
                                            $i++ ?>

                                            <tr>

                                                <td><?php echo $i; ?></td>
                                                <td><?php echo @prefixConvertor($show_total->g_prefix) . ' ' . $show_total->g_fname . ' ' . $show_total->g_lname; ?></td>
                                                <td><?php echo $show_total->g_position . " / " . getDepartName($show_total->g_department); ?></td>
                                                <td><?php echo @prefixConvertorServiceList($show_total->room); ?></td>
                                                <td><?php echo @prefixConvertor($show_total->gdetail_prefix) . ' ' . $show_total->gdetail_fname . ' ' . $show_total->gdetail_lname; ?></td>
                                                <!-- <td>บริวาร / ความสัมพันธ์ : <?php echo @relation($show_total->gdetail_relation); ?></td>
                                                <td><?php echo @dateTimeConvertor($show_total->check_in); ?></td>
                                                <td><?php echo @dateTimeConvertor($show_total->check_out); ?></td>
                                                <td><?php if ($show_total->status == '1') {
                                                        echo 'รอการยืนยันเข้าพัก';
                                                    } elseif ($show_total->status == '2') {
                                                        echo 'เข้าพัก';
                                                    } else {
                                                        echo 'ออกจากห้องพัก';
                                                    } ?></td>  -->
                                                <td><?php echo $show_total->code; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
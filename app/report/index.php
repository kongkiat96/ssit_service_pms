<?php
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$building = $_POST['building'];
if (isset($_POST['search'])) {
    if ($_POST['date_start'] != null && $_POST['date_end'] != null) {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.building,bm_guest.floor,bm_guest.end_date,bm_guest.status_guest_detail,bm_guest.status_guest,bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out,bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department", "bm_guest", "check_in >= '" . $date_start . "'  AND check_in <= '" . $date_end . "' AND bm_guest.status != '9'  AND bm_guest.building = '" . $building . "' ORDER BY building ASC");
    } elseif ($_POST['date_start'] != null && $_POST['date_end'] == null) {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.building,bm_guest.floor,bm_guest.end_date,bm_guest.status_guest_detail,bm_guest.status_guest,bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out, bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department", "bm_guest", "check_in >= '" . $date_start . "' AND bm_guest.status != '9' AND bm_guest.building = '" . $building . "' ORDER BY building ASC");
    } elseif ($_POST['date_start'] == null && $_POST['date_end'] != null) {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.building,bm_guest.floor,bm_guest.end_date,bm_guest.status_guest_detail,bm_guest.status_guest,bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out, bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department", "bm_guest", "check_in <= '" . $date_end . "' AND bm_guest.status != '9' AND bm_guest.building = '" . $building . "' ORDER BY building ASC");
    } else {
        $getquery =  $getdata->my_sql_select($connect, "bm_guest.building,bm_guest.floor,bm_guest.end_date,bm_guest.status_guest_detail,bm_guest.status_guest,bm_guest.code AS code, bm_guest.status AS status, bm_guest.check_in AS check_in,bm_guest.check_out AS check_out, bm_guest.room AS room, bm_guest.prefix_name AS g_prefix, bm_guest.fname AS g_fname, bm_guest.lname AS g_lname, bm_guest.position AS g_position, bm_guest.department AS g_department", "bm_guest", "bm_guest.status != '9' ORDER BY building ASC");
    }
}

?>

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

<?php echo $alert; ?>
<div class="card">
    <div class="card-header">
        <strong>รายงานผู้เข้าห้องพัก/ออกห้องพัก ประจำปี <?php echo date('Y') + 543; ?></strong>
        <hr>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent3">
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2"><strong>จำนวนผู้เข้าห้องพัก/ออกห้องพักทั้งสิ้น</strong></h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="avatar avatar-md border-5 border-light-warning rounded-circle mx-auto mb-4">
                                <span class="avatar-initial rounded-circle bg-label-warning"><i class='bx bx-buildings bx-sm'></i></span>
                            </div>
                            <h3 class="card-title mb-1 me-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "bm_guest", "key_guest <> 'hidden' AND sys_procress = '1'");
                                                                echo @number_format($getall); ?></h3>
                            <small class="d-block mb-2">รายการ</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2"><strong>จำนวนผู้เข้าห้องพัก</strong></h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="avatar avatar-md border-5 border-light-success rounded-circle mx-auto mb-4">
                                <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user bx-sm"></i></span>
                            </div>
                            <h3 class="card-title mb-1 me-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "bm_guest", "key_guest <> 'hidden' AND status = '2'");
                                                                echo @number_format($getall); ?></h3>
                            <small class="d-block mb-2">รายการ</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2"><strong>จำนวนผู้ออกจากห้องพัก</strong></h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="avatar avatar-md border-5 border-light-danger rounded-circle mx-auto mb-4">
                                <span class="avatar-initial rounded-circle bg-label-danger"><i class='bx bx-exit bx-sm'></i></span>
                            </div>
                            <h3 class="card-title mb-1 me-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "bm_guest", "key_guest <> 'hidden' AND status = '1'");
                                                                echo @number_format($getall); ?></h3>
                            <small class="d-block mb-2">รายการ</small>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="tab-pane pt-3 fade show active" id="employee" role="tabpanel" aria-labelledby="employee-tab">
                <div class="row">
                    <div class="col-12 text-center">
                        <form action="<?php echo $SERVER_NAME; ?>" method="post">
                            <div class="form-group row mb-4">
                                <div class="col-md-2 col-sm-12">
                                    <label for="date_start">อาคาร</label>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <select name="building" id="building" class="form-control select2 input-sm" style="width: 100%;">
                                        <option value="">--- เลือกข้อมูล ---</option>
                                        <option value="1">อาคาร Vertex View </option>
                                        <option value="2">อาคาร Horizon </option>
                                        <option value="3">อาคาร Vertical View </option>
                                    </select>
                                </div>
                            </div>
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
                                <button class="btn btn-label-danger mt-3" onclick="reloadPage()" data-style="expand-left">
                                    <span class="fas fa-trash-alt"> ล้างค่า</span>
                                    <span class="ladda-spinner"></span>
                                </button>

                                <button class="btn btn-label-warning mt-3" data-style="expand-left" type="submit" name="search">
                                    <span class="fas fa-file-download"> ค้นหา</span>
                                    <span class="ladda-spinner"></span>
                                </button>
                            <?php } else { ?>
                                <button class="btn btn-label-warning mt-3" data-style="expand-left" type="submit" name="search">
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
                                <a href="report/MyPDF.pdf" class="btn btn-md btn-success ml-auto" target="_blank"><span class="fas fa-file-pdf"> Download PDF</span></a>

                                <?php
                                // Require composer autoload
                                require_once __DIR__ . '/vendor/autoload.php';

                                $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
                                $fontData = $defaultFontConfig['fontdata'];
                                $mpdf = new \Mpdf\Mpdf([
                                    'tempDir' => __DIR__ . '/tmp',
                                    'fontdata' => $fontData + [
                                        'sarabun' => [
                                            'R' => 'THSarabunNew.ttf',
                                            'I' => 'THSarabunNewItalic.ttf',
                                            'B' =>  'THSarabunNewBold.ttf',
                                            'BI' => "THSarabunNewBoldItalic.ttf",
                                        ]
                                    ],
                                ]);

                                ob_start(); // Start get HTML code
                                ?>
                                <style>
                                    .body-t {
                                        font-family: sarabun;
                                    }

                                    table {
                                        border-collapse: collapse;
                                        width: 100%;
                                    }

                                    td,
                                    th {
                                        border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;
                                    }

                                    tr:nth-child(even) {
                                        background-color: #dddddd;
                                    }
                                </style>
                                <!-- ดาวโหลดรายงานในรูปแบบ PDF <a href="report/MyPDF.pdf">คลิกที่นี้</a> -->
                                <?php
                                // if (!empty($building)) {
                                //     $tit = '<h5>รายชื่อผู้พักอาศัย ' . building($building) . ' พร้อมบริวาร</h5>';
                                // } else {
                                //     $tit = '<h5>รายชื่อผู้พักอาศัยอาคารทั้งหมดพร้อมบริวาร</h5>';
                                // }
                                $tit = 'Exported '.dateTimeConvertor(date('Y-m-d H:i:s'));
                                ?>
                                <table id="responsive-data-table-1" class="table dt-responsive nowrap hover body-t table-t">
                                    <thead class="font-weight-bold">
                                        <tr class="tr-t">
                                            <td class="th-t" align="center"><strong>ลำดับ</strong></td>
                                            <td class="th-t" align="center"><strong>ชื่อ - นาสกุลเจ้าหน้าที่</strong></td>
                                            <td class="th-t" align="center"><strong>ตำแหน่ง / สังกัด</strong></td>
                                            <td class="th-t" align="center"><strong>รหัสห้อง</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while ($show_total = mysqli_fetch_object($getquery)) {
                                            $i++ ?>
                                            <?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $show_total->code . "'"); ?>
                                            <tr class="tr-t">

                                                <td class="th-t"><?php echo $i; ?></td>
                                                <td class="th-t">
                                                    <?php echo @prefixConvertor($show_total->g_prefix) . ' ' . $show_total->g_fname . ' ' . $show_total->g_lname; ?>
                                                    <br>
                                                    <?php
                                                    if ($count_guest_detail >= 1) {
                                                    ?>
                                                        <?php
                                                        if ($show_total->status_guest_detail == '1') {
                                                        ?>

                                                            <strong>บริวาร</strong>
                                                            <br>
                                                            <?php
                                                            $getdetail = $getdata->my_sql_select($connect, NULL, "bm_guest_detail", "code_guest='" . $show_total->code . "' ORDER BY create_time");
                                                            while ($showlist = mysqli_fetch_object($getdetail)) {
                                                                echo relation($showlist->relation) . ' ' . @prefixConvertor($showlist->prefix_name) . ' ' . $showlist->fname . ' ' . $showlist->lname;
                                                                echo "<br>";
                                                            }
                                                            ?>
                                                        <?php } else {
                                                            echo '<span class="text-danger">ไม่แจ้งบริวาร</span>';
                                                        } ?>
                                                    <?php } ?>
                                                </td>
                                                <td class="th-t">
                                                    <?php echo $show_total->g_position . " / " . getDepartName($show_total->g_department); ?>
                                                    <br>
                                                    <?php
                                                    if ($show_total->status_guest == '3') {
                                                        echo '<span class="text-danger">(ลจค. สิ้นสุดสัญญาจ้าง ' . dateConvertor($show_total->end_date) . ')</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="th-t">
                                                    <?php
                                                    // echo @prefixConvertorServiceList($show_total->room);
                                                    echo @building($show_total->building) . ' ' . @prefixConvertorService($show_total->floor) . ' ห้อง ' . @prefixConvertorServiceList($show_total->room);
                                                    ?>
                                                </td>
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






<?php
$html = ob_get_contents();
$mpdf->SetHTMLHeader($tit);
$mpdf->WriteHTML($html);
$mpdf->Output("report/MyPDF.pdf");
ob_end_flush()
?>
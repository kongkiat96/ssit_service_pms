<?php

if (isset($_POST['export'])) {
    $se_req = $_POST['se_req'];
    $status = $_POST['status'];
    $month = $_POST['month_case'];
    $year = $_POST['year_case'];
    if($se_req != null && $status != null && $month != null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' AND status = '".$status."' AND date LIKE '%" . date($year . "-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req == null && $status != null && $month != null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND status = '".$status."' AND date LIKE '%" . date($year . "-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req == null && $status == null && $month != null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND date LIKE '%" . date($year . "-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req == null && $status == null && $month == null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND date LIKE '%" . date($year) . "%' ORDER BY ticket", "ID");
    }if($se_req == null && $status == null && $month == null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' ORDER BY ticket DESC");
    }if($se_req == null && $status != null && $month == null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND status = '".$status."' ORDER BY ticket", "ID");
    }if($se_req == null && $status == null && $month != null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND date LIKE '%" . date("Y-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req != null && $status == null && $month == null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' ORDER BY ticket", "ID");
    }if($se_req == null && $status != null && $month == null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND status = '".$status."' AND date LIKE '%" . date($year) . "%' ORDER BY ticket", "ID");
    }if($se_req != null && $status == null && $month != null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' AND date LIKE '%" . date("Y-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req != null && $status != null && $month == null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' AND status = '".$status."' ORDER BY ticket", "ID");
    }if($se_req == null && $status != null && $month != null && $year == null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND status = '".$status."' AND date LIKE '%" . date("Y-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req != null && $status == null && $month != null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' AND date LIKE '%" . date($year . "-" . $month) . "%' ORDER BY ticket", "ID");
    }if($se_req != null && $status == null && $month == null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' AND date LIKE '%" . date($year) . "%' ORDER BY ticket", "ID");
    }if($se_req != null && $status != null && $month == null && $year != null){
        $getcaseshow = $getdata->my_sql_select($connect, NULL, "problem_list", "ID <> 'hidden' AND se_req = '".$se_req."' AND status = '".$status."' AND date LIKE '%" . date($year) . "%' ORDER BY ticket", "ID");
    }
}
?>
<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fa fa-download fa-fw"></i> ออกรายงาน</h3>
        <hr class="mt-2">
    </div>
</div>
<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">ออกรายงาน</li>
    </ol>
</nav>
<div class="card mt-3">
    <div class="card-header">
        <div class="col-12">
            <h5 class="fw-semibold">ค้นหาและออกรายงาน</h5>
            <hr class="mt-0" />
        </div>
    </div>
    <div class="card-body">
        <div class="form-block p-2">
            <form method="post" id="export">
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-3 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2" for="select2">ฝ่าย</label>
                        <select name="se_req" id="select2" class="form-control">
                            <option value="" selected>--- เลือกข้อมูล ---</option>
                            <option value="1">กลุ่มงานสารสนเทศ (IT)</option>
                            <option value="2">กลุ่มงานอาคาร</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2" for="select2-2">สถานะ</label>
                        <select name="status" id="select2-2" class="form-control">
                            <option value="" selected>--- เลือกข้อมูล ---</option>
                            <?php
                                $select_status = $getdata->my_sql_select($connect, NULL, "use_status", "status ='1' ORDER BY date_create");
                                    while ($show_status = mysqli_fetch_object($select_status)) {
                                        echo '<option value="' . $show_status->status_key . '">' . $show_status->status_name . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2" for="select2-3">เดือน</label>
                        <select name="month_case" id="select2-3" class="form-control">
                            <option value="" selected>--- เลือกข้อมูล ---</option>
                            <option value="01">มกราคม</option>
                            <option value="02">กุมภาพันธ์</option>
                            <option value="03">มีนาคม</option>
                            <option value="04">เมษายน</option>
                            <option value="05">พฤษภาคม</option>
                            <option value="06">มิถุนายน</option>
                            <option value="07">กรกฏาคม</option>
                            <option value="08">สิงหาคม</option>
                            <option value="09">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-12">
                        <label class="form-label-md fw-semibold mb-2" for="year_case">ปี</label>
                        <?php
                    $currently_selected = date('Y');
                    $earliest_year = 2022;
                    $latest_year = date('Y');
                    print '<select name="year_case" id="select2-4" class="form-control select2bs4">';
                    print '<option value="" selected>--- เลือกข้อมูล ---</option>';
                    foreach (range($latest_year, $earliest_year) as $i) {
                        print '<option value="' . $i . '"' . ($i === $currently_selected ?: '') . '>' . (date($i)+543) . '</option>';
                    }
                    print '</select>';
                    ?>
                    </div>
                </div>
                <div class="col-12 mt-3 text-end">
                    <?php if (isset($_POST['export'])) { ?>
                    <button type="submit" class="btn btn-danger btn-form-block-overlay" onclick="reloadPage()"><i
                            class="bx bx-reset"></i> ล้างค่า</button>
                    <button type="submit" name="export" class="btn btn-warning btn-form-block-overlay"><i
                            class='bx bxs-file-find'></i> ค้นหาข้อมูล</button>


                    <?php } else { ?>
                    <button type="submit" name="export" class="btn btn-warning btn-form-block-overlay"><i
                            class='bx bxs-file-find'></i> ค้นหาข้อมูล</button>
                    <?php } ?>
                </div>
            </form>
        </div>


    </div>
</div>
<?php if (isset($_POST['export'])) { ?>
<div class="card mt-2">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="example" class="table dt-responsive table-hover" style="font-family: sarabun; font-size: 16px;"
                width="100%">
                <thead class="text-center ">
                    <tr>
                        <th>Tickets : </th>
                        <th>ชื่อ - นามสกุล : </th>
                        <th>ฝ่ายที่แจ้ง :</th>
                        <th>สถานที่ตั้ง :</th>
                        <th>พื้นที่/ห้อง</th>
                        <th>วันที่แจ้งซ่อม : </th>
                        <th>เวลา : </th>
                        <th>สถานะ : </th>
                        <th>ผู้ดำเนินการ : </th>
                        <th>วันที่รับดำเนินการ : </th>
                        <th>เวลา : </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $getProblem = $getdata->my_sql_select($connect, NULL, "problem_list", "ID ORDER BY ID ASC");
                            while ($showProblem = mysqli_fetch_object($getcaseshow)) {
                        $i++;
                        ?>
                    <tr>
                        <td><?php echo $showProblem->ticket; ?></td>
                        <td><?php echo @getemployeeName($showProblem->user_key); ?></td>
                        <td><?php echo @req_service($showProblem->se_req); ?></td>
                        <td><?php echo $showProblem->se_location != 0 ? @getLocation($showProblem->se_location) : '-'; ?></td>
                        <td><?php echo $showProblem->se_room != null ? $showProblem->se_room : '-'; ?></td>
                        <td><?php echo @dateConvertor($showProblem->date); ?></td>
                        <td><?php echo $showProblem->time_start; ?></td>
                        <td><?php echo $showProblem->status != null ? @useStatus($showProblem->status) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                        </td>
                        <td><?php echo $showProblem->admin_update != '' ? @getemployeeName($showProblem->admin_update) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                        </td>
                        <td><?php echo $showProblem->date_update != '0000-00-00' ? @dateConvertor($showProblem->date_update) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                        </td>
                        <td><?php echo $showProblem->time_update != '' ? $showProblem->time_update : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                        </td>

                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php } ?>

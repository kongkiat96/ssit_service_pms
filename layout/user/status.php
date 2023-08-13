<!-- Status Check -->
<?php 
$page = htmlspecialchars(@$_GET['p']);
$getall = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND (date LIKE '%" . date("Y") . "%' )");
$getall_month = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND (date LIKE '%" . date("Y-m") . "%' )");
$getall_today = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND (date LIKE '%" . date("Y-m-d") . "%' )");
$getall_success = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21'  AND (date LIKE '%" . date("Y-m") . "%' )");
$getall_it = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y") . "%' )");
$getall_it_wait = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL  AND (date LIKE '%" . date("Y") . "%' )");
$getall_building = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y") . "%' )");
$getall_building_wait = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL  AND (date LIKE '%" . date("Y") . "%' )");

$getall_employee = $getdata->my_sql_show_rows($connect, "employee", "em_status = '1'");
$getall_admin = $getdata->my_sql_show_rows($connect, "employee", "em_status = '1' AND em_class = '2'");
?>
<div class="row g-4 mb-4">
<?php if($page != 'setting' && $page != 'employee' && $page != 'setting_system' && $page != 'setting_users' && $page != 'setting_card_status' && $page != 'administrator_access_list' && $page != 'administrator_menus' && $page != 'administrator_cases' && $page != 'setting_app' && $page != 'administrator_log' && $page != 'setting_backup' && $page != 'view_info' && $page != 'setting_info' && $page != 'report' && $page != 'export'){?>

    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งงานทั้งหมด</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-primary rounded p-2">
                        <i class="bx bx-user bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งในเดือน <?php echo @month(date('m'));?></span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_month); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">
                        <i class="bx bx-user-voice bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งวันนี้</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_today); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-danger rounded p-2">
                        <i class="bx bx-user-plus bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ได้รับการแก้ไขแล้ว</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_success); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-success rounded p-2">
                        <i class="bx bx-group bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php 
        if(@$_SESSION['ukey'] != null){  
    ?>
    <?php if($page == 'service'){?>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งงานกลุ่มงานสารสนเทศ (IT) ทั้งหมด</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_it); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-info rounded p-2">
                        <i class="bx bx-desktop bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งงานกลุ่มงานสารสนเทศ (IT) รอการแก้ไข</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_it_wait); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">
                        <i class="bx bx-cog bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php } else if($page == 'building'){ ?>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งงานกลุ่มงานอาคารทั้งหมด</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_building); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-info rounded p-2">
                        <i class="bx bx-buildings bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ผู้แจ้งงานกลุ่มงานอาคาร รอการแก้ไข</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_building_wait); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">

                        <i class="bx bx-cog bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php } else if ($page == 'employee') { ?>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>พนักงานที่มีในระบบ</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_employee); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-info rounded p-2">
                        <i class="bx bx-buildings bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="content-left">
                        <span>ส่วนที่เป็นเจ้าหน้าที่</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="me-2 mb-0"><?php echo @number_format($getall_admin); ?></h4>
                        </div>
                        <small>งาน</small>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">

                        <i class="bx bx-cog bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php }} ?>
</div>
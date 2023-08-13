<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fa fa-chart-pie fa-fw"></i> แสดงรายงานกราฟ</h3>
        <hr class="mt-2">
    </div>
</div>
<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>

        <li class="breadcrumb-item active" aria-current="page">แสดงรายงานกราฟ</li>
    </ol>
</nav>
<div class="card">
    <div class="card-header">
        <div class="col-12">
            <h5 class="fw-semibold">ภาพรวมแสดงจำนวนงาน</h5>
            <hr class="mt-0" />
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="row">
                <?php 
                    $it_do_work = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1'  AND status NOT IN ('', '2e34609794290a770cb0349119d78d21','57995055c28df9e82476a54f852bd214') AND date LIKE '%" . date("Y") . "%'");
                    $building_do_work = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2'  AND status NOT IN ('', '2e34609794290a770cb0349119d78d21','57995055c28df9e82476a54f852bd214') AND date LIKE '%" . date("Y") . "%'"); 

                    $getit_success = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status = '2e34609794290a770cb0349119d78d21'  AND (date LIKE '%" . date("Y") . "%' )");
                    $getbuilding_success = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status = '2e34609794290a770cb0349119d78d21'  AND (date LIKE '%" . date("Y") . "%' )");
                    ?>
                <!-- Line Area Chart -->
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">ภาพรวมแต่ละฝ่าย</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="pie"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานสารสนเทศ (IT) ทั้งหมด</span>
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
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานอาคารทั้งหมด</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0"><?php echo @number_format($getall_building); ?>
                                                </h4>
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
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานสารสนเทศ (IT) รอการแก้ไข</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0"><?php echo @number_format($getall_it_wait); ?>
                                                </h4>
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
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานอาคาร รอการแก้ไข</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0">
                                                    <?php echo @number_format($getall_building_wait); ?></h4>
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
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานสารสนเทศ (IT) ที่กำลังแก้ไข</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0"><?php echo @number_format($it_do_work); ?>
                                                </h4>
                                            </div>
                                            <small>งาน</small>
                                        </div>
                                        <span class="badge bg-label-primary rounded p-2">
                                            <i class="bx bxs-wrench bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานอาคาร ที่กำลังแก้ไข</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0">
                                                    <?php echo @number_format($building_do_work); ?></h4>
                                            </div>
                                            <small>งาน</small>
                                        </div>
                                        <span class="badge bg-label-primary rounded p-2">

                                            <i class="bx bxs-wrench bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานสารสนเทศ (IT) ที่เสร็จสิ้น</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0"><?php echo @number_format($getit_success); ?>
                                                </h4>
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
                        <div class="col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="content-left">
                                            <span>กลุ่มงานอาคาร ที่เสร็จสิ้น</span>
                                            <div class="d-flex align-items-end mt-2">
                                                <h4 class="me-2 mb-0">
                                                    <?php echo @number_format($getbuilding_success); ?></h4>
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
                    </div>



                </div>
            </div>
            <!-- Bar Chart -->

            <!-- Line Area Chart -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-0">กลุ่มงานสารสนเทศ (IT)</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>



            <!-- Bar Chart -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-start align-items-md-center">
                        <h5 class="card-title mb-0">กลุ่มงานอาคาร</h5>
                    </div>
                    <div class="card-body">
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
            <!-- /Bar Chart -->



        </div>
    </div>
</div>
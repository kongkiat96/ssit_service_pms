<?php require_once 'procress/dataEmployee.php'; ?>
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

<div class="modal fade" id="edit_employee" role="dialog" aria-labelledby="edit_employee" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate id="waitsave3">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><strong>แก้ไขข้อมูลผู้ใช้งาน</strong></h4>
                </div>
                <hr>
                <div class="employee">

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i><span> ปิด</span>
                    </button>
                    <button class="btn btn-label-success" type="submit" name="save_edit_employee">
                        <span class="fas fa-sync-alt"> บันทึก</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header text-center">
        <div class="row">
            <div class="col-md-3 col-sm-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="card-title m-0 me-2"><strong>จำนวนที่ใช้งานอยู่</strong></h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="avatar avatar-md border-5 border-light-success rounded-circle mx-auto mb-4">
                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-user bx-sm"></i></span>
                        </div>
                        <h3 class="card-title mb-1 me-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "employee", "card_key <> 'hidden' AND em_status = '1'");
                                                            echo @number_format($getall); ?></h3>
                        <small class="d-block mb-2">ผู้ใช้งาน</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="card-title m-0 me-2"><strong>จำนวนที่ปิดใช้งานอยู่</strong></h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="avatar avatar-md border-5 border-light-danger rounded-circle mx-auto mb-4">
                            <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-user bx-sm"></i></span>
                        </div>
                        <h3 class="card-title mb-1 me-2"><?php @$getall = $getdata->my_sql_show_rows($connect, "employee", "card_key <> 'hidden' AND em_status = '0'");
                                                            echo @number_format($getall); ?></h3>
                        <small class="d-block mb-2">ผู้ใช้งาน</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                        <i class="tf-icons bx bx-home me-1"></i> <strong>รายการพนักงานทั้งหมด</strong>
                        <!-- <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1">3</span> -->
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                        <i class="tf-icons bx bx-user me-1"></i> <strong>เพิ่มผู้ใช้งาน</strong>
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="navs-pills-justified-home" role="tabpanel">
                    <?php require_once 'table/employee.php'; ?>
                </div>
                <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                    <?php require_once 'form/form_new_employee.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
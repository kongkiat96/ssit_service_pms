<?php $getmenus = $getdata->my_sql_query($connect, null, 'menus', "menu_status ='1' AND menu_case = '" . $_GET['p'] . "' AND menu_key != 'c6c8729b45d1fec563f8453c16ff03b8'"); ?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><?php echo '<i class="fas ' . $getmenus->menu_icon . ' fa-2x"></i> <span>' . $getmenus->menu_name . '</span>'; ?></h3>
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

<?php echo @$alert; ?>
<!-- Modal View Asset -->
<div class="modal fade" id="view" tabindex=" -1" role="dialog" aria-labelledby="view" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="view">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>ปิด</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal View Asset -->

<!-- Modal Edit Asset -->
<div class="modal fade" id="edit_detail" aria-labelledby="edit_detail" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" enctype="multipart/form-data" class="was-validated">
            <div class="modal-content">

                <div class="edit_detail">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="ladda-button btn btn-success btn-square btn-ladda" style="background-color: green;" data-style="contract" type="submit" name="save_edit_asset">
                        <span class="mdi mdi-autorenew"> บันทึก</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Edit Asset -->

<!-- Modal Edit Add Repair -->
<div class="modal fade" id="add_repair" aria-labelledby="add_repair" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" enctype="multipart/form-data" class="was-validated">
            <div class="modal-content">

                <div class="add_repair">
                    <div class="sk-wave mx-auto">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="ladda-button btn btn-warning btn-square btn-ladda" style="background-color: #d8a600;" data-style="contract" type="submit" name="save_add_repair">
                        <span class="mdi mdi-tooltip-edit"> บันทึก</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Edit Add Repair -->

<!-- Form add New area -->
<div class="modal fade" id="newarea" aria-labelledby="newarea" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" class="was-validated">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เพิ่มสถานที่</h5>&nbsp;
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="area">ชื่อถานที่</label>
                            <input type="text" name="area_name" id="area" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">


                    <button class="ladda-button btn btn-warning btn-square btn-ladda bg-success" data-style="expand-left" type="submit" name="save_area">
                        <span class="mdi mdi-content-save"> บันทึก</span>
                        <span class="ladda-spinner"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End New area -->

<!-- Form add New brand -->
<div class="modal fade" id="newbrand" aria-labelledby="newbrand" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" class="was-validated">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">เพิ่มยี่ห้อ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">ชื่อยี่ห้อ</label>
                        <input type="text" name="brand_name" id="brand_name" class="form-control" required>
                        <div class="invalid-feedback">
                            ระบุ ชื่อยี่ห้อ
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button class="ladda-button btn btn-primary btn-square btn-ladda bg-success" type="submit" name="save_brand" data-style="expand-left">
                            <span class="mdi mdi-content-save"> บันทึก</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div>
</div>
<!-- End New brand -->

<!-- Form add New type -->
<div class="modal fade" id="newtype" aria-labelledby="newtype" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" class="was-validated">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">เพิ่มประเภท</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="type_name">ชื่อประเภท</label>
                            <input type="text" name="type_name" id="type_name" class="form-control" required>
                            <div class="invalid-feedback">
                                ระบุ ชื่อประเภท
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="color_tag">Color Tag</label>
                            <input type="color" name="color_tag" id="color_tag" class="form-control" value="" required>
                            <div class="invalid-feedback">
                                เลือก สีประเภท
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col text-center">

                        <button class="ladda-button btn btn-primary btn-square btn-ladda bg-success" type="submit" name="save_type" data-style="expand-left">
                            <span class="mdi mdi-content-save"> บันทึก</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div>
</div>
<!-- End New type -->

<!-- Form add New status -->
<div class="modal fade" id="newstatus" aria-labelledby="newstatus" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post" enctype="multipart/form-data" class="was-validated">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">เพิ่มสถานะ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="status_name">ชื่อสถานะ</label>
                            <input type="text" name="status_name" id="status_name" class="form-control" required>
                            <div class="invalid-feedback">
                                ระบุ ชื่อสถานะ
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="color_tag">Color Tag</label>
                            <input type="color" name="color_tag" id="color_tag" class="form-control" value="" required>
                            <div class="invalid-feedback">
                                เลือก สีสถานะ
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col text-center">

                        <button class="ladda-button btn btn-primary btn-square btn-ladda bg-success" type="submit" name="save_status" data-style="expand-left">
                            <span class="mdi mdi-content-save"> บันทึก</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div>
</div>
<!-- End New status -->

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>เพิ่มรายการเข้าพัก <?php echo '<span>' . $getmenus->menu_name . '</span>'; ?></h2>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-2">
                <ul class="nav nav-pills nav-stacked flex-column">
                    <li class="nav-item">
                        <a href="#vtab1" class="nav-link active" data-toggle="tab" aria-expanded="true">
                            <i class="mr-1 fa fa-home"></i> ชั้นที่ 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#vtab2" class="nav-link" data-toggle="tab" aria-expanded="false">
                            <i class="mr-1 fa fa-user"></i> ชั้นที่ 2</a>
                    </li>
                    <li class="nav-item">
                        <a href="#vtab3" class="nav-link" data-toggle="tab">
                            <i class="mr-1 fa fa-phone"></i> ชั้นที่ 3</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content col-10 ">
                <div class="tab-pane fade active show" id="vtab1" aria-expanded="true">
                    <div class="row ">
                        <div class="col-2">
                            <ul class="nav nav-pills nav-stacked flex-column">
                                <li class="nav-item">
                                    <a href="#vtab1_1" class="nav-link active" data-toggle="tab" aria-expanded="true">
                                        <i class="mr-1 fa fa-home"></i> ห้องที่ 1</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#vtab1_2" class="nav-link" data-toggle="tab" aria-expanded="false">
                                        <i class="mr-1 fa fa-user"></i> ห้องที่ 2</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#vtab1_3" class="nav-link" data-toggle="tab">
                                        <i class="mr-1 fa fa-phone"></i> ห้องที่ 3</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content col-10 ">
                            <div class="tab-pane fade active show" id="vtab1_1" aria-expanded="true">
                                <?php include 'form/form.php'; ?>
                            </div>
                            <div class="tab-pane fade" id="vtab1_2" aria-expanded="false">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </div>
                            <div class="tab-pane fade" id="vtab1_3" aria-expanded="false">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vtab2" aria-expanded="false">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </div>
                <div class="tab-pane fade" id="vtab3" aria-expanded="false">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </div>
            </div>
        </div>
    </div>
</div>
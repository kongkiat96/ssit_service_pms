<?php
require_once 'procress/dataSetting.php';
?>
<?php echo @$alert; ?>
<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fa fa-sliders-h fa-fw"></i> ตั้งค่าห้องพัก</h3>
        <hr class="mt-2">
    </div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
        <li class="breadcrumb-item active" aria-current="page">ตั้งค่าห้องพัก</li>
    </ol>
</nav>
<!-- Insert & Edit Service -->
<div class="modal fade" id="modal_new_service" role="dialog" aria-labelledby="modal_new_service" aria-hidden="true">
    <form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated" id="waitsave3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>เพิ่มชั้น</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr class="mt-0" />
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mb-2 service_name">ชื่อชั้น</label>
                        <input type="text" name="service_name" id="service_name" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">
                            ระบุ ชื่อชั้น
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mb-2 service_group">อาคาร</label>
                        <select name="service_group" id="service_group" class="form-control mb-3 select2" width="100%" required>
                            <option value="">--- เลือกข้อมูล ---</option>
                            <option value="1">อาคาร Vertex View </option>
                            <option value="2">อาคาร Horizon </option>
                            <option value="3">อาคาร Vertical View </option>
                        </select>
                        <div class="invalid-feedback">
                            เลือก อาคาร
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">

                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-exit"></i>
                            ปิด
                        </button>
                        <button type="submit" name="save_service" class="btn btn-primary"><i class="bx bx-save"></i>
                            บันทึกข้อมูล</button>



                        <!-- <button class="ladda-button btn btn-primary btn-square btn-ladda bg-success" type="submit" name="save_service" data-style="expand-left">
                            <span class="mdi mdi-content-save"> บันทึก</span>
                            <span class="ladda-spinner"></span>
                        </button> -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </form><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit_service" role="dialog" aria-labelledby="modal_edit_service" aria-hidden="true">
    <form method="post" action="<?php echo $SERVER_NAME; ?>" class="was-validated" id="waitsave">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>แก้ไขข้อมูล</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr class="mt-0" />
                </div>


                <div class="edit_service">

                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <!-- <button class="ladda-button btn btn-primary btn-square btn-ladda bg-warning" type="submit" name="save_edit_service" data-style="expand-left">
                            <span class="mdi mdi-content-save"> บันทึก</span>
                            <span class="ladda-spinner"></span>
                        </button> -->

                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-exit"></i>
                            ปิด
                        </button>
                        <button type="submit" name="save_edit_service" class="btn btn-primary"><i class="bx bx-save"></i>
                            บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </form><!-- /.modal-dialog -->
</div>
<!-- End Service -->
<!-- Insert & Edit Service list -->
<div class="modal fade" id="modal_new_service_list" role="dialog" aria-labelledby="modal_new_service_list" aria-hidden="true">
    <form method="post" enctype="multipart/form-data" action="<?php echo $SERVER_NAME; ?>" class="was-validated" id="waitsave4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>เพิ่มรายการ</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr class="mt-0" />
                </div>



                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-12 mb-3">
                            <label for="mb-2 se_group">อาคาร</label>
                            <select name="se_group" class="form-control mb-3 select2" id="se_group" onchange="getroomList(this.value)" required>
                                <option value="">--- เลือกข้อมูล ---</option>
                                <option value="1">อาคาร Vertex View </option>
                                <option value="2">อาคาร Horizon </option>
                                <option value="3">อาคาร Vertical View </option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="mb-2 se_id">ชั้น</label>
                            <select class="form-control mb-3 select2" name="se_id" id="se_id" required>
                                <option value="">--- เลือก ชั้น ---</option>
                            </select>
                            <div class="invalid-feedback">
                                เลือก ชั้น .
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="mb-2 service_list_name">ชื่อห้อง/รหัสห้อง</label>
                            <input type="text" name="service_list_name" id="service_list_name" class="form-control" autocomplete="off" required>
                            <div class="invalid-feedback">
                                ระบุ ชื่อห้อง/รหัสห้อง
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col text-center">

                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-exit"></i>
                            ปิด
                        </button>
                        <button type="submit" name="save_service_list" class="btn btn-primary"><i class="bx bx-save"></i>
                            บันทึกข้อมูล</button>


                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </form><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="edit_service_list" role="dialog" aria-labelledby="modal_edit_service_list" aria-hidden="true">
    <form method="post" action="<?php echo $SERVER_NAME; ?>" class="was-validated" id="waitsave2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>แก้ไขข้อมูล</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr class="mt-0" />
                </div>


                <div class="edit_service_list">

                </div>
                <div class="modal-footer">
                    <div class="col text-center">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-exit"></i>
                            ปิด
                        </button>
                        <button type="submit" name="save_edit_service_list" class="btn btn-primary"><i class="bx bx-save"></i>
                            บันทึกข้อมูล</button>


                    </div>
                </div>
            </div>
        </div>
    </form><!-- /.modal-dialog -->
</div>
<!-- End Service list -->
<div class="card mb-2">
    <!-- <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item font-weight-bold">
                <a class="nav-link text-success active" id="service-tab" data-bs-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="true">หมวดหมู่อาคารและห้องพัก</a>
            </li>
        </ul>
    </div> -->
    <div class="card-header">
        <div class="col-12">
            <h5 class="fw-semibold">หมวดหมู่อาคารและห้องพัก</h4>

                <hr class="mt-0" />
        </div>
    </div>


    <div class="card-body">
        <div class="tab-content" id="myTabContent">

            <!-- Set Service -->
            <div class="tab-panel fade show active" id="service" role="tabpanel" aria-labelledby="service-tab">
                <div class="card shadow">
                    <div class="card-body ">
                        <!-- <button class="btn btn-success btn-xs float-right btn-outline mb-2 ml-2" data-bs-toggle="modal" data-bs-target="#modal_new_service_list"><i class="fa fa-tasks fa-fw"></i> เพิ่มห้อง</button>
                        <button class="btn btn-success btn-xs float-right btn-outline mb-2" data-bs-toggle="modal" data-bs-target="#modal_new_service"><i class="fa fa-list-ul fa-fw"></i> เพิ่มชั้น</button> -->
                        <div class="text-end mb-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_service_list" class="btn btn-success btn-md"><i class="bx bx-save"></i> เพิ่มห้อง</button>

                            <button type="button" data-bs-toggle="modal" data-bs-target="#modal_new_service" class="btn btn-warning btn-md"><i class="bx bx-save"></i> เพิ่มชั้น</button>
                        </div>



                        <div class="table-responsive" style="height: 500px;">
                            <!-- Table -->
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-success text-center font-weight-bold">
                                    <tr>
                                        <th width="3%">#</th>
                                        <th colspan="3">ชื่ออาคารและห้อง</th>
                                        <th width="10%">ตัวจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 0;
                                    $getmenu = $getdata->my_sql_select($connect, NULL, "service", "se_id ORDER BY se_group");
                                    while ($showmenu = mysqli_fetch_object($getmenu)) {
                                        $x++;
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo @$x; ?></td>
                                            <td colspan="2" align="left"><?php echo @building($showmenu->se_group); ?></td>
                                            <td><?php echo $showmenu->se_name; ?></td>
                                            <td align="center">
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit_service" data-whatever="<?php echo @$showmenu->se_id; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>

                                                <!-- <a data-bs-toggle="modal" data-bs-target="#edit_service" data-whatever="<?php echo @$showmenu->se_id; ?>" class="btn btn-sm btn-success btn-outline" data-toptitle="title" title="แก้ไขหมวดหมู่"><i class="fa fa-pencil-square-o"></i></a> -->
                                                <!-- <a onClick="javascript:delete_service('<?php echo @$showmenu->se_id; ?>');" class="btn btn-sm btn-danger btn-outline" data-toptitle="title" title="ลบหมวดหมู่"><i class="fa fa-trash-o"></i></a> -->

                                                <?php
                                                if (@$showmenu->se_status == '1') {
                                                    echo '<button type="button" class="btn btn-success btn-sm" id="btn-' . @$showmenu->se_id . '" onclick="javascript:UseService(\'' . @$showmenu->se_id . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-eye fa-fw" id="icon-' . @$showmenu->se_id . '"></i> <span id="text-' . @$showmenu->se_id . '"></span></button>';
                                                } else {
                                                    echo '<button type="button" class="btn btn-danger btn-sm" id="btn-' . @$showmenu->se_id . '" onclick="javascript:UseService(\'' . @$showmenu->se_id . '\');" data-top="toptitle" data-placement="top" title="เปิด/ปิดการใช้งาน"><i class="fa fa-eye-slash fa-fw" id="icon-' . @$showmenu->se_id . '"></i> <span id="text-' . @$showmenu->se_id . '"></span></button>';
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                        <?php
                                        $i = 0;
                                        $getsubmenu = $getdata->my_sql_select($connect, NULL, "service_list", "se_id='" . @$showmenu->se_id . "' AND se_li_status !='0' ORDER BY se_li_name");
                                        while ($showsubmenu = mysqli_fetch_object($getsubmenu)) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td colspan="2" align="center" width="5%"><?php echo $i; ?></td>

                                                <td width="60%" bgcolor="#EEEEEE">&nbsp;<?php echo @$showsubmenu->se_li_name; ?></td>

                                                <td width="10%" align="center" bgcolor="#EEEEEE">
                                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit_service_list" data-whatever="<?php echo @$showsubmenu->se_li_id; ?>" data-top="toptitle" data-placement="top" title="แก้ไข"><i class="fa fa-edit fa-fw"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" onClick="javascript:nousing_service_li('<?php echo @$showsubmenu->se_li_id; ?>');" data-top="toptitle" data-placement="top" title="ลบรายการ"><i class="fa fa-trash-alt fa-fw"></i></button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Set Service -->
        </div>
    </div>
    <div class="card-footer text-center">
        <a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>
    </div>
</div>
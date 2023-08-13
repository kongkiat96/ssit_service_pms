<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$chk_employee = $getdata->my_sql_query($connect, NULL, "employee", "em_key ='" . htmlspecialchars($_GET['key']) . "'");
$chk_user = $getdata->my_sql_query($connect, NULL, "user", "user_key ='" . htmlspecialchars($_GET['key']) . "'");


?>
<div class="modal-header">
    <h5 class="modal-title"><strong>แก้ไขข้อมูลพนักงาน</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <hr class="mt-0" />

</div>
<div class="modal-body">
    <div class="form-group row mb-2">
        <div class="col-sm-12 col-md-4">
            <label class="form-label-md fw-semibold mb-2">คำนำหน้าชื่อ</label>
            <select id="select-title-edit" name="title_name" class="form-control" required>
                <option value="" selected>--- เลือกข้อมูล ---</option>
                <?php
                    $select_title = $getdata->my_sql_select($connect, NULL, "prefix_title", "prefix_status = '1' ORDER BY prefix_code");
                        while ($show_title = mysqli_fetch_object($select_title)) {
                            if ($show_title->prefix_code == $chk_employee->title_name) {
                            echo '<option value="' . $show_title->prefix_code . '" selected>' . $show_title->prefix_title . '</option>';
                            } else {
                            echo '<option value="' . $show_title->prefix_code . '">' . $show_title->prefix_title . '</option>';
                            }
                        }
                ?>

            </select>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ คำนำหน้าชื่อ.</label>

            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <label class="form-label-md fw-semibold mb-2">ชื่อ</label>
            <input type="text" class="form-control" name="em_name" value="<?php echo @$chk_employee->em_name; ?>" required>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ ชื่อ.</label>

            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <label class="form-label-md fw-semibold mb-2">นามสกุล</label>
            <input type="text" class="form-control" name="em_lastname"
                value="<?php echo @$chk_employee->em_lastname; ?>" required>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ นามสกุล.</label>

            </div>
        </div>
    </div>
    <div class="form-group row mb-2 mt-3">
        <div class="col-sm-12 col-md-6">
            <label class="form-label-md fw-semibold mb-2">แผนก / ฝ่าย</label>
            <select id="select-department-edit" name="em_department" class="form-control" required>
                <option value="" selected>--- เลือกข้อมูล ---</option>
                <?php
                    $select_department = $getdata->my_sql_select($connect, NULL, "department_name", "department_status = '1' ORDER BY id");
                        while ($show_department = mysqli_fetch_object($select_department)) {
                            if ($show_department->id == $chk_employee->em_department) {
                            echo '<option value="' . $show_department->id . '" selected>' . $show_department->department_name . '</option>';
                            } else {
                            echo '<option value="' . $show_department->id . '">' . $show_department->department_name . '</option>';
                            }
                        }
                ?>

            </select>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ แผนก / ฝ่าย.</label>

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <label class="form-label-md fw-semibold mb-2">ตำแหน่ง</label>
            <input type="text" class="form-control" name="em_position"
                value="<?php echo @$chk_employee->em_position; ?>" required>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ ตำแหน่ง.</label>

            </div>
        </div>
    </div>
    <div class="form-group row mb-2 mt-3">
        <div class="col-sm-12 col-md-6">
            <label for="" class="form-label-md fw-semibold mb-2">บริษัท / สังกัด</label>
            <select id="select-company-edit" name="em_company" class="form-control" required>
                <option value="" selected>--- เลือกข้อมูล ---</option>
                <?php
                    $select_company = $getdata->my_sql_select($connect, NULL, "company", "cp_status = '1' ORDER BY id");
                        while ($show_company = mysqli_fetch_object($select_company)) {
                            if ($show_company->id == $chk_employee->em_company) {
                            echo '<option value="' . $show_company->id . '" selected>' . $show_company->company_name . '</option>';
                            } else {
                            echo '<option value="' . $show_company->id . '">' . $show_company->company_name . '</option>';
                            }
                        }
                ?>
            </select>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ บริษัท / สังกัด.</label>

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-label-md fw-semibold mb-2">
                <label for="" class="form-label-md fw-semibold mb-2">ระดับการใช้งาน</label>
                <select id="select-class-edit" name="em_class" class="form-control" required>
                    <option value="" selected>--- เลือกข้อมูล ---</option>
                    <?php 
                    if ($chk_employee->em_class == '1'){
                        echo '<option value="1" selected>ผู้ใช้งานทั่วไป</option>
                              <option value="2">เจ้าหน้าที่</option>';
                    } else {
                        echo '<option value="1">ผู้ใช้งานทั่วไป</option>
                              <option value="2" selected>เจ้าหน้าที่</option>';
                    }
                ?>

                </select>
                <div class="invalid-feedback">
                    <label class="form-label-md fw-semibold mt-2">ระบุ ระดับการใช้งาน.</label>

                </div>
            </div>
        </div>
        <div class="col-12">
            <label class="form-label-md fw-semibold mb-2">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo @$chk_user->email; ?>" required>
            <div class="invalid-feedback">
                <label class="form-label-md fw-semibold mt-2">ระบุ อีเมล.</label>

            </div>
        </div>
    </div>
    <input type="hidden" name="em_key" value="<?php echo $chk_employee->em_key; ?>">

</div>

<script>
    $(document).ready(function () {
        $("#select-title-edit").select2({
            dropdownParent: $("#editEmployee")
        });
        $("#select-department-edit").select2({
            dropdownParent: $("#editEmployee")
        });
        $("#select-company-edit").select2({
            dropdownParent: $("#editEmployee")
        });
        $("#select-class-edit").select2({
            dropdownParent: $("#editEmployee")
        });
    });
</script>
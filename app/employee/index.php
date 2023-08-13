<?php
include_once 'service/procress/dataSave_employee.php';
?>
<div class="modal fade" id="addEmployee" aria-labelledby="addEmployee" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>เพิ่มข้อมูลผู้ใช้งาน</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <hr class="mt-0" />

            </div>
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row mb-2">
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label-md fw-semibold mb-2">คำนำหน้าชื่อ</label>
                            <select id="select-title" name="title_name" class="form-control" required>
                                <option value="" selected>--- เลือกข้อมูล ---</option>
                                <?php
                                $select_title = $getdata->my_sql_select($connect, NULL, "prefix_title", "prefix_status = '1' ORDER BY prefix_code");
                                    while ($show_title = mysqli_fetch_object($select_title)) {
                                        
                                        echo '<option value="' . $show_title->prefix_code . '">' . $show_title->prefix_title . '</option>';
                                        
                                    }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                                <label class="form-label-md fw-semibold mt-2">ระบุ คำนำหน้าชื่อ.</label>

                            </div>
                        </div>


                        <div class="col-sm-12 col-md-4">
                            <label class="form-label-md fw-semibold mb-2">ชื่อ</label>
                            <input type="text" class="form-control" value="" name="em_name" required>
                            <div class="invalid-feedback">
                                <label class="form-label-md fw-semibold mt-2">ระบุ ชื่อ.</label>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label-md fw-semibold mb-2">นามสกุล</label>
                            <input type="text" class="form-control" value="" name="em_lastname" required>
                            <div class="invalid-feedback">
                                <label class="form-label-md fw-semibold mt-2">ระบุ นามสกุล.</label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label-md fw-semibold mb-2">แผนก / ฝ่าย</label>
                            <select id="select-department" name="em_department" class="form-control" required>
                                <option value="" selected>--- เลือกข้อมูล ---</option>
                                <?php
                                $select_department = $getdata->my_sql_select($connect, NULL, "department_name", "department_status = '1' ORDER BY id");
                                    while ($show_department = mysqli_fetch_object($select_department)) {
                                        
                                        echo '<option value="' . $show_department->id . '">' . $show_department->department_name . '</option>';
                                        
                                    }
                            ?>
                            </select>
                            <div class="invalid-feedback">
                                <label class="form-label-md fw-semibold mt-2">ระบุ แผนก / ฝ่าย.</label>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label-md fw-semibold mb-2">ตำแหน่ง</label>
                            <input type="text" class="form-control" value="" name="em_position" required>
                            <div class="invalid-feedback">
                                <label class="form-label-md fw-semibold mt-2">ระบุ ตำแหน่ง.</label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-3">
                        <div class="col-sm-12 col-md-6">
                            <label for="" class="form-label-md fw-semibold mb-2">บริษัท / สังกัด</label>
                            <select id="select-company" name="em_company" class="form-control" required>
                                <option value="" selected>--- เลือกข้อมูล ---</option>
                                <?php
                                $select_company = $getdata->my_sql_select($connect, NULL, "company", "cp_status = '1' ORDER BY id");
                                while ($show_company = mysqli_fetch_object($select_company)) {
                                    echo '<option value="' . $show_company->id . '">' . $show_company->company_name . '</option>';
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
                                <select id="select-class" name="em_class" class="form-control" required>
                                    <option value="" selected>--- เลือกข้อมูล ---</option>
                                    <option value="1">ผู้ใช้งานทั่วไป</option>
                                    <option value="2">เจ้าหน้าที่</option>
                                </select>
                                <div class="invalid-feedback">
                                    <label class="form-label-md fw-semibold mt-2">ระบุ ระดับการใช้งาน.</label>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label-md fw-semibold mb-2">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" required />
                            <div class="invalid-feedback">
                                <label class="form-label-md fw-semibold mt-2">ระบุ อีเมล.</label>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i>
                        ปิด
                    </button>
                    <button type="submit" name="savedata" class="btn btn-primary"><i class="bx bx-save"></i>
                        บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editEmployee" aria-labelledby="editEmployee" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="editEmployee">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i>
                        ปิด
                    </button>
                    <button type="submit" name="editdata" class="btn btn-warning"><i class="bx bx-save"></i>
                        บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="text-end">
    <button type="button" data-bs-toggle="modal" data-bs-target="#addEmployee" class="btn btn-success btn-md"><i
            class="bx bx-save"></i> เพิ่มข้อมูลพนักงาน</button>
</div>

<div class="card mt-3">
    <div class="card-body">
        <div class="col-12">
            <h5 class="fw-semibold">ตารางแสดงข้อมูลรายการพนักงาน</h5>
            <hr class="mt-0" />
        </div>
        <div class="table-responsive text-nowrap">
            <table id="responsive-data-table-employee" class="table dt-responsive table-hover" style="font-family: sarabun; font-size: 16px;" width="100%">
                <thead class="text-center ">
                    <tr>
                        <th>ลำดับ : </th>
                        <th>ชื่อ - นามสกุล : </th>
                        <th>แผนก / ฝ่าย : </th>
                        <th>ตำแหน่ง : </th>
                        <th>บริษัท / สังกัด :</th>
                        <th>สถานะ : </th>
                        <th>เครื่องมือ : </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        $getEmployee = $getdata->my_sql_select($connect, NULL, "employee", "em_status = '1' ORDER BY em_class DESC");
                        while ($showEmployee = mysqli_fetch_object($getEmployee)) {
                        $i++;
                        ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo @getemployeeName($showEmployee->em_key); ?></td>
                        <td class="text-center"><?php echo @getDepartment($showEmployee->em_department); ?></td>
                        <td class="text-center"><?php echo $showEmployee->em_position; ?></td>
                        <td class="text-center"><?php echo @getCompany($showEmployee->em_company); ?></td>
                        <td class="text-center"><?php echo @getAdmin($showEmployee->em_class); ?></td>
                        <td class="text-center">
                            <?php echo '<a href="#" data-bs-toggle="modal" data-bs-target="#editEmployee" data-whatever="' . @$showEmployee->em_key . '" class="btn rounded-pill btn-icon btn-label-warning btn-sm" data-top="toptitle" data-placement="top" title="แก้ไข"><span class="tf-icons bx bx-edit"></span></a>&nbsp'; ?>
                            <a href="#" onclick="deletemployee('<?php echo @$showEmployee->em_key; ?>');" class="btn rounded-pill btn-icon btn-label-danger btn-sm" data-top="toptitle" data-placement="top" title="ลบข้อมูล"><span class="tf-icons bx bxs-trash"></span></a>
                        </td>
                    </tr>

                    <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>
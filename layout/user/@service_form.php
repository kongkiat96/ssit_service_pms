<?php 
require 'status.php';
require 'procress/saveData.php';

?>
<div class="row">
    <!-- FormValidation -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-block p-2">
                    <form id="formValidationExamples" method="post" enctype="multipart/form-data">
                        <!-- Account Details -->
                        <div class="col-12">
                            <h5 class="fw-semibold">ฟอร์มแจ้งซ่อม/ปัญหา ฝ่ายจัดการพื้นที่และโครงสร้างพื้นฐาน</h4>
                                <hr class="mt-0" />
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row col-12">
                                    <div class="col-md-2 col-sm-5">
                                        <h6 class="fw-semibold text-right">
                                            วันที่ :
                                        </h6>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <h6 class="fw-semibold"><u> <?php echo @ThDate();?></u></h6>
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="col-md-2 col-sm-5">
                                        <h6 class="fw-semibold">
                                            เรียน :
                                        </h6>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <h6 class="fw-semibold"><u>หน.ฝจพ.</u></h6>
                                    </div>
                                </div>



                            </div>

                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2"
                                    for="formValidationName">รหัสอ้างอิงการแจ้ง</label>
                                <input type="text" class="form-control" name="ticket" value="<?php echo $runticket; ?>"
                                    readonly />
                            </div>

                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="name_user">ชื่อ - นามสกุล</label>
                                <select id="em_key" name="name_user" class="select2 form-control"
                                    data-allow-clear="true" onchange="getPosition(this.value)">
                                    <option value="">Select</option>
                                    <?php
                                $getuser = $getdata->my_sql_select($connect, NULL, "employee", "em_status ='1' AND em_key != 'ce63f18f7cf0a712fd4a2f47bc9ae14c' ORDER BY em_name ASC");
                                while ($showuser = mysqli_fetch_object($getuser)) {
                                    echo '<option value="' . $showuser->em_key . '">' . @getemployeeName($showuser->em_key) . '</option>';
                                }
                            ?>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="position">ตำแหน่ง</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="position"
                                    id="position" required disabled>

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="department">ฝ่าย</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="department"
                                    id="department" required disabled>

                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2"
                                    for="call_back_user">ข้อมูลการติดต่อกลับ</label>
                                <input type="text" id="call_back_user" class="form-control"
                                    placeholder="ข้อมูลการติดต่อกลับ" name="call_back_user" />
                            </div>

                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="req_service">ประเภทของงาน</label>
                                <select id="req_service" name="req_service" class="select2 form-control"
                                    data-allow-clear="true">
                                    <option value="">Select</option>
                                    <option value="1">กลุ่มงานสารสนเทศ (IT)</option>
                                    <option value="2">กลุ่มงานอาคาร</option>

                                </select>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="se_location">สถานที่ตั้ง</label>
                                <select id="se_location" name="se_location" class="select2 form-control"
                                    data-allow-clear="true">
                                    <option value="">Select</option>
                                    <?php
                                        $getlocation = $getdata->my_sql_select($connect, NULL, "locations", "status ='1' ORDER BY name ASC");
                                        while ($showlocation = mysqli_fetch_object($getlocation)) {
                                            echo '<option value="' . $showlocation->id . '">' .$showlocation->name . '</option>';
                                        }
                                    ?>

                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="se_room">พื้นที่/ห้อง</label>
                                <input type="text" id="se_room" class="form-control" placeholder="พื้นที่/ห้อง"
                                    name="se_room" />
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="number_asset">รายการ</label>
                                <textarea class="form-control" id="number_asset" name="number_asset" rows="3"
                                    placeholder="ชื่อวัสดุ/ครุภัณฑ์"></textarea>
                            </div>

                            <div class="col-md-6 col-sm-12 mb-3">
                                <label class="form-label-md fw-semibold mb-2" for="other">รายละเอียดที่ชำรุด</label>
                                <textarea class="form-control" id="other" name="other" rows="3"
                                    placeholder="รายละเอียดอื่น ๆ ที่ต้องการแจ้งให้ทราบ"></textarea>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <label for="pic" class="form-label-md fw-semibold mb-2">รูปภาพเพิ่มเติม (ถ้ามี)</label>
                                <input class="form-control" type="file" id="pic" name="pic"
                                    accept="image/png, image/jpeg" />
                            </div>
                            <div class="row col-12">
                                <label for="" class="fw-semibold text-danger">หมายเหตุ สามารถแจ้งซ่อมได้ครั้งละ 1 รายการ
                                    เท่านั้น</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12" style="display: none;">
                                <label class="form-label-md fw-semibold mb-2" for="formValidationDob">วันที่แจ้ง</label>
                                <input type="text" class="form-control flatpickr-validation" name="formValidationDob"
                                    id="formValidationDob" value="<?php echo date('d/m/Y'); ?>" disabled />


                            </div>
                        </div>



                        <div class="col-12 mt-3 text-center">
                            <button type="submit" name="savedata" class="btn rounded-pill btn-outline-primary btn-form-block-overlay"><i
                                    class="bx bx-send"></i> ส่งข้อมูลการแจ้งซ่อม/ปัญหา</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /FormValidation -->
</div>
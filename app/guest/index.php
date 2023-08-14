<?php
require_once 'procress/datasave.php';
?>
<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fas fa-user-plus"></i> เพิ่มข้อมูลเข้าพัก</h3>
        <hr class="mt-2">
    </div>
</div>


<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลเข้าพัก</li>
    </ol>
</nav>
<div class="col-12 mb-4">
    <!-- <small class="text-light fw-semibold">Validation</small> -->
    <div id="wizard-validation" class="bs-stepper mt-2 linear">
        <div class="bs-stepper-header">
            <div class="step active" data-target="#account-details-validation">
                <button type="button" class="step-trigger" aria-selected="true">
                    <span class="bs-stepper-circle">1</span>
                    <span class="m-1">
                        <span class="bs-stepper-title">ข้อมูลผู้เข้าพัก</span>
                        <!-- <span class="bs-stepper-subtitle">Setup Account Details</span> -->
                    </span>
                </button>
            </div>
            <div class="line">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step" data-target="#personal-info-validation">
                <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                    <span class="bs-stepper-circle">2</span>
                    <span class="mt-1">
                        <span class="bs-stepper-title">รายละเอียดการเข้าพัก</span>
                        <!-- <span class="bs-stepper-subtitle">Add personal info</span> -->
                    </span>
                </button>
            </div>
            <!-- <div class="line">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="step" data-target="#social-links-validation">
                <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Social Links</span>
                        <span class="bs-stepper-subtitle">Add social links</span>
                    </span>
                </button>
            </div> -->
        </div>
        <div class="bs-stepper-content">
            <!-- <form method="post" id="wizard-validation-form" onsubmit="return false"> -->
            <form method="post" enctype="multipart/form-data" id="wizard-validation-form">
                <!-- Account Details -->
                <div id="account-details-validation" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                    
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="mb-2" for="card_code"><strong>GenCode</strong></label>
                            <input type="text" name="card_code" id="card_code" value="<?php echo @RandomString(4, 'C', 7); ?>" class="form-control input-sm" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="prefixname"><strong>คำนำหน้าชื่อ</strong></label>
                            <select name="prefixname" id="prefixname" class="form-control select2" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <?php $getprefix = $getdata->my_sql_select($connect, NULL, "members_prefix", "prefix_status ='1'");
                                while ($showprefix = mysqli_fetch_object($getprefix)) {
                                    echo '<option value="' . $showprefix->prefix_code . '">' . $showprefix->prefix_title . '</option>';
                                }
                                ?>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="fname"><strong>ชื่อเจ้าหน้าที่</strong></label>
                            <input type="text" name="fname" id="fname" class="form-control" autocomplete="off">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="lname"><strong>นามสกุลเจ้าหน้าที่</strong></label>
                            <input type="text" name="lname" id="lname" class="form-control" autocomplete="off">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="position"><strong>ตำแหน่งเจ้าหน้าที่</strong></label>
                            <input type="text" name="position" id="position" class="form-control" autocomplete="off">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="department"><strong>สังกัด</strong></label>
                            <!-- <input type="text" name="department" id="department" class="form-control" autocomplete="off"> -->
                            <select name="department" id="department" class="form-control select2" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <?php $getDepart = $getdata->my_sql_select($connect, NULL, "department_name", "department_status ='1' ORDER BY department_name");
                                while ($showDepart = mysqli_fetch_object($getDepart)) {
                                    echo '<option value="' . $showDepart->id . '">' . $showDepart->department_name . '</option>';
                                }
                                ?>
                            </select>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="company_id"><strong>ฝ่าย</strong></label>
                            <!-- <input type="text" name="company_id" id="company_id" class="form-control" autocomplete="off"> -->
                            <select name="company_id" id="company_id" class="form-control select2" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <?php $getCom = $getdata->my_sql_select($connect, NULL, "company", "cp_status ='1' ORDER BY id");
                                while ($showCom = mysqli_fetch_object($getCom)) {
                                    echo '<option value="' . $showCom->id . '">' . $showCom->company_name . '</option>';
                                }
                                ?>
                            </select>

                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="tel"><strong>หมายเลขโทรศัพท์</strong></label>
                            <input type="tel" maxlength="10" name="tel" id="tel" class="form-control" autocomplete="off">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="building"><strong>อาคาร</strong></label>
                            <select name="building" id="building" class="form-control select2 input-sm" required style="width: 100%;" onchange="getroomListcheck(this.value)">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <option value="1">อาคาร Vertex View </option>
                                <option value="2">อาคาร Horizon </option>
                                <option value="3">อาคาร Vertical View </option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="floor"><strong>ชั้น</strong></label>
                            <select name="floor" id="floor" class="form-control select2 input-sm" required style="width: 100%;" onchange="getroomListcheckroom(this.value)">
                                <option value="">--- เลือกข้อมูล ---</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="room"><strong>ห้อง</strong></label>
                            <select name="room" id="room" class="form-control select2 input-sm" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>

                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="status_guest"><strong>สถานะเจ้าหน้าที่</strong></label>
                            <select name="status_guest" id="mySelect" class="form-control select2 input-sm" required style="width: 100%;">
                                <option value="">--- เลือกข้อมูล ---</option>
                                <option value="1">เจ้าหน้าที่</option>
                                <option value="2">ลูกจ้าง สทอภ.</option>
                                <option value="3">ลูกจ้างโครงการ</option>
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div id="myDiv" class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3" style="display: none;">
                            <label class="mb-2" for="end_date"><strong>วันที่สิ้นสุดโครงการ</strong></label>
                            <input type="date" name="end_date" id="end_date" class="form-control input-sm">

                        </div>

                        <div class="col-sm-12 col-md-4 fv-plugins-icon-container mb-3">
                            <label class="mb-2" for="pic"><strong>รูปถ่าย</strong></label>
                            <input type="file" name="pic" id="pic" class="form-control input-sm" placeholder="รูปถ่าย">
                        </div>

                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev" disabled="">
                                <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <!-- <button class="btn btn-warning btn-next btn-submit" name="save_guest">ถัดไป</button> -->

                            <button class="btn btn-primary btn-next" type="submit" name="save_guest">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                            </button>
                        </div>
                    </div>
                    <div></div>
                    <!-- </form> -->
                </div>
                <!-- Personal Info -->
                <div id="personal-info-validation" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="content-header mb-3">
                        <h6 class="mb-0">รายละเอียดการเข้าพัก</h6>
                        <!-- <small>Enter Your Personal Info.</small> -->
                    </div>
                    
                </div>
                <!-- Social Links -->
                <div id="social-links-validation" class="content fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="content-header mb-3">
                        <h6 class="mb-0">Social Links</h6>
                        <small>Enter Your Social Links.</small>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
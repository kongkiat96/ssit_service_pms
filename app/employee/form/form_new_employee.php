<form method="post" enctype="multipart/form-data" class="was-validated">

    <div class="row">

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="prefixname" class="mb-2"><strong>คำนำหน้าชื่อ</strong></label>
            <select name="prefixname" id="prefixname" class="form-control select2" required style="width: 100%;">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php $getprefix = $getdata->my_sql_select($connect, NULL, "members_prefix", "prefix_status ='1'");
                while ($showprefix = mysqli_fetch_object($getprefix)) {
                    echo '<option value="' . $showprefix->prefix_code . '">' . $showprefix->prefix_title . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="name" class="mb-2"><strong>ชื่อ</strong></label>
            <input type="text" name="name" id="name" class="form-control input-sm" required>

        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="lastname" class="mb-2"><strong>นามสกุล</strong></label>
            <input type="text" name="lastname" id="lastname" class="form-control input-sm" required>

        </div>



        <div class="col-md-4 col-sm-12 mb-3">
            <label for="department" class="mb-2"><strong>สังกัด / ฝ่าย</strong></label>
            <select name="department" id="department" class="form-control select2" required style="width: 100%;">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php
                $getprefix = $getdata->my_sql_select($connect, NULL, "department_name", "department_status = '1'");
                while ($showprefix = mysqli_fetch_object($getprefix)) {
                    echo '<option value="' . $showprefix->id . '">' . $showprefix->department_name . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="position" class="mb-2"><strong>ตำแหน่ง</strong></label>
            <input type="text" name="position" id="position" class="form-control input-sm" required>

        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="email" class="mb-2"><strong>อีเมล</strong></label>
            <input type="email" name="email" id="email" class="form-control input-sm" required>

        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="code_em" class="mb-2"><strong>User Login</strong></label>
            <input type="text" name="code_em" id="code_em" class="form-control input-sm" required>

        </div>

        <!-- <div class="col-md-4 col-sm-12 mb-3">
            <label for="company">บริษัท / สังกัด</strong></label>
            <select name="company" id="company" class="form-control select2" required style="width: 100%;">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php $getprefix = $getdata->my_sql_select($connect, NULL, "company", "cp_status = '1'");
                while ($showprefix = mysqli_fetch_object($getprefix)) {
                    echo '<option value="' . $showprefix->id . '">' . $showprefix->company_name . '</option>';
                }
                ?>
            </select>
            <div class="invalid-feedback">
                เลือก บริษัท / สังกัด.
            </div>
        </div> -->

    </div>

    <!-- <div id="showload" style="display: none;"><span class="spinner-border text-primary spinner-sm" role="status" aria-hidden="true"></span></div>
    <div id="hidden">
        <button class="btn btn-outline-primary btn-sm" type="submit" name="save_employee"><i class="fa fa-save fa-fw"></i>บันทึก</button>
    </div> -->

    <div class="form-group row mt-3">
        <div class="col-12 text-center">

            <button class="btn btn-success btn-next" type="submit" name="save_employee">
                <i class="bx bx-save bx-sm"></i> บันทึกข้อมูล</span>
            </button>



            <!-- <button class="ladda-button btn btn-warning btn-square btn-ladda bg-success" data-style="expand-left" type="submit" name="save_employee">
                <span class="fas fa-save"> บันทึก</span>
                <span class="ladda-spinner"></span>
            </button> -->
        </div>

    </div>

</form>
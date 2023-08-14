<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");

$detail = $getdata->my_sql_query($connect, NULL, "user", "user_key='" . htmlspecialchars($_GET['key']) . "'");
$getmember_detail = $getdata->my_sql_query($connect, NULL, "employee", "card_key='" . htmlspecialchars($_GET['key']) . "'");
?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <label class="mb-2" for="ed_prefix"><strong>คำนำหน้า</strong></label>
            <select name="ed_prefix" id="ed_prefix" class="form-control mb-3 select2" required style="width: 100%;">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php
                $getprefix = $getdata->my_sql_select($connect, NULL, "members_prefix", "prefix_status='1' ORDER BY prefix_code");
                while ($showprefix = mysqli_fetch_object($getprefix)) {
                    if ($showprefix->prefix_code == $getmember_detail->title_name) {
                        echo '<option value="' . $showprefix->prefix_code . '" selected>' . $showprefix->prefix_title . '</option>';
                    } else {
                        echo '<option value="' . $showprefix->prefix_code . '">' . $showprefix->prefix_title . '</option>';
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback">
                เลือก คำนำหน้า.
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <label class="mb-2" for="ed_name"><strong>ชื่อ</strong></label>
            <input type="text" name="ed_name" id="ed_name" class="form-control mb-3 input-sm" value="<?php echo @$getmember_detail->name; ?>" required>
            <div class="invalid-feedback">
                ระบุ ชื่อ.
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <label class="mb-2" for="ed_lastname"><strong>นามสกุล</strong></label>
            <input type="text" name="ed_lastname" id="ed_lastname" class="form-control mb-3 input-sm" value="<?php echo @$getmember_detail->lastname; ?>" required>
            <div class="invalid-feedback">
                ระบุ นามสกุล.
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4 col-sm-12">
            <label class="mb-2" for="ed_position"><strong>ตำแหน่ง</strong></label>
            <input type="text" name="ed_position" id="ed_position" class="form-control mb-3 input-sm" value="<?php echo @$getmember_detail->user_position; ?>" required>
            <div class="invalid-feedback">
                ระบุ ตำแหน่ง.
            </div>
        </div>

        <div class="col-md-4 col-sm-12">
            <label class="mb-2" for="email"><strong>อีเมล</strong></label>
            <input type="email" name="ed_email" id="email" class="form-control mb-3 input-sm" value="<?php echo @$detail->email; ?>" required>
            <div class="invalid-feedback">
                ระบุ อีเมล.
            </div>
        </div>

        <div class="col-md-4 col-sm-12">
            <label class="mb-2" for="ed_code"><strong>User Login</strong></label>
            <input type="text" name="ed_code" id="ed_code" class="form-control mb-3 input-sm" value="<?php echo @$detail->username; ?>" required>
            <div class="invalid-feedback">
                ระบุ User Login.
            </div>
        </div>

        <!-- <div class="col-md-4 col-sm-12">
      <label class="mb-2" for="ed_company">บริษัท / สังกัด</strong></label>
      <select name="ed_company" id="ed_company" class="form-control mb-3 select2" required style="width: 100%;">
        <option value="">--- เลือกข้อมูล ---</option>
        <?php
        $getprefix = $getdata->my_sql_select($connect, NULL, "company", "");

        while ($showprefix = mysqli_fetch_object($getprefix)) {
            if ($showprefix->id == $getmember_detail->department_id) {
                echo '<option value="' . $showprefix->id . '" selected>' . $showprefix->company_name . '</option>';
            } else {
                echo '<option value="' . $showprefix->id . '">' . $showprefix->company_name . '</option>';
            }
        }
        ?>
      </select>
      <div class="invalid-feedback">
        เลือก บริษัท / สังกัด.
      </div>
    </div> 
    <div class="col-md-6 col-sm-12">
      <label class="mb-2" for="ed_department">แผนก</strong></label>
      <select name="ed_department" id="ed_department" class="form-control mb-3 select2" required style="width: 100%;">
        <option value="">--- เลือกข้อมูล ---</option>
        <?php
        $getprefix = $getdata->my_sql_select($connect, NULL, "department_name", "");
        while ($showprefix = mysqli_fetch_object($getprefix)) {
            if ($showprefix->id == $getmember_detail->user_department) {
                echo '<option value="' . $showprefix->id . '" selected>' . $showprefix->department_name . '</option>';
            } else {
                echo '<option value="' . $showprefix->id . '">' . $showprefix->department_name . '</option>';
            }
        }
        ?>
      </select>
      <div class="invalid-feedback">
        เลือก แผนก.
      </div>
    </div> -->
    </div>

    <input hidden name="card_key" id="card_key" value="<?php echo @htmlspecialchars($_GET['key']); ?>">

    <script>
        $(document).ready(function() {
            $(".select2").select2({
                dropdownParent: $("#edit_employee")
            });

        });
    </script>
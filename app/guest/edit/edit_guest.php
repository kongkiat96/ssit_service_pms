<?php
session_start();
error_reporting(0);
require("../../../core/config.core.php");
require("../../../core/connect.core.php");
require("../../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$userdata = $getdata->my_sql_query($connect, NULL, "user", "user_key='" . $_SESSION['ukey'] . "'");
mysqli_set_charset($connect, "utf8");

$guest_detail_modal = $getdata->my_sql_query($connect, NULL, "bm_guest", "key_guest='" . htmlspecialchars($_GET['key']) . "'");
$getall = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "ID <> 'hidden' AND code_guest = '" . $guest_detail_modal->code . "'");

?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4 col-sm-12 mb-3">
            <label for="edit_prefixname">คำนำหน้าชื่อ</label>
            <select name="edit_prefixname" id="edit_prefixname" class="form-control input-sm">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php
                $getprefix = $getprefix = $getdata->my_sql_select($connect, NULL, "members_prefix", "prefix_status ='1'");
                while ($showprefix = mysqli_fetch_object($getprefix)) {
                    if ($showprefix->prefix_code == $guest_detail_modal->prefix_name) {
                        echo '<option value="' . $showprefix->prefix_code . '" selected>' . $showprefix->prefix_title . '</option>';
                    } else {
                        echo '<option value="' . $showprefix->prefix_code . '">' . $showprefix->prefix_title . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-md-4 col-sm-12 mb-3">
            <label for="fname">ชื่อเจ้าหน้าที่</label>
            <input type="text" name="edit_fname" id="fname" class="form-control input-sm" placeholder="ชื่อเจ้าหน้าที่" value="<?php echo $guest_detail_modal->fname; ?>" autofocus required>
            <div class="invalid-feedback">
                ระบุ ชื่อเจ้าหน้าที่.
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-3">
            <label for="lname">นามสกุลเจ้าหน้าที่</label>
            <input type="text" name="edit_lname" id="lname" class="form-control input-sm" placeholder="นามสกุลเจ้าหน้าที่" value="<?php echo $guest_detail_modal->lname; ?>" required>
            <div class="invalid-feedback">
                ระบุ นามสกุลเจ้าหน้าที่.
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="edit_position">ตำแหน่ง</label>
            <input type="text" name="edit_position" id="edit_position" class="form-control input-sm" placeholder="ตำแหน่ง" value="<?php echo $guest_detail_modal->position; ?>" required>
            <div class="invalid-feedback">
                ระบุ ตำแหน่ง.
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="edit_department">สังกัด</label>
            <!-- <input type="text" name="edit_department" id="edit_department" class="form-control input-sm" placeholder="ตำแหน่ง" value="<?php echo $guest_detail_modal->department; ?>" required> -->
            <select name="edit_department" id="edit_department" class="form-control input-sm">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php
                $getDepartID = $getdata->my_sql_select($connect, NULL, "department_name", "department_status ='1'");
                while ($showDepartName = mysqli_fetch_object($getDepartID)) {
                    if ($showDepartName->id == $guest_detail_modal->department) {
                        echo '<option value="' . $showDepartName->id . '" selected>' . $showDepartName->department_name . '</option>';
                    } else {
                        echo '<option value="' . $showDepartName->id . '">' . $showDepartName->department_name . '</option>';
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback">
                ระบุ สังกัด.
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="edit_company_id">ฝ่าย</label>
            <!-- <input type="text" name="edit_company_id" id="edit_company_id" class="form-control input-sm" placeholder="ตำแหน่ง" value="<?php echo $guest_detail_modal->department; ?>" required> -->
            <select name="edit_company_id" id="edit_company_id" class="form-control input-sm">
                <option value="">--- เลือกข้อมูล ---</option>
                <?php
                $getComID = $getdata->my_sql_select($connect, NULL, "company", "cp_status ='1'");
                while ($showComName = mysqli_fetch_object($getComID)) {
                    if ($showComName->id == $guest_detail_modal->company_id) {
                        echo '<option value="' . $showComName->id . '" selected>' . $showComName->company_name . '</option>';
                    } else {
                        echo '<option value="' . $showComName->id . '">' . $showComName->company_name . '</option>';
                    }
                }
                ?>
            </select>
            <div class="invalid-feedback">
                ระบุ ฝ่าย.
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="status_guest">สถานะผู้เข้าพัก</label>
            <select name="status_guest" id="mySelect" class="form-control" required>
                <option value="">--- เลือกข้อมูล ---</option>
                <?php if ($guest_detail_modal->status_guest == '1') {
                    echo '<option value="1" selected>เจ้าหน้าที่</option>
                    <option value="2">ลูกจ้าง สทอภ.</option>
                    <option value="3">ลูกจ้างโครงการ</option>';
                } elseif ($guest_detail_modal->status_guest == '2') {
                    echo '<option value="1">เจ้าหน้าที่</option>
                    <option value="2" selected>ลูกจ้าง สทอภ.</option>
                    <option value="3">ลูกจ้างโครงการ</option>';
                } elseif ($guest_detail_modal->status_guest == '3') {
                    echo '<option value="1">เจ้าหน้าที่</option>
                    <option value="2">ลูกจ้าง สทอภ.</option>
                    <option value="3" selected>ลูกจ้างโครงการ</option>';
                } else {
                    echo '<option value="1">เจ้าหน้าที่</option>
                    <option value="2">ลูกจ้าง สทอภ.</option>
                    <option value="3">ลูกจ้างโครงการ</option>';
                } ?>

            </select>
            <div class="invalid-feedback">
                เลือก สถานะผู้เข้าพัก.
            </div>
        </div>
        <?php
        if ($guest_detail_modal->status_guest != '3') {
            $show =  'style="display: none;"';
        } else {
            $show = '';
        }
        ?>
        <div id="myDiv" class="col-md-4 col-sm-12" <?php echo $show; ?>>
            <!-- <div class="col-md-4 col-sm-12 mb-3"> -->
            <label for="end_date">วันที่สิ้นสุดโครงการ</label>
            <input type="date" name="end_date" id="end_date" class="form-control input-sm" value="<?php echo $guest_detail_modal->end_date; ?>">
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="tel">หมายเลขโทรศัพท์</label>
            <input type="tel" name="edit_tel" id="data2" onkeyup="autoTab2(this,2)" class="form-control input-sm" placeholder="หมายเลขโทรศัพท์" pattern="[0-9]{10}" value="<?php echo $guest_detail_modal->tel; ?>" required>
            <div class="invalid-feedback">
                ระบุ หมายเลขโทรศัพท์.
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="status">สถานะ</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">--- เลือกข้อมูล ---</option>
                <?php if ($guest_detail_modal->status == '2') {
                    echo '<option value="2" selected>เข้าห้องพัก</option>
                    <option value="0">ออกห้องพัก</option>';
                } elseif ($guest_detail_modal->status == '0') {
                    echo '<option value="2">เข้าห้องพัก</option>
                    <option value="0" selected>ออกห้องพัก</option>';
                } else {
                    echo '<option value="2">เข้าห้องพัก</option>
                    <option value="0">ออกห้องพัก</option>';
                } ?>

            </select>
            <div class="invalid-feedback">
                เลือก สถานะ.
            </div>
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="check_in">วันที่เข้าพัก</label>
            <input type="date" name="check_in" id="check_in" class="form-control input-sm" required value="<?php echo $guest_detail_modal->check_in; ?>">
        </div>

        <div class="col-md-4 col-sm-12 mb-3">
            <label for="check_out">วันที่ออกพัก</label>
            <input type="date" name="check_out" id="check_out" class="form-control input-sm" value="<?php echo $guest_detail_modal->check_out; ?>">
        </div>



    </div>

    <div class="form-group">
        <input name="key_guest" value="<?php echo @htmlspecialchars($_GET['key']); ?>" hidden>
        <input name="user_update" value="<?php echo @$userdata->user_key; ?>" hidden>
        <input name="room_log" value="<?php echo @$guest_detail_modal->room; ?>" hidden>

        <input type="text" hidden name="full_name" value="<?php echo $guest_detail_modal->fname . ' ' . $guest_detail_modal->lname; ?>">
        <input type="text" hidden name="position" value="<?php echo $guest_detail_modal->position; ?>">
        <input type="text" hidden name="checkin" value="<?php echo @dateOnlyFromTimeConvertor($guest_detail_modal->check_in); ?>">
        <input type="text" hidden name="checkout" value="<?php echo @dateOnlyFromTimeConvertor($guest_detail_modal->check_out); ?>">
        <input type="text" hidden name="count" value="<?php echo @number_format($getall); ?>">
        <input type="text" hidden name="statusCheck" value="<?php echo $guest_detail_modal->status; ?>">
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#edit_prefixname").select2({
            dropdownParent: $("#edit_guest")
        });
        $("#edit_department").select2({
            dropdownParent: $("#edit_guest")
        });
        $("#mySelect").select2({
            dropdownParent: $("#edit_guest")
        });
        $("#status").select2({
            dropdownParent: $("#edit_guest")
        });
        $("#edit_company_id").select2({
            dropdownParent: $("#edit_guest")
        });

    });

    $(document).ready(function() {
        $('#mySelect').on('change', function() {
            if (this.value == '3')
                // เมื่อเลือก option value = '1'
                $("#myDiv").show();
            else
                // เมื่อเลือก option ที่ไม่ใช่ '1'
                $("#myDiv").hide();
        });
    });
</script>

<script type="text/javascript">
function autoTab2(obj,typeCheck){
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
    */
        if(typeCheck==1){
            var pattern=new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้     
        }else{
            var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้                 
        }
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
</script>
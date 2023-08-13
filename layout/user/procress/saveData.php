<?php
$getticket = $getdata->my_sql_show_rows($connect, "problem_list", "ID AND date LIKE '%" . date("Y-m") . "%'"); // นับข้อมูลใน database โดยเลือก ปี เดือน วัน ปัจจุบัน
if ($getticket < 999) {
    $runticket = 'SKP' . date("Y-m-d") . '-W' . sprintf('%02s', $getticket + 1); // ถ้าวันปัจจุบันมีการนับน้อยกว่า 999 ให้ปัจจุบัน +1
}
$getalert = $getdata->my_sql_query($connect, NULL, "system_alert", NULL);
if (isset($_POST['name_user'])) {
    if ($_POST['name_user'] != null) {

        if (!defined('UPLOADDIR')) define('UPLOADDIR', 'resource/it/delevymo/');
	    if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
            $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
            $pic = str_replace($remove_charname, '', $_FILES['pic']['name']);
            $path = $_FILES['pic']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $File_name = $runticket.'-before.'.$ext;
            $File_tmpname = $_FILES["pic"]["tmp_name"];
            if (move_uploaded_file($File_tmpname, (UPLOADDIR . $File_name)));
            
        }else {
            $File_name = null;
        }
        
        
        if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || empty($ext)){
            $getdata->my_sql_insert($connect, "problem_list", "
                ticket='" . $runticket . "',
                user_key ='" .  htmlspecialchars($_POST['name_user']) . "',
                se_other = '" . htmlspecialchars($_POST['other']) . "',
                se_asset = '" . htmlspecialchars($_POST['number_asset']) . "',
                pic_before = '" . $File_name . "',
                se_namecall = '" . htmlspecialchars($_POST['call_back']) . "',
                se_location = '" . htmlspecialchars($_POST['se_location']) . "',
                se_room = '" . htmlspecialchars($_POST['se_room']) . "',
                se_req = '" . htmlspecialchars($_POST['req_service']) . "',
                date = '" . date("Y-m-d") . "',
                time_start = '" . date("H:i:s") . "'");

            $remove_charname = array('&', '!', '"', '%');
            $rc_other = str_replace($remove_charname, '-', htmlspecialchars($_POST['other']));

            // ส่งข้อมูลเข้าไลน์
            $name_user = @getemployeeName($_POST['name_user']);
            $position = @getPosition($_POST['name_user']);
            $department = @getDepartmentEm($_POST['name_user']);
            $req_service = @req_service($_POST['req_service']);
            $number_asset = $_POST['number_asset'];
            $callback = $_POST['call_back'];
            $location = @getLocation($_POST['se_location']);
            $other = $_POST['other'] != '' ? $_POST['other'] : 'ไม่ระบุ';
            $se_room = $_POST['se_room'];
            $date_send = date('d/m/Y');

            $line_token = $getalert->alert_line_token; // Token
            $line_text = "
------------------------
Ticket : {$runticket}
------------------------
ผู้แจ้ง : {$name_user}
ตำแหน่ง : {$position}
สังกัด / ฝ่าย : {$department}
ข้อมูลการติดต่อกลับ : {$callback}
------------------------
แจ้งงาน : {$req_service}
รายการ : {$number_asset}
รายละเอียดที่ชำรุด : {$other}
สถานที่ : {$location}
พื้นที่/ห้อง : {$se_room}
------------------------
วันที่ : {$date_send}
Link : ".@urllink()."";

            lineNotify($line_text, $line_token); // เรียกใช้ Functions line
            $alert = $reqService;
    } else {
        $alert = $check_pic;
    }
}
            

}
if(isset($_POST['saverate'])){
    if($_POST['rate'] != null){
        $getdata->my_sql_update(
            $connect,
            "problem_list",
            "rate ='" . htmlspecialchars($_POST['rate']) . "'", //เพิ่ม เวลา
            "ticket='" . htmlspecialchars($_POST['ticket']) . "'"
        );
        $alert = $reqService;
    } else {
        $alert = $warning;
    }
    
}
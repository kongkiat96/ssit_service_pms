<?php 
$getalert = $getdata->my_sql_query($connect, NULL, "system_alert", NULL);
if(isset($_POST['savedata'])){
    if($_POST['status'] != null){

        if (!defined('UPLOADDIR')) define('UPLOADDIR', '../resource/it/delevymo/');
	    if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
            $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
            $pic = str_replace($remove_charname, '', $_FILES['pic']['name']);
            $path = $_FILES['pic']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $File_name = $_POST['ticket'].'-after.'.$ext;
            $File_tmpname = $_FILES["pic"]["tmp_name"];
            if (move_uploaded_file($File_tmpname, (UPLOADDIR . $File_name)));
            $getdata->my_sql_update($connect, 'problem_list', "pic_after ='" . $File_name . "'", "ticket='" . htmlspecialchars($_POST['ticket']) . "'");
        }else {
            $editpic = $_POST['pic_log'];
            $getdata->my_sql_update($connect, 'problem_list', "pic_after ='" . $editpic . "'", "ticket='" . htmlspecialchars($_POST['ticket']) . "'");
        }

        $getdata->my_sql_update(
            $connect,
            "problem_list",
            "status ='" . htmlspecialchars($_POST['status']) . "',
            admin_update='" . htmlspecialchars($_POST['admin_update']) . "',
            date_update='" . date("Y-m-d") . "',
            time_update='" . date("H:i:s") . "'", //เพิ่ม เวลา
            "ticket='" . htmlspecialchars($_POST['ticket']) . "'"
        );
        $getdata->my_sql_insert(
            $connect,
            "problem_comment",
            "status='" . htmlspecialchars($_POST['status']) . "',
      admin_update='" . htmlspecialchars($_POST['admin_update']) . "',
      comment='" . htmlspecialchars($_POST['detail']) . "',
      date ='" . date("Y-m-d H:i:s") . "',
      ticket='" . htmlspecialchars($_POST['ticket']) . "'"
        );

                // ส่งข้อมูลเข้าไลน์
                $ticket = $_POST['ticket'];
                $name_admin = @getemployeeName($_POST['admin_update']);
                $status = $_POST['status'];
                $date_send = date('d/m/Y');
                $time_send = date("H:i");
                $detail = $_POST['detail'];
                $line_token = $getalert->alert_line_token; // Token
                $line_text = "
/*** ตอบรับการดำเนินงาน ***/
------------------------
Ticket: {$ticket}
------------------------
ผู้ดำเนินการ : {$name_admin}
สถานะ : " . @Status_for_line($status) . "
รายละเอียดดำเนินการ : {$detail}
------------------------
วันที่ : {$date_send}
เวลา : {$time_send}";
        
        lineNotify($line_text, $line_token); // เรียกใช้ Functions line
        $alert = $success;
    } else {
        $alert = $warning;
    }
    
}
if(isset($_POST['savedata_assign'])){
    if($_POST['assign'] != null){
        $getdata->my_sql_update(
            $connect,
            "problem_list",
            "se_assign ='" . htmlspecialchars($_POST['assign']) . "',
            admin_update='" . htmlspecialchars($_POST['assign']) . "'", //เพิ่ม เวลา
            "ticket='" . htmlspecialchars($_POST['ticket']) . "'"
        );
         // ส่งข้อมูลเข้าไลน์
         $ticket = $_POST['ticket'];
         $name_assign = @getemployeeName($_POST['assign']);
         $status = $_POST['status'];
         $date_send = date('d/m/Y');
         $time_send = date("H:i");
         $line_token = $getalert->alert_line_token; // Token
         $line_text = "
/*** มอบหมายการดำเนินงาน ***/
------------------------
Ticket : {$ticket}
------------------------
มอบหมายงานให้ : {$name_assign}
------------------------
วันที่ : {$date_send}
เวลา : {$time_send}";
 
         lineNotify($line_text, $line_token); // เรียกใช้ Functions line
        $alert = $success_assign;
    } else {
        $alert = $warning;
    }
    
}
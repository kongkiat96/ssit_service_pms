<?php
date_default_timezone_set('Asia/Bangkok');

//------------ in use -------------
function prefixConvertor($prefix)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'prefix_title', "prefix_code='" . $prefix . "'");
    return $getprefix->prefix_title;
}
function getemployeeName ($getDataKey) {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getDetail = $getdata->my_sql_query($connect, null, 'employee', "em_key ='" . $getDataKey . "'");
    $getshow = @prefixConvertor($getDetail->title_name) . ' ' . $getDetail->em_name . ' ' . $getDetail->em_lastname;
    return $getshow;
}
function getDepartment($getId)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getValue = $getdata->my_sql_query($connect, null, 'department_name', "id='" . $getId . "'");
    return $getValue->department_name;
}

function getCompany($getId)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getValue = $getdata->my_sql_query($connect, null, 'company', "id='" . $getId . "'");
    return $getValue->company_name;
}

function getLocation($getId)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getValue = $getdata->my_sql_query($connect, null, 'locations', "id='" . $getId . "'");
    return $getValue->name;
}

function getPosition($keyUser)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getDetail = $getdata->my_sql_query($connect, null, 'employee', "em_key ='" . $keyUser . "'");
    $getshow = $getDetail->em_position;
    return $getshow;
}
function getDepartmentEm($keyUser)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getDetail = $getdata->my_sql_query($connect, null, 'employee', "em_key ='" . $keyUser . "'");
    $getshow = @getDepartment($getDetail->em_department);
    return $getshow;
}
function useStatus($getStatus)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getall_status = $getdata->my_sql_select($connect, null, 'use_status', "status ='1'");
    while ($showall_status = mysqli_fetch_object($getall_status)) {
        if ($getStatus == $showall_status->status_key) {
            return '<span class="badge" style="background:' . $showall_status->status_color . ';color:#FFF;">' . $showall_status->status_name . '</span>';
        } elseif ($getStatus == '') {
            return '<span class="badge badge-warning" style="color:red;">ข้อมูลไม่สมบูรณ์</span>';
            //return '<span class="badge bg-label-warning">รอการตอบรับ</span>';
        } elseif ($getStatus == 'hidden') {
            return '<span class="badge badge-danger" style="color:#FFF;">ข้อมูลถูกซ่อน</span>';
        }
    }
}

function useStatusCalendar($getStatus)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getall_status = $getdata->my_sql_select($connect, null, 'use_status', "status ='1'");
    while ($showall_status = mysqli_fetch_object($getall_status)) {
        if ($getStatus == $showall_status->status_key) {
            return $showall_status->status_name;
        } elseif ($getStatus == '') {
            return 'รอการตอบรับ';
            //return '<span class="badge bg-label-warning">รอการตอบรับ</span>';
        } elseif ($getStatus == 'hidden') {
            return 'ข้อมูลถูกซ่อน';
        }
    }
}

function Status_for_line($getStatus)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getall_status = $getdata->my_sql_select($connect, null, 'use_status', "status='1'");
    while ($showall_status = mysqli_fetch_object($getall_status)) {
        if ($getStatus == $showall_status->status_key) {
            return  $showall_status->status_name;
        } elseif ($getStatus == '') {
            return 'ข้อมูลไม่สมบูรณ์';
        } elseif ($getStatus == 'hidden') {
            return 'ข้อมูลถูกซ่อน';
        }
    }
}


function month()
{
    $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

    $nMonth = date("n") - 1;

    return $TH_Month[$nMonth];
}
function datediff($start, $end)
{
    $datediff = strtotime(dateform($end)) - strtotime(dateform($start));
    return floor($datediff / (60 * 60 * 24));
}

function diff2time($time_a,$time_b){
    $now_time1=strtotime(date("Y-m-d ".$time_a));
    $now_time2=strtotime(date("Y-m-d ".$time_b));
    $time_diff=abs($now_time2-$now_time1);
    $time_diff_h=floor($time_diff/3600); // จำนวนชั่วโมงที่ต่างกัน
    $time_diff_m=floor(($time_diff%3600)/60); // จำวนวนนาทีที่ต่างกัน
    $time_diff_s=($time_diff%3600)%60; // จำนวนวินาทีที่ต่างกัน
    return $time_diff_h." ชั่วโมง ".$time_diff_m." นาที ".$time_diff_s." วินาที";
}

function TimeDiff($strTime1,$strTime2){
	return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

function dateConvertor($date)
{
    $epd = explode('-', $date);
    $Y = $epd[0] + 543;

    return $epd[2] . '/' . $epd[1] . '/' . $Y;
}
function dateform($date)
{
    $d = explode('/', $date);
    return $d[2] . '-' . $d[1] . '-' . $d[0];
}
function req_service($item)
{
    switch($item){
        case '1' : return 'กลุ่มงานสารสนเทศ (IT)';
        break;
        case '2' : return 'กลุ่มงานอาคาร';
        break;
    }
}

function forCalendar($item)
{
    switch($item){
        case '1' : return 'It';
        break;
        case '2' : return 'Bu';
        break;
    }
}

function getAdmin($item)
{
    switch($item){
        case '1' : return '<span class="badge bg-label-primary">ผู้ใช้งานทั่วไป</span>';
        break;
        case '2' : return '<span class="badge bg-label-warning">เจ้าหน้าที่</span>';
        break;
    }
}
function dateTimeConvertor($datetime)
{
    $epd = explode(' ', $datetime);
    $date = new DateTime($epd[0]);
    $exptime = explode(':', $epd[1]);
    $date->setTime($exptime[0], $exptime[1], $exptime[2]);
    $Y = $epd[0] + 543;

    return $date->format("d/m/$Y H:i:s");
}
function Userlogin($getuser)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getuserlogin = $getdata->my_sql_query($connect, null, 'user', "user_key='" . $getuser . "'");

    return $getuserlogin->username;
}
function accessMenus($access_key, $user_key, $return_value)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getmenu_list = $getdata->my_sql_show_rows($connect, 'access_list', "access_key='" . $access_key . "' AND access_status='1'");
    $getmenu_status = $getdata->my_sql_show_rows($connect, 'access_user', "access_key='" . $access_key . "' AND user_key='" . $user_key . "' AND access_status='1'");
    if ($getmenu_status == 0 && $getmenu_list != 0) {
        return '';
    } elseif ($getmenu_status == 0 && $getmenu_list == 0) {
        return $return_value;
    } else {
        return $return_value;
    }
}
function resizepic($imgext, $imgname)
{
    switch ($imgext) {
        case 'jpg':
        case 'jpeg':
            $images = '../resource/it/delevymo/' . $imgname;
            $new_images = '../resource/it/file_pic_now/' . $imgname;

            $width = 400; //*** Fix Width & Heigh (Auto caculate) ***//
            $size = getimagesize($images);
            $height = round($width * $size[1] / $size[0]);
            $images_orig = imagecreatefromjpeg($images);
            $photoX = imagesx($images_orig);
            $photoY = imagesy($images_orig);
            $images_fin = imagecreatetruecolor($width, $height);
            imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
            imagejpeg($images_fin, $new_images);
            imagedestroy($images_fin);
            break;
        case 'png':
            $images = '../resource/it/delevymo/' . $imgname;
            $new_images = '../resource/it/file_pic_now/' . $imgname;

            $width = 400; //*** Fix Width & Heigh (Auto caculate) ***//
            $size = getimagesize($images);
            $height = round($width * $size[1] / $size[0]);
            $images_orig = imagecreatefrompng($images);
            $photoX = imagesx($images_orig);
            $photoY = imagesy($images_orig);
            $images_fin = imagecreatetruecolor($width, $height);
            imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
            imagepng($images_fin, $new_images);
            break;
        case 'gif':
            $images = '../resource/it/delevymo/' . $imgname;
            $new_images = '../resource/it/file_pic_now/' . $imgname;

            $width = 400; //*** Fix Width & Heigh (Auto caculate) ***//
            $size = getimagesize($images);
            $height = round($width * $size[1] / $size[0]);
            $images_orig = imagecreatefromgif($images);
            $photoX = imagesx($images_orig);
            $photoY = imagesy($images_orig);
            $images_fin = imagecreatetruecolor($width, $height);
            imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
            imagegif($images_fin, $new_images);
            break;
        default:
            $images = '../resource/it/delevymo/' . $imgname;
            $new_images = '../resource/it/file_pic_now/' . $imgname;

            $width = 400; //*** Fix Width & Heigh (Auto caculate) ***//
            $size = getimagesize($images);
            $height = round($width * $size[1] / $size[0]);
            $images_orig = imagecreatefromjpeg($images);
            $photoX = imagesx($images_orig);
            $photoY = imagesy($images_orig);
            $images_fin = imagecreatetruecolor($width, $height);
            imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
            imagejpeg($images_fin, $new_images);
            imagedestroy($images_fin);
    }
}
function lineNotify($text, $token)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://notify-api.line.me/api/notify');
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$text");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $headers = array('Content-type: application/x-www-form-urlencoded', "Authorization: Bearer $token");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}
function urllink()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }
    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'].'/login';
    $url = $protocol. '://'.$_SERVER['HTTP_HOST'].'/login';
    $link = $full;
    return $url;
}

function getallmonth() {
    $month = array(
        "มกราคม", 
        "กุมภาพันธ์", 
        "มีนาคม",
        "เมษายน",
        "พฤษภาคม",
        "มิถุนายน",
        "กรกฎาคม",
        "สิงหาคม",
        "กันยายน",
        "ตุลาคม",
        "พฤศจิกายน",
        "ธันวาคม"
    );
    return json_encode($month);
}
function getallcount() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $it = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y") . "%' )");
    $building = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y") . "%' )"); 
    $count = array(
        $it,
        $building
    );
    return json_encode($count);
}

function workITMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}
function workITSuccessMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '1' AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function workITWaitMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NULL AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function workITOtherMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '1' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function workBuildingMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function workBuildingSuccessMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND status = '2e34609794290a770cb0349119d78d21' AND se_req = '2' AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function workBuildingWaitMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NULL AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function workBuildingOtherMonth() {
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $m1 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-01") . "%' )");
    $m2 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-02") . "%' )");
    $m3 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-03") . "%' )");
    $m4 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-04") . "%' )");
    $m5 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-05") . "%' )");
    $m6 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-06") . "%' )");
    $m7 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-07") . "%' )");
    $m8 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-08") . "%' )");
    $m9 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-09") . "%' )");
    $m10 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-10") . "%' )");
    $m11 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-11") . "%' )");
    $m12 = $getdata->my_sql_show_rows($connect, "problem_list", "ID <> 'hidden' AND se_req = '2' AND status IS NOT NULL AND status NOT IN ('2e34609794290a770cb0349119d78d21') AND (date LIKE '%" . date("Y-12") . "%' )");

    $workitMonth = array(
        $m1,
        $m2,
        $m3,
        $m4,
        $m5,
        $m6,
        $m7,
        $m8,
        $m9,
        $m10,
        $m11,
        $m12,
        
    );
    return json_encode($workitMonth);
}

function ThDate()
{
//วันภาษาไทย
$ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
//เดือนภาษาไทย
$ThMonth = array ( "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
 
//กำหนดคุณสมบัติ
$week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
$months = date( "m" )-1; // ค่าเดือน (1-12)
$day = date( "d" ); // ค่าวันที่(1-31)
$years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
 
return "$day $ThMonth[$months] 
		พ.ศ. $years";
}
 
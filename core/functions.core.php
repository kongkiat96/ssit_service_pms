<?php
date_default_timezone_set('Asia/Bangkok');
//------------ in use -------------


function datediff($start, $end)
{

    $datediff = strtotime(dateform($end)) - strtotime(dateform($start));
    return floor($datediff / (60 * 60 * 24));
}

function dateform($date)
{

    $d = explode('/', $date);
    return $d[2] . '-' . $d[1] . '-' . $d[0];
}

function getlocation($location)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getshow = $getdata->my_sql_query($connect, null, 'area_type', "id ='" . $location . "' AND area_status = '1'");

    return $getshow->area_type;
}

function getbrand($brand)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getshow = $getdata->my_sql_query($connect, null, 'brand_type', "id ='" . $brand . "' AND brand_status = '1'");

    return $getshow->brand_type;
}

function getDevice($device)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getshow = $getdata->my_sql_query($connect, null, 'device_type', "id ='" . $device . "' AND device_status = '1'");

    return $getshow->device_type;
}
function getstatusUse($status)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getall_status = $getdata->my_sql_select($connect, null, 'status_type', "stype_status='1'");
    while ($showall_status = mysqli_fetch_object($getall_status)) {
        if ($status == $showall_status->stype_key) {
            return '<span class="badge" style="background:' . $showall_status->stype_color . ';color:#FFF;">' . $showall_status->stype_name . '</span>';
        } elseif ($status == '') {
            return '<span class="badge badge-warning" style="color:#FFF;">ข้อมูลไม่สมบูรณ์</span>';
        } elseif ($status == 'hidden') {
            return '<span class="badge badge-danger" style="color:#FFF;">ข้อมูลถูกซ่อน</span>';
        }
    }
}

function getForRepair($caserepair)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getshow = $getdata->my_sql_query($connect, null, 'asset', "as_key ='" . $caserepair . "' AND status = '1'");

    return $getshow->as_id;
}

function getForRepair2($caserepair2)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getshow = $getdata->my_sql_query($connect, null, 'asset2', "as_key ='" . $caserepair2 . "' AND status = '1'");

    return $getshow->as_id;
}

function prefixConvertor($prefix)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'members_prefix', "prefix_code='" . $prefix . "'");

    return $getprefix->prefix_title;
}

function relation($id)
{
    switch ($id) {
        case '1':
            echo 'บุตร';
            break;
        case '2':
            echo 'คู่สมรส';
            break;
        case '3':
            echo 'บิดา';
            break;
        case '4':
            echo 'มารดา';
            break;
        default:
            echo 'ไม่ระบุ';
    }
}

function building($id)
{
    switch ($id) {
        case '1':
            echo 'อาคาร Vertex View';
            break;
        case '2':
            echo 'อาคาร Horizon';
            break;
        case '3':
            echo 'อาคาร Vertical View';
            break;
        default:
            echo 'อื่น ๆ';
    }
}

function status_guest($id)
{
    switch ($id) {
        case '1':
            echo 'เจ้าหน้าที่';
            break;
        case '2':
            echo 'ลูกจ้าง สทอภ.';
            break;
        default:
            echo 'ลูกจ้างโครงการ';
    }
}

function prefixConvertorUsername($prefixusername)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'user', "user_key='" . $prefixusername . "'");

    return $getprefix->name . '&nbsp;' . $getprefix->lastname;
}

function getDepartName($getID)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getDepartName = $getdata->my_sql_query($connect, null,'department_name', "id ='" . $getID . "'");

    return $getDepartName->department_name;
}

function Userlogin($getuser)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getuserlogin = $getdata->my_sql_query($connect, null, 'user', "user_key='" . $getuser . "'");

    return $getuserlogin->username;
}

function prefixConvertorService($prefixservice)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'service', "se_id='" . $prefixservice . "'");

    return $getprefix->se_name;
}

function prefixConvertorServiceList($prefixservice_list)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'service_list', "se_li_id='" . $prefixservice_list . "'");

    return $getprefix->se_li_name;
}

// fix ข้อมูลพนักงาน
function getemployee($prefixcustomername)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'employee', "card_key='" . $prefixcustomername . "'");
    $getshow = @prefixConvertor($getprefix->title_name) . ' ' . $getprefix->name . ' ' . $getprefix->lastname;
    return $getshow;
}

function getemployee_position($prefixcustomername)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'employee', "card_key='" . $prefixcustomername . "'");
    $getdetail = $getprefix->user_position;
    return $getdetail;
}
function getemployee_department($prefixcustomername)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'employee', "card_key='" . $prefixcustomername . "'");
    $getdetail = @prefixConvertorDepartment($getprefix->user_department);
    return $getdetail;
}
function getemployee_company($prefixcustomername)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'employee', "card_key='" . $prefixcustomername . "'");
    $getdetail = @prefixConvertorCompany($getprefix->department_id);
    return $getdetail;
}


// บริษัท
function prefixConvertorCompany($prefixcomapny)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'company', "id='" . $prefixcomapny . "'");

    return $getprefix->company_name;
}

function prefixConvertorDepartment($prefixdepartment)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'department_name', "id='" . $prefixdepartment . "'");

    return $getprefix->department_name;
}

function prefixConvertorequipment($prefixequipment)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'device_type', "id='" . $prefixequipment . "'");

    return $getprefix->device_type;
}

// รายการที่แจ้ง
function service($showservice)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getservice = $getdata->my_sql_query($connect, null, 'service', "se_id='" . $showservice . "'");

    return $getservice->se_name;
}

function genbarcode($getbarcode)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getprefix = $getdata->my_sql_query($connect, null, 'asset', "as_keyID ='" . $getbarcode . "'");

    return $getprefix->as_code;
}

function getmenu($getID)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getpage = $getdata->my_sql_query($connect, null, 'list', "id = '" . $getID . "'");

    return $getpage->pages;
}

function dateConvertor($date)
{
    $epd = explode('-', $date);
    $Y = $epd[0] + 543;

    return $epd[2] . '/' . $epd[1] . '/' . $Y;
}
function dateConvertorAD($date)
{
    return date('F d, Y', strtotime($date));
}
function dateTimeConvertor($datetime)
{
    $epd = explode(' ', $datetime);
    $date = new DateTime($epd[0]);
    $exptime = explode(':', $epd[1]);
    $date->setTime($exptime[0], $exptime[1], $exptime[2]);
    $Y = $epd[0] + 543;

    return $date->format("d/m/$Y H:i");
}

function dateOnlyFromTimeConvertor($datetime)
{
    $epd = explode(' ', $datetime);
    $date = new DateTime($epd[0]);
    $exptime = explode(':', $epd[1]);
    $date->setTime($exptime[0], $exptime[1], $exptime[2]);
    $Y = $epd[0] + 543;

    return $date->format("d/m/$Y");
}


function dateOnlyConvertor($datetime)
{
    $epd = explode(' ', $datetime);
    $epx = explode('-', $epd[0]);

    return $epx[2] . '/' . $epx[1] . '/' . $epx[0];
}
function substr_word($body, $maxlength)
{
    if (strlen($body) < $maxlength) {
        return $body;
    }
    $body = substr($body, 0, $maxlength);
    $rpos = strrpos($body, ' ');
    if ($rpos > 0) {
        $body = substr($body, 0, $rpos);
    }

    return $body;
}
function convertToLanguage($dis_thai, $dis_eng, $dis_now)
{
    if ($dis_now == 'en') {
        if ($dis_eng == null) {
            return $dis_thai;
        } else {
            return $dis_eng;
        }
    } else {
        if ($dis_thai == null) {
            return $dis_eng;
        } else {
            return $dis_thai;
        }
    }
}
function convertPoint($value, $point)
{
    if ($value != null) {
        return number_format($value, $point, '.', '');
    } else {
        return null;
    }
}
function convertPoint2($value, $point)
{
    if ($value != null) {
        return number_format($value, $point, '.', ',');
    } else {
        return number_format(0, $point, '.', ',');
    }
}
function resizeguestpic($imgext, $imgname)
{
    switch ($imgext) {
        case 'jpg':
            $images = '../resource/guest/delevymo/' . $imgname;
            $new_images = '../resource/guest/file_pic_now/' . $imgname;

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
        case 'jpeg':
            $images = '../resource/guest/delevymo/' . $imgname;
            $new_images = '../resource/guest/file_pic_now/' . $imgname;

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
            $images = '../resource/guest/delevymo/' . $imgname;
            $new_images = '../resource/guest/file_pic_now/' . $imgname;

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
            $images = '../resource/guest/delevymo/' . $imgname;
            $new_images = '../resource/guest/file_pic_now/' . $imgname;

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
            $images = '../resource/guest/delevymo/' . $imgname;
            $new_images = '../resource/guest/file_pic_now/' . $imgname;

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
function resizeMemberThumb($imgext, $imgname)
{
    switch ($imgext) {
        case 'jpg':
        case 'jpeg':
            $images = '../resource/members/images/' . $imgname;
            $new_images = '../resource/members/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
            $images = '../resource/members/images/' . $imgname;
            $new_images = '../resource/members/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
            $images = '../resource/members/images/' . $imgname;
            $new_images = '../resource/members/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
            $images = '../resource/members/images/' . $imgname;
            $new_images = '../resource/members/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
function resizeUserThumb($imgext, $imgname)
{
    switch ($imgext) {
        case 'jpg':
        case 'jpeg':
            $images = '../resource/users/images/' . $imgname;
            $new_images = '../resource/users/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
            $images = '../resource/users/images/' . $imgname;
            $new_images = '../resource/users/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
            $images = '../resource/users/images/' . $imgname;
            $new_images = '../resource/users/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
            $images = '../resource/users/images/' . $imgname;
            $new_images = '../resource/users/thumbs/' . $imgname;

            $width = 250; //*** Fix Width & Heigh (Auto caculate) ***//
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
function accessPage($access_key, $user_key, $return_value)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getmenu_status = $getdata->my_sql_show_rows($connect, 'access_user', "access_key='" . $access_key . "' AND user_key='" . $user_key . "' AND access_status='1'");
    if ($getmenu_status != 0) {
        return '';
    } else {
        return $return_value;
    }
}
function accessInPage($access_key, $user_key, $return_value)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getmenu_status = $getdata->my_sql_show_rows($connect, 'access_user', "access_key='" . $access_key . "' AND user_key='" . $user_key . "' AND access_status='1'");
    if ($getmenu_status == 0) {
        return '';
    } else {
        return $return_value;
    }
}
function accessInPageNot($access_key, $user_key, $return_value)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getmenu_status = $getdata->my_sql_show_rows($connect, 'access_user', "access_key='" . $access_key . "' AND user_key='" . $user_key . "' AND access_status='1'");
    if ($getmenu_status == 0) {
        return $return_value;
    } else {
        return '';
    }
}
function getPhotoSize($photo)
{
    $size = getimagesize($photo);
    if ($size[0] > $size[1]) {
        return 'height="50%"';
    } elseif ($size[0] < $size[1]) {
        return 'width="50%"';
    } else {
        return 'height="50%" width="50%"';
    }
}

function RandomString($password_pattern, $password_prefix, $password_length)
{
    if ($password_pattern == 1) {
        $characters = '0123456789';
    } elseif ($password_pattern == 2) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } elseif ($password_pattern == 3) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
    } elseif ($password_pattern == 4) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } elseif ($password_pattern == 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    } elseif ($password_pattern == 6) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } else {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    $randstring = '';
    for ($i = 0; $i < $password_length; ++$i) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    if ($randstring < $password_length) {
        $randstring = '';
        for ($i = 0; $i < $password_length; ++$i) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }

        return $password_prefix . $randstring;
    } else {
        return $password_prefix . $randstring;
    }
}
function cardStatus($card_status)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getall_status = $getdata->my_sql_select($connect, null, 'card_type', "ctype_status='1'");
    while ($showall_status = mysqli_fetch_object($getall_status)) {
        if ($card_status == $showall_status->ctype_key) {
            return '<span class="badge" style="background:' . $showall_status->ctype_color . ';color:#FFF;">' . $showall_status->ctype_name . '</span>';
        } elseif ($card_status == '') {
            return '<span class="badge badge-warning" style="color:#FFF;">ข้อมูลไม่สมบูรณ์</span>';
        } elseif ($card_status == 'hidden') {
            return '<span class="badge badge-danger" style="color:#FFF;">ข้อมูลถูกซ่อน</span>';
        }
    }
}

function cardStatus_for_line($card_status)
{
    $getdata = new clear_db();
    $connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connect, 'utf8');
    $getall_status = $getdata->my_sql_select($connect, null, 'card_type', "ctype_status='1'");
    while ($showall_status = mysqli_fetch_object($getall_status)) {
        if ($card_status == $showall_status->ctype_key) {
            return  $showall_status->ctype_name;
        } elseif ($card_status == '') {
            return 'ข้อมูลไม่สมบูรณ์';
        } elseif ($card_status == 'hidden') {
            return 'ข้อมูลถูกซ่อน';
        }
    }
}

function urllink()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }
    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
    $link = $full;
    return $link;
}


function urlqr()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }
    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
    $link = str_replace('app/guest/genlink.php', 'app/index.php?p=guest_detail&key=', $full);
    return $link;
}

function urlqrview()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }
    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
    $link = str_replace('forview/guest/genlink.php', 'viewroom.php?p=guest_detail&key=', $full);
    return $link;
}

function urlcard()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }

    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

    $link = str_replace('app/asset/print.php', 'card.php?key=', $full);

    return $link;
}
function urlcard2()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }

    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

    $link = str_replace('app/asset2/print.php', 'card2.php?key=', $full);

    return $link;
}

function url3()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
    } else {
        $protocol = 'http';
    }

    $full = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

    $cut2 = str_replace('dashboard/card/report_info.php', 'card.php?key=', $full);

    return $cut2;
}

function timespan($seconds = 1, $time = '')
{
    if (!is_numeric($seconds)) {
        $seconds = 1;
    }

    if (!is_numeric($time)) {
        $time = time();
    }

    if ($time <= $seconds) {
        $seconds = 1;
    } else {
        $seconds = $time - $seconds;
    }

    $str = '';
    $years = floor($seconds / 31536000);

    if ($years > 0) {
        $str .= $years . ' ปี, ';
    }

    $seconds -= $years * 31536000;
    $months = floor($seconds / 2628000);

    if ($years > 0 or $months > 0) {
        if ($months > 0) {
            $str .= $months . ' เดือน, ';
        }

        $seconds -= $months * 2628000;
    }

    $weeks = floor($seconds / 604800);

    if ($years > 0 or $months > 0 or $weeks > 0) {
        if ($weeks > 0) {
            $str .= $weeks . ' สัปดาห์, ';
        }

        $seconds -= $weeks * 604800;
    }

    $days = floor($seconds / 86400);

    if ($months > 0 or $weeks > 0 or $days > 0) {
        if ($days > 0) {
            $str .= $days . ' วัน, ';
        }

        $seconds -= $days * 86400;
    }

    $hours = floor($seconds / 3600);

    return substr(trim($str), 0, -1);
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
function month()
{
    $TH_Month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

    $nMonth = date("n") - 1;

    return $TH_Month[$nMonth];
}

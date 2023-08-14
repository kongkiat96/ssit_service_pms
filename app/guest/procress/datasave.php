<?php

if (isset($_POST['save_guest'])) {
    // echo "ssssddd";
    if (htmlspecialchars($_POST['fname']) != NULL && htmlspecialchars($_POST['lname']) != NULL) {
        $card_key = md5(htmlspecialchars($_POST['card_code']) . time("now"));
        if (!defined('pic')) {
            define('pic', '../resource/guest/delevymo/');
        }
        if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
            $pic = str_replace($remove_charname, '', $_FILES['pic']['name']);
            $fixname_pic = htmlspecialchars($_POST['card_code']) . '-' . $pic;
            $File_tmpname = $_FILES['pic']['tmp_name'];

            if (move_uploaded_file($File_tmpname, (pic . $fixname_pic)));
        }
        resizeguestpic($pic, $fixname_pic);
        $getdata->my_sql_insert(
            $connect,
            "bm_guest",
            "key_guest = '" . $card_key . "',
          code = '" . htmlspecialchars($_POST['card_code']) . "',
          prefix_name = '" . htmlspecialchars($_POST['prefixname']) . "',
          fname = '" . htmlspecialchars($_POST['fname']) . "',
          lname = '" . htmlspecialchars($_POST['lname']) . "',
          position = '" . htmlspecialchars($_POST['position']) . "',
          tel = '" . htmlspecialchars($_POST['tel']) . "',
          pic = '" . $fixname_pic . "',
          building = '" . htmlspecialchars($_POST['building']) . "',
          floor = '" . htmlspecialchars($_POST['floor']) . "',
          room = '" . htmlspecialchars($_POST['room']) . "',
          department = '" . htmlspecialchars($_POST['department']) . "',
          status_guest = '" . htmlspecialchars($_POST['status_guest']) . "',
          end_date = '" . htmlspecialchars($_POST['end_date']) . "',
          user_key = '" . $_SESSION['ukey'] . "',
          create_time = '" . date("Y-m-d H:i:s") . "'"
        );

        // $getdata->my_sql_insert(
        //     $connect,
        //     "bm_guest",
        //     "key_guest = '" . $card_key . "',
        //   code = '" . htmlspecialchars($_POST['card_code']) . "',
        //   prefix_name = '" . htmlspecialchars($_POST['prefixname']) . "',
        //   fname = '" . htmlspecialchars($_POST['fname']) . "',
        //   lname = '" . htmlspecialchars($_POST['lname']) . "',
        //   position = '" . htmlspecialchars($_POST['position']) . "',
        //   tel = '" . htmlspecialchars($_POST['tel']) . "',
        //   id_card = '" . htmlspecialchars($_POST['idcard']) . "',
        //   pic = '" . $fixname_pic . "',
        //   detail = '" . htmlspecialchars($_POST['detail']) . "',
        //   building = '" . htmlspecialchars($_POST['building']) . "',
        //   floor = '" . htmlspecialchars($_POST['floor']) . "',
        //   room = '" . htmlspecialchars($_POST['room']) . "',
        //   department = '" . htmlspecialchars($_POST['department']) . "',
        //   status_guest = '" . htmlspecialchars($_POST['status_guest']) . "',
        //   end_date = '" . htmlspecialchars($_POST['end_date']) . "',
        //   user_key = '" . $_SESSION['ukey'] . "',
        //   create_time = '" . date("Y-m-d H:i:s") . "'"
        // );

        echo '<script>window.location="index.php?p=guest_detail&key=' . $card_key . '";</script>';
    } else {
        $alert = $warning;
    }
}

if (isset($_POST['save_edit_guest'])) {

    if (
        // htmlspecialchars($_POST['edit_prefixname']) != NULL &&
        htmlspecialchars($_POST['edit_fname'] != NULL)
    ) {
        $getdata->my_sql_update(
            $connect,
            "bm_guest",
            "prefix_name = '" . htmlspecialchars($_POST['edit_prefixname']) . "',
          fname = '" . htmlspecialchars($_POST['edit_fname']) . "',
          lname = '" . htmlspecialchars($_POST['edit_lname']) . "',
          position = '" . htmlspecialchars($_POST['edit_position']) . "',
          tel = '" . htmlspecialchars($_POST['edit_tel']) . "',
          id_card = '" . htmlspecialchars($_POST['edit_idcard']) . "',
          detail = '" . htmlspecialchars($_POST['edit_detail']) . "',
          status = '" . htmlspecialchars($_POST['status']) . "',
          check_in = '" . htmlspecialchars($_POST['check_in']) . "',
          check_out = '" . htmlspecialchars($_POST['check_out']) . "',
          department = '" . htmlspecialchars($_POST['edit_department']) . "',
          status_guest = '" . htmlspecialchars($_POST['status_guest']) . "',
          end_date = '" . htmlspecialchars($_POST['end_date']) . "',
          user_key = '" . $_SESSION['ukey'] . "'",
            "key_guest='" . htmlspecialchars($_POST['key_guest']) . "'"
        );
        if (htmlspecialchars($_POST['status']) == '0') {
            $getdata->my_sql_update(
                $connect,
                "service_list",
                "se_li_status ='1'",
                "se_li_id = '" . htmlspecialchars($_POST['room_log']) . "'"
            );
        }

        //         if($_POST['status'] == '0') {
        //             $getalert = $getdata->my_sql_query($connect, NULL, "system_info", NULL);

        //         // send Notify
        //         // ส่งข้อมูลเข้าไลน์
        //         $fullname = $_POST['full_name'];
        //         $position = $_POST['position'];
        //         $checkIn = $_POST['checkin'];
        //         $chackOut = $_POST['checkout'];
        //         $count = $_POST['count'] != '0' ? $_POST['count']." คน" : "ไม่แจ้งบริวาร";
        //         $status = "ออกจากห้องพัก";

        //         $line_token = $getalert->site_key; // Token
        //         $line_text = "
        // ------------------------
        // ชื่อ - นามสกุล : {$fullname}
        // ตำแหน่ง : {$position}
        // วันที่เข้าห้องพัก : {$checkIn}
        // วันที่ออกจากห้องพัก : {$chackOut}
        // บริวาร : {$count}
        // ------------------------
        // สถานะระบบ : $status
        // ";

        //         lineNotify($line_text, $line_token); // เรียกใช้ Functions line
        //         }

        $alert = $success2;
    } else {
        $alert = $warning;
        // echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";
    }
}

if (isset($_POST['save_edit_guest_room'])) {

    if (
        htmlspecialchars($_POST['building']) != NULL &&
        htmlspecialchars($_POST['floor'] != NULL)
    ) {
        $getdata->my_sql_update(
            $connect,
            "bm_guest",
            "building = '" . htmlspecialchars($_POST['building']) . "',
            floor = '" . htmlspecialchars($_POST['floor']) . "',
            room = '" . htmlspecialchars($_POST['room']) . "',
          user_key = '" . $_SESSION['ukey'] . "'",
            "key_guest='" . htmlspecialchars($_POST['key_guest']) . "'"
        );
        if (htmlspecialchars($_POST['room_log']) != NULL) {
            $getdata->my_sql_update(
                $connect,
                "service_list",
                "se_li_status ='1'",
                "se_li_id = '" . htmlspecialchars($_POST['room_log']) . "'"
            );
        }

        $alert = $success2;
        //echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";
    } else {
        $alert = $warning;
        // echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";
    }
}

if (isset($_POST['save_edit_guest_pic'])) {

    if (!defined('pic')) {
        define('pic', '../resource/guest/delevymo/');
    }
    if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
        $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
        $pic = str_replace($remove_charname, '', $_FILES['pic']['name']);
        $fixname_pic = htmlspecialchars($_POST['card_code']) . '-edit_guest-' . $pic;
        $File_tmpname = $_FILES['pic']['tmp_name'];

        if (move_uploaded_file($File_tmpname, (pic . $fixname_pic)));
    }
    resizeguestpic($pic, $fixname_pic);

    $getdata->my_sql_update(
        $connect,
        "bm_guest",
        "pic = '" . $fixname_pic . "',
          user_key = '" . $_SESSION['ukey'] . "'",
        "key_guest='" . htmlspecialchars($_POST['key_guest']) . "'"
    );

    $alert = $success2;
    //echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";

}

if (isset($_POST['save_guest_detail'])) {

    if (htmlspecialchars($_POST['prefixname']) != NULL && htmlspecialchars($_POST['fname']) != NULL) {
        if (!defined('pic')) {
            define('pic', '../resource/guest/delevymo/');
        }
        if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
            $pic = str_replace($remove_charname, '', $_FILES['pic']['name']);
            $fixname_pic = htmlspecialchars($_POST['card_code']) . '-detail-' . $pic;
            $File_tmpname = $_FILES['pic']['tmp_name'];

            if (move_uploaded_file($File_tmpname, (pic . $fixname_pic)));
        }
        resizeguestpic($pic, $fixname_pic);


        $getdata->my_sql_insert(
            $connect,
            "bm_guest_detail",
            "prefix_name  = '" . htmlspecialchars($_POST['prefixname']) . "',
        fname  = '" . htmlspecialchars($_POST['fname']) . "',
        lname  = '" . htmlspecialchars($_POST['lname']) . "',
        position  = '" . htmlspecialchars($_POST['position']) . "',
        relation  = '" . htmlspecialchars($_POST['relation']) . "',
        tel  = '" . htmlspecialchars($_POST['tel']) . "',
        id_card  = '" . htmlspecialchars($_POST['idcard']) . "',
        pic = '" . $fixname_pic . "',
        detail = '" . htmlspecialchars($_POST['detail']) . "',
        code_guest = '" . htmlspecialchars($_POST['card_code']) . "',
        user_key = '" . $_SESSION['ukey'] . "',
        create_time = '" . date("Y-m-d H:i:s") . "'"
        );

        $alert = $success2;
    } else {
        $alert = $warning;
    }
}

if (isset($_POST['save_edit_guest_detail'])) {

    if (
        htmlspecialchars($_POST['edit_prefixname']) != NULL &&
        htmlspecialchars($_POST['edit_fname'] != NULL)
    ) {
        $getdata->my_sql_update(
            $connect,
            "bm_guest_detail",
            "prefix_name = '" . htmlspecialchars($_POST['edit_prefixname']) . "',
          fname = '" . htmlspecialchars($_POST['edit_fname']) . "',
          lname = '" . htmlspecialchars($_POST['edit_lname']) . "',
          position = '" . htmlspecialchars($_POST['edit_position']) . "',
          relation = '" . htmlspecialchars($_POST['edit_relation']) . "',
          tel = '" . htmlspecialchars($_POST['edit_tel']) . "',
          id_card = '" . htmlspecialchars($_POST['edit_idcard']) . "',
          detail = '" . htmlspecialchars($_POST['edit_detail']) . "',
          code_guest = '" . htmlspecialchars($_POST['code_guest']) . "',
          user_key = '" . $_SESSION['ukey'] . "'",
            "ID='" . htmlspecialchars($_POST['detail_id']) . "'"
        );

        $alert = $success2;
        //echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";
    } else {
        $alert = $warning;
        // echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";
    }
}

if (isset($_POST['save_edit_guest_list_pic'])) {

    if (!defined('pic')) {
        define('pic', '../resource/guest/delevymo/');
    }
    if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
        $remove_charname = array(' ', '`', '"', '\'', '\\', '/', '_');
        $pic = str_replace($remove_charname, '', $_FILES['pic']['name']);
        $fixname_pic = htmlspecialchars($_POST['code_guest']) . '-edit_guest_list-' . $pic;
        $File_tmpname = $_FILES['pic']['tmp_name'];

        if (move_uploaded_file($File_tmpname, (pic . $fixname_pic)));
    }
    resizeguestpic($pic, $fixname_pic);

    $getdata->my_sql_update(
        $connect,
        "bm_guest_detail",
        "pic = '" . $fixname_pic . "',
          user_key = '" . $_SESSION['ukey'] . "'",
        "ID='" . htmlspecialchars($_POST['pic_id']) . "'"
    );

    $alert = $success2;
    //echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";

}


if (isset($_POST['save_confirm'])) {

    if (htmlspecialchars($_POST['room']) != NULL && htmlspecialchars($_POST['key_guest'])) {
        if (htmlspecialchars($_POST['sys_procress']) == '1') {
            $getdata->my_sql_update(
                $connect,
                "service_list",
                "se_li_status = '2'",
                "se_li_id='" . htmlspecialchars($_POST['room']) . "'"
            );
        } else {
            $getdata->my_sql_update(
                $connect,
                "service_list",
                "se_li_status = '1'",
                "se_li_id='" . htmlspecialchars($_POST['room']) . "'"
            );
        }
        if (htmlspecialchars($_POST['sys_procress']) == '2') {
            $getdata->my_sql_update(
                $connect,
                "bm_guest",
                "sys_procress = '" . htmlspecialchars($_POST['sys_procress']) . "',
                status = '9',
                user_key = '" . $_SESSION['ukey'] . "'",
                "key_guest='" . htmlspecialchars($_POST['key_guest']) . "'"
            );
        } else {
            $getdata->my_sql_update(
                $connect,
                "bm_guest",
                "sys_procress = '" . htmlspecialchars($_POST['sys_procress']) . "',
                user_key = '" . $_SESSION['ukey'] . "'",
                "key_guest='" . htmlspecialchars($_POST['key_guest']) . "'"
            );
        }

        $getdata->my_sql_update(
            $connect,
            "bm_guest",
            "status_guest_detail = '" . htmlspecialchars($_POST['show_guest_follow']) . "',
            user_key = '" . $_SESSION['ukey'] . "'",
            "key_guest='" . htmlspecialchars($_POST['key_guest']) . "'"
        );

        //         if(($_POST['statusCheck']) == '1'){
        //             $status = "รอการยืนยันเข้าพัก";
        //         } else if(($_POST['statusCheck']) == '2'){
        //             $status = "เข้าพัก";
        //         }else if(($_POST['statusCheck']) == '9'){
        //             $status = "ยกเลิกข้อมูล";
        //         } else {
        //             $status = "ออกจากห้องพัก";
        //         }
        //         $getalert = $getdata->my_sql_query($connect, NULL, "system_info", NULL);

        //         // send Notify
        //         // ส่งข้อมูลเข้าไลน์
        //         $fullname = $_POST['full_name'];
        //         $position = $_POST['position'];
        //         $checkIn = $_POST['checkin'];
        //         $chackOut = $_POST['checkout'];
        //         $count = $_POST['count'] != '0' ? $_POST['count']." คน" : "ไม่แจ้งบริวาร";


        //         $line_token = $getalert->site_key; // Token
        //         $line_text = "
        // ------------------------
        // ชื่อ - นามสกุล : {$fullname}
        // ตำแหน่ง : {$position}
        // วันที่เข้าห้องพัก : {$checkIn}
        // วันที่ออกจากห้องพัก : {$chackOut}
        // บริวาร : {$count}
        // ------------------------
        // สถานะระบบ : $status
        // ";

        //         lineNotify($line_text, $line_token); // เรียกใช้ Functions line


        $alert = $success;
        //echo '<script>window.location="index.php";</script>';
    } else {
        $alert = $warning;
    }



    //echo "<META HTTP-EQUIV='Refresh' CONTENT = '1; URL='" . $SERVER_NAME . "'>";

}

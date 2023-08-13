<?php

$getch = $getdata->my_sql_show_rows($connect, "user", "user_key = '" . $_POST['card_key'] . "'"); //แสดงจำนวนที่ส่งค่ามาว่ามีกี่จำนวน
$chusername = $getdata->my_sql_show_rows($connect, "user", "username = '" . $_POST['email'] . "'");

$getcontrol = $getdata->my_sql_show_rows($connect, "employee", "card_key <> 'hidden'"); // นับข้อมูลใน database


if (isset($_POST['savedata'])) {
    if ($getcontrol < 999) {
        $mbkey = md5(rand() . time("now"));
$status = $_POST['em_class'] == '1' ? '0' : '1';

            if ($chusername == 0) {

                $getdata->my_sql_insert(
                    $connect,
                    "employee",
                    "em_key='" . $mbkey . "',
                    title_name='" . htmlspecialchars($_POST['title_name']) . "',
                    em_name = '" . htmlspecialchars($_POST['em_name']) . "',
                    em_lastname = '" . htmlspecialchars($_POST['em_lastname']) . "',
                    em_position='" . htmlspecialchars($_POST['em_position']) . "',
                    em_department='" . htmlspecialchars($_POST['em_department']) . "',
                    em_company='" . htmlspecialchars($_POST['em_company']) . "',
                    em_class='" . htmlspecialchars($_POST['em_class']) . "'"
                );

                $getdata->my_sql_insert(
                    $connect,
                    "user",
                    "user_key='" . $mbkey . "',
            name='" . htmlspecialchars($_POST['em_name']) . "',
            lastname = '" . htmlspecialchars($_POST['em_lastname']) . "',
            username='" . htmlspecialchars($_POST['email']) . "',
            user_status = '".$status."',
            email='" . htmlspecialchars($_POST['email']) . "',
            user_class='" . htmlspecialchars($_POST['em_class']) . "'"
                );



                $alert = $success_admin;
            } else {
                $alert = $counterror;
            }

    } else {
        $alert = $warning;
    }
}
if(isset($_POST['editdata'])){
    $status = $_POST['em_class'] == '1' ? '0' : '1';
    $getdata->my_sql_update(
        $connect,
        "employee",
        "title_name='" . htmlspecialchars($_POST['title_name']) . "',
        em_name = '" . htmlspecialchars($_POST['em_name']) . "',
        em_lastname = '" . htmlspecialchars($_POST['em_lastname']) . "',
        em_position='" . htmlspecialchars($_POST['em_position']) . "',
        em_department='" . htmlspecialchars($_POST['em_department']) . "',
        em_company='" . htmlspecialchars($_POST['em_company']) . "',
        em_class='" . htmlspecialchars($_POST['em_class']) . "'",
        "em_key='" . htmlspecialchars($_POST['em_key']) . "'"
    );

    $getdata->my_sql_update(
        $connect,
        "user",
        "name='" . htmlspecialchars($_POST['em_name']) . "',
lastname = '" . htmlspecialchars($_POST['em_lastname']) . "',
username='" . htmlspecialchars($_POST['email']) . "',
email='" . htmlspecialchars($_POST['email']) . "',
user_status = '".$status."',
user_class='" . htmlspecialchars($_POST['em_class']) . "'",
"user_key='" . htmlspecialchars($_POST['em_key']) . "'"
    );



    $alert = $success_admin;
}
?>
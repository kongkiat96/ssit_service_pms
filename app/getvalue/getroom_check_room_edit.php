<?php
session_start();
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");


$ser_list = $_POST['floor'];
$getprefix = $getdata->my_sql_select($connect, NULL, "service_list", "se_id = '" . $ser_list . "' AND se_li_status = '1' AND se_li_status != '0'");
echo "<option value=''>--- เลือก ห้อง ---</option>";
while ($showservice = mysqli_fetch_object($getprefix)) {
  echo '<option value="' . $showservice->se_li_id . '">' . $showservice->se_li_name . '</option>';
}

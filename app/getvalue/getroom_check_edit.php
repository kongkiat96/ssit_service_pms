<?php
session_start();
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");


$ser_list = $_POST['building'];
$getprefix = $getdata->my_sql_select($connect, NULL, "service", "se_group = '" . $ser_list . "'");
echo "<option value=''>--- เลือก ชั้น ---</option>";
while ($showservice = mysqli_fetch_object($getprefix)) {
  echo '<option value="' . $showservice->se_id . '">' . $showservice->se_name . '</option>';
}

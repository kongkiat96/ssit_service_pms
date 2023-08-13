<?php
  require("config.core.php");
  require("connect.core.php");
  require("functions.core.php");
  $getdata = new clear_db();
  $connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
  mysqli_set_charset($connect,"utf8");

  $getdepartment = $_POST['em_key'];
    $showdepartment = $getdata->my_sql_select($connect,NULL,"employee", "em_key ='".$getdepartment."' ORDER BY date_create");
    while ($showDetail = mysqli_fetch_object($showdepartment))
     {
       echo '<option value="'.$showDetail->em_key.'">'.@getDepartment($showDetail->em_department).'</option>';
     }
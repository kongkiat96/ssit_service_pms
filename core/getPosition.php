<?php
  require("config.core.php");
  require("connect.core.php");
  require("functions.core.php");
  $getdata = new clear_db();
  $connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
  mysqli_set_charset($connect,"utf8");

  $getPosition = $_POST['em_key'];
    $showPosition = $getdata->my_sql_select($connect,NULL,"employee", "em_key ='".$getPosition."' ORDER BY date_create");
    while ($showDetail = mysqli_fetch_object($showPosition))
     {
       echo '<option value="'.$showDetail->em_key.'">'.$showDetail->em_position.'</option>';
     }
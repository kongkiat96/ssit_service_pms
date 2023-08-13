<?php
require("../../core/connect.core.php");
require("../../core/functions.core.php");
require("../../core/config.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$getalert = $getdata->my_sql_query($connect, NULL, "system_alert", NULL);
mysqli_set_charset($connect, "utf8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check system alert</title>
    <meta http-equiv="refresh" content="120">
</head>

<body>

    <table border="1" style="width:100%">
        <thead class="text-center ">
            <tr>
                <th>Tickets : </th>

                <th>วันที่แจ้งซ่อม : </th>
                <th>เวลา : </th>
                <th>ฝ่ายที่แจ้ง :</th>
                <th>สถานะ : </th>
                <th>เวลาที่จะหมด</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                $getProblem = $getdata->my_sql_select($connect, NULL, "problem_list", "ID AND status IS NULL AND date = '".date("Y-m-d")."' ORDER BY ID DESC");
                while ($showProblem = mysqli_fetch_object($getProblem)) {
                $i++;
            ?>
            <tr>
                <td><?php echo $showProblem->ticket; ?></td>
                <td><?php echo @dateConvertor($showProblem->date); ?></td>
                <td><?php echo $showProblem->time_start; ?></td>
                <td><?php echo @req_service($showProblem->se_req); ?></td>
                <td><?php echo $showProblem->status != null ? @useStatus($showProblem->status) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                </td>

                <td>
                    <?php 
                        $getcheck = $getdata->my_sql_show_rows($connect, "log_alert", "ticket = '" . $showProblem->ticket . "'");
                        //echo $getcheck2;
                        $step_1 = date($showProblem->time_start);
                        // $work_time_1 = "+1 hour +29 minute";
                        $work_time_1 = "+2 hour";

                        $step_1_end = date("H:i:s",strtotime($step_1.$work_time_1));
                        // echo $step_1."<br><br>";
                        echo $step_1_end;
                        echo "<br><br>";

                        if($step_1_end < date("H:i:s")){
                            if ($getcheck == 0) {
                                $getdata->my_sql_insert(
                                    $connect,
                                    "log_alert",
                                    "ticket ='" . $showProblem->ticket . "',
                                    status = '0'"
                                ); 
                                $line_token = $getalert->alert_line_token; // Token
                                    $line_text = "
---------- ยังไม่มีผู้รับดำเนินงานตามที่กำหนด -----------
Ticket : {$showProblem->ticket}
-----------------------------
ผู้แจ้ง : ".@getemployeeName($showProblem->user_key)."
ตำแหน่ง : ".@getPosition($showProblem->user_key)."
สังกัด / ฝ่าย : ".@getDepartmentEm($showProblem->user_key)."
------------------------
แจ้งงาน : ".@req_service($showProblem->se_req)."
รายการ : {$showProblem->se_asset}
รายละเอียดที่ชำรุด : {$showProblem->se_other}
สถานที่ : ".@getLocation($showProblem->se_location)."
------------------------
Link : ".@urllink()."";
lineNotify($line_text, $line_token); // เรียกใช้ Functions line
                                   
                            }
                        }
                        ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
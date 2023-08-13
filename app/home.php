<?php
include_once 'service/procress/dataSave.php';
?>
<?php
// count for this page
$getworkadmin = $getdata->my_sql_show_rows($connect, "problem_list", "ID AND admin_update = '".$_SESSION['ukey']."' AND (status NOT IN ('2e34609794290a770cb0349119d78d21','57995055c28df9e82476a54f852bd214') OR status IS NULL) ORDER BY ID DESC");
$getworksuccessadmin = $getdata->my_sql_show_rows($connect, "problem_list", "ID AND (admin_update = '".$_SESSION['ukey']."') AND status IN ('2e34609794290a770cb0349119d78d21')  ORDER BY ID DESC")

?>

<div class="modal fade" id="timeline_work_admin" aria-labelledby="timeline_work_admin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="timeline_work_admin">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-exit"></i>
                    ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewonly" aria-labelledby="viewonly" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="viewonly">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-exit"></i>
                    ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="getwork" aria-labelledby="getwork" data-bs-backdrop="static" tabindex="1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="getwork">

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="timeline_work_admin" aria-labelledby="timeline_work_admin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="timeline_work_admin">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-exit"></i>
                    ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class="d-flex flex-column align-items-center">
                        <img class="img-fluid rounded my-4"
                            src="../resource/users/images/<?php echo $userdata->user_photo; ?>" height="110" width="110"
                            alt="User avatar" />
                        <div class="user-info text-center">
                            <h4 class="mb-2"><?php echo @getemployeeName($_SESSION['ukey']); ?></h4>
                            <?php if($_SESSION['uclass'] == '3'){
                                echo '<span class="badge bg-label-danger">ผู้ดูแลระบบ</span>';
                            } else {
                                echo '<span class="badge bg-label-warning">เจ้าหน้าที่</span>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-around py-3 my-4">
                    <div class="gap-3 d-flex align-items-start mt-3 me-4">
                        <span class="badge bg-label-success rounded p-2"><i class="bx bx-check bx-sm"></i></span>
                        <div>
                            <h5 class="mb-0"><?php echo number_format($getworksuccessadmin); ?></h5>
                            <span>งานที่ดำเนินการเสร็จ</span>
                        </div>
                    </div>
                    <div class="gap-3 d-flex align-items-start mt-3">
                        <span class="badge bg-label-warning rounded p-2"><i class="bx bx-customize bx-sm"></i></span>
                        <div>
                            <h5 class="mb-0"><?php echo number_format($getworkadmin); ?></h5>
                            <span>งานที่รอการแก้ไข</span>
                        </div>
                    </div>
                </div>
                <h5 class="border-bottom pb-2 mb-4">รายละเอียด</h5>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Username : </span>
                            <span><?php echo $userdata->username;?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Email : </span>
                            <span><?php echo $userdata->email;?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Status : </span>
                            <span class="badge bg-label-success">Active</span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">แผนก / ฝ่าย : </span>
                            <span><?php echo @getDepartment($getdatailuser->em_department); ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">ตำแหน่ง : </span>
                            <span><?php echo $getdatailuser->em_position; ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">บริษัท / สังกัด : </span>
                            <span><?php echo @getCompany($getdatailuser->em_company); ?></span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center pt-3">
                        <a href="?p=view_info" class="btn btn-primary me-3"><i class='bx bxs-user-rectangle' ></i> Edit</a>
                        <a href="../core/logout.core.php" class="btn btn-label-danger suspend-user"><i class='bx bxs-exit' ></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12">
        <div class="card mt-3">
            <div class="card-header">
                <div class="col-12">
                    <h6 class="fw-semibold">ตารางแสดงข้อมูลรายการที่ได้รับมอบหมายงาน หรือกำลังดำเนินการอยู่</h6>

                    <hr class="mt-0" />
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="responsive-data-table-1" class="table dt-responsive table-hover"
                        style="font-family: sarabun; font-size: 16px;" width="100%">
                        <thead class="text-center ">
                            <tr>
                                <th>Tickets : </th>
                                <th>ชื่อ - นามสกุล : </th>
                                <th>วันที่แจ้งซ่อม : </th>
                                <th>เวลา : </th>
                                <th>ฝ่ายที่แจ้ง :</th>
                                <th>สถานะ : </th>
                                <th>ผู้ดำเนินการ : </th>
                                <th>วันที่รับดำเนินการ : </th>
                                <th>เวลา : </th>
                                <th>เครื่องมือ : </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $i = 0;
                        $getProblem = $getdata->my_sql_select($connect, NULL, "problem_list", "ID AND admin_update = '".$_SESSION['ukey']."' AND (status NOT IN ('2e34609794290a770cb0349119d78d21','57995055c28df9e82476a54f852bd214') OR status IS NULL) ORDER BY ID DESC");
                        while ($showProblem = mysqli_fetch_object($getProblem)) {
                        $i++;
                        ?>
                            <tr>
                                <td><?php echo $showProblem->ticket; ?></td>
                                <td><?php echo @getemployeeName($showProblem->user_key); ?></td>
                                <td><?php echo @dateConvertor($showProblem->date); ?></td>
                                <td><?php echo $showProblem->time_start; ?></td>
                                <td><?php echo @req_service($showProblem->se_req); ?></td>
                                <td><?php echo $showProblem->status != null ? @useStatus($showProblem->status) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td><?php echo $showProblem->admin_update != '' ? @getemployeeName($showProblem->admin_update) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td><?php echo $showProblem->date_update != '0000-00-00' ? @dateConvertor($showProblem->date_update) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td><?php echo $showProblem->time_update != '' ? $showProblem->time_update : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td>
                                    <?php if($showProblem->status != '2e34609794290a770cb0349119d78d21' && $showProblem->status != '57995055c28df9e82476a54f852bd214'){?>
                                    <?php echo '<a href="#" data-bs-toggle="modal" data-bs-target="#getwork" data-whatever="' . @$showProblem->ticket . '" class="btn rounded-pill btn-icon btn-label-info btn-sm" data-top="toptitle" data-placement="top" title="ดำเนินงาน"><span class="tf-icons bx bx-calendar-plus"></span></a>&nbsp'; ?>


                                    <?php if ($_SESSION['uclass'] == 3) { ?>
                                    <a href="#" onclick="deletework('<?php echo @$showProblem->ticket; ?>');"
                                        class="btn rounded-pill btn-icon btn-label-danger btn-sm" data-top="toptitle"
                                        data-placement="top" title="ยกเลิกงานแจ้ง"><span
                                            class="tf-icons bx bxs-trash"></span></a>&nbsp
                                    <?php } ?>
                                    <?php } ?>

                                    <?php echo '<a href="#" data-bs-toggle="modal" data-bs-target="#timeline_work_admin" data-whatever="' . @$showProblem->ticket . '" class="btn rounded-pill btn-icon btn-label-primary btn-sm" data-top="toptitle" data-placement="top" title="ตรวจสอบ"><span class="tf-icons bx bx-search-alt"></span></a>&nbsp'; ?>

                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="col-12">
                    <h6 class="fw-semibold">ตารางแสดงข้อมูลรายการที่ดำเนินการเรียบร้อย</h6>

                    <hr class="mt-0" />
                </div>
                <div class="table-responsive text-nowrap">
                    <table id="responsive-data-table-2" class="table dt-responsive table-hover"
                        style="font-family: sarabun; font-size: 16px;" width="100%">
                        <thead class="text-center ">
                            <tr>
                                <th>Tickets : </th>
                                <th>ชื่อ - นามสกุล : </th>
                                <th>วันที่แจ้งซ่อม : </th>
                                <th>เวลา : </th>
                                <th>ฝ่ายที่แจ้ง :</th>
                                <th>สถานะ : </th>
                                <th>ผู้ดำเนินการ : </th>
                                <th>วันที่รับดำเนินการ : </th>
                                <th>เวลา : </th>
                                <th>เครื่องมือ : </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $i = 0;
                        $getProblem = $getdata->my_sql_select($connect, NULL, "problem_list", "ID AND (se_assign = '".$_SESSION['ukey']."' OR admin_update = '".$_SESSION['ukey']."') AND status IN ('2e34609794290a770cb0349119d78d21')  ORDER BY ID DESC");
                        while ($showProblem = mysqli_fetch_object($getProblem)) {
                        $i++;
                        ?>
                            <tr>
                                <td><?php echo $showProblem->ticket; ?></td>
                                <td><?php echo @getemployeeName($showProblem->user_key); ?></td>
                                <td><?php echo @dateConvertor($showProblem->date); ?></td>
                                <td><?php echo $showProblem->time_start; ?></td>
                                <td><?php echo @req_service($showProblem->se_req); ?></td>
                                <td><?php echo $showProblem->status != null ? @useStatus($showProblem->status) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td><?php echo $showProblem->admin_update != '' ? @getemployeeName($showProblem->admin_update) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td><?php echo $showProblem->date_update != '0000-00-00' ? @dateConvertor($showProblem->date_update) : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td><?php echo $showProblem->time_update != '' ? $showProblem->time_update : '<span class="badge bg-label-warning">รอการตอบรับ</span>'; ?>
                                </td>
                                <td>
                                    <?php if($showProblem->status == '2e34609794290a770cb0349119d78d21'){
                                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#viewonly" data-whatever="' . @$showProblem->ticket . '" class="btn rounded-pill btn-icon btn-label-info btn-sm" data-top="toptitle" data-placement="top" title="ตรวจสอบข้อมูลงานเสร็จสิ้น"><span class="tf-icons bx bx-image-alt"></span></a>&nbsp';
                                    } ?>
                                    <?php echo '<a href="#" data-bs-toggle="modal" data-bs-target="#timeline_work_admin" data-whatever="' . @$showProblem->ticket . '" class="btn rounded-pill btn-icon btn-label-primary btn-sm" data-top="toptitle" data-placement="top" title="ตรวจสอบ"><span class="tf-icons bx bx-search-alt"></span></a>&nbsp'; ?>

                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
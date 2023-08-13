<?php 
require 'procress/saveData.php';
?>
<div class="modal fade" id="sentrate" aria-labelledby="sentrate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
        <form method="post">
            <div class="sentrate">

            </div>
        </form>
            
        </div>
    </div>
</div>

<div class="modal fade" id="viewonly_user" aria-labelledby="viewonly_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="viewonly_user">

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

<div class="card mt-3">
    <div class="card-body">
        <div class="col-12">
            <h5 class="fw-semibold">ตรวจสอบสถานะการแจ้งซ่อม/ปัญหา</h4>
            <hr class="mt-0" />
        </div>
        <div class="form-block p-2">
            <div class="table-responsive text-nowrap">
                <table id="responsive-data-table-1" class="table dt-responsive table-hover" style="font-family: sarabun; font-size: 16px;" width="100%">
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
                        $getProblem = $getdata->my_sql_select($connect, NULL, "problem_list", "ID ORDER BY ID DESC");
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
                                <?php echo '<a href="#" data-bs-toggle="modal" data-bs-target="#sentrate" data-whatever="' . @$showProblem->ticket . '" class="btn rounded-pill btn-icon btn-label-primary btn-sm" data-top="toptitle" data-placement="top" title="ตรวจสอบ"><span class="tf-icons bx bx-search-alt"></span></a>&nbsp'; ?>
                                <?php if($showProblem->status == '2e34609794290a770cb0349119d78d21'){
                                echo '<a href="#" data-bs-toggle="modal" data-bs-target="#viewonly_user" data-whatever="' . @$showProblem->ticket . '" class="btn rounded-pill btn-icon btn-label-info btn-sm" data-top="toptitle" data-placement="top" title="ตรวจสอบข้อมูลงานเสร็จสิ้น"><span class="tf-icons bx bx-image-alt"></span></a>&nbsp';
                            } ?>
                            </td>
                        </tr>

                        <?php } ?>

                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
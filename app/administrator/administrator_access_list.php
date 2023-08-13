<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fa fa-street-view fa-fw"></i> [ผู้ดูแลระบบ] ตรวจสอบข้อมูลการเข้าถึง</h3>
        <hr class="mt-2">
    </div>
</div>

<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
        <li class="breadcrumb-item active" aria-current="page">ตรวจสอบข้อมูลการเข้าถึง</li>
    </ol>
</nav>



<div class="modal fade" id="showaccess_user" aria-labelledby="showaccess_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="showaccess_user">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-exit"></i>
                        ปิด
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>





<div class="card mt-3">
    <div class="card-body">
        <div class="col-12">
            <h5 class="fw-semibold">ตารางแสดงข้อมูลรายการเข้าถึง</h4>
            <hr class="mt-0" />
        </div>
        <table class="table table-bordered table-hover text-center">
            <thead class="table-success text-center font-weight-bold">
                <tr>
                    <td width="5%">ลำดับ</td>
                    <td>Access Key</td>
                    <td width="40%">ชื่อเมนู</td>
                    <td width="15%">จำนวนผู้เข้าถึง</td>
                    <td width="15%">จัดการ</td>
                </tr>
            </thead>
            <tbody>
                <?php
                                    $a = 0;
                                    $getaccess = $getdata->my_sql_select($connect, null, "access_list", "access_key <> '' AND access_status != '2' ORDER BY access_name");
                                    while ($showaccess = mysqli_fetch_object($getaccess)) {
                                        $a++;
                                    ?>
                <tr>
                    <td><?php echo @$a; ?></td>
                    <td><?php echo @$showaccess->access_key; ?></td>
                    <td>&nbsp;<span data-toggle="tooltip" data-placement="right"
                            title="<?php echo $showaccess->access_detail; ?>"><?php echo @$showaccess->access_name; ?></span>
                    </td>
                    <td><?php echo @number_format($getdata->my_sql_show_rows($connect, "access_user", "access_key='" . $showaccess->access_key . "'")); ?>
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showaccess_user"
                            data-whatever="<?php echo @$showaccess->access_key; ?>" data-top="toptitle"
                            data-placement="top" title="ตรวจสอบการเข้าถึง"><i
                                class="fa fa-user-shield fa-fw"></i></button>
                    </td>
                </tr>
                <?php
                                    }
                                    ?>
            </tbody>
        </table>

    </div>
    <div class="card-footer text-center">
        <a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>

    </div>
</div>
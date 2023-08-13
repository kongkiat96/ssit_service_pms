<div class="row">
  <div class="col-12">
    <h3 class="page-header"><i class="fa fa-bezier-curve"></i> [ผู้ดูแลระบบ] ตรวจสอบข้อมูลการใช้าน</h3>
    <hr class="mt-2">
  </div>
</div>
<nav aria-label="breadcrumb" class="mt-3 mb-3">
  <ol class="breadcrumb breadcrumb-inverse">
    <li class="breadcrumb-item">
      <a href="index.php">หน้าแรก</a>
    </li>
    <li class="breadcrumb-item" aria-current="page"><a href="index.php?p=setting">ตั้งค่า</a></li>
    <li class="breadcrumb-item active" aria-current="page">ตรวจสอบข้อมูลการใช้าน</li>
  </ol>
</nav>


<div class="card mt-3">
  <div class="card-body">
    <div class="col-12">
      <h5 class="fw-semibold">ข้อมูลการใช้งาน <span class="text-danger">จำกัดการแสดง 200 การใช้งานล่าสุด</span></h4>
      <hr class="mt-0" />
    </div>
    <div class="table-responsive text-nowrap">
      <table id="responsive-data-table-employee" class="table dt-responsive table-hover" style="font-family: sarabun; font-size: 16px;" width="100%">
        <thead class="text-center ">
          <tr>
            <td width="5%" class="form-label-md fw-semibold">ลำดับ</td>
            <td class="form-label-md fw-semibold">เวลา</td>
            <td class="form-label-md fw-semibold">IP Address</td>
            <td class="form-label-md fw-semibold">ข้อมูล</td>
            <td class="form-label-md fw-semibold">ผู้ใช้งาน</td>
            <td class="form-label-md fw-semibold">ชื่อ - นามสกุลผู้ใช้งาน</td>

          </tr>
        </thead>
        <tbody>
          <?php
                  $l = 0;
                  $getlogs = $getdata->my_sql_select($connect, NULL, "logs", "log_key ORDER BY log_date DESC LIMIT 200");
                  while ($showlogs = mysqli_fetch_object($getlogs)) {
                    $l++;
                  ?>
          <tr>
            <td><?php echo @$l; ?></td>
            <td><?php echo @dateTimeConvertor($showlogs->log_date); ?></td>
            <td><?php echo @$showlogs->log_ipaddress; ?></td>
            <td><?php echo @$showlogs->log_text; ?></td>
            <td>

              <?php echo @Userlogin($showlogs->log_user); ?>
            </td>
            <td>
              <?php echo @getemployeeName($showlogs->log_user); ?>
            </td>



          </tr>
          <?php
                  }
                  ?>
        </tbody>

      </table>
    </div>
  </div>
  <div class="card-footer text-center">
		<a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>

	</div>
</div>
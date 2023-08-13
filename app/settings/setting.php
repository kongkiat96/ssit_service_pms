<div class="row">
  <div class="col-12">
    <h3 class="page-header"><i class="fa fa-sliders-h fa-fw"></i> ตั้งค่า</h3>
    <hr class="mt-2">
  </div>
</div>


<nav aria-label="breadcrumb" class="mt-3 mb-3">
  <ol class="breadcrumb breadcrumb-inverse">
    <li class="breadcrumb-item">
      <a href="index.php">หน้าแรก</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">ตั้งค่า</li>
  </ol>
</nav>

<div class="card shadow">
  <div class="card-header">
    <div class="col-12">
      <h5 class="fw-semibold">ข้อมูลผู้ใช้งาน <i class="fa fa-user-cog fa-fw"></i></h4>
        <hr class="mt-0" />
    </div>
  </div>
  <div class="card-body">
    <a href="?p=view_info" class="btn btn-primary"><br><i class="fa fa-user fa-3x"></i><br><br>ข้อมูลส่วนตัว</a>
    <a href="?p=setting_info" class="btn btn-warning"><br><i class="fa fa-key fa-3x"></i><br><br>เปลี่ยนรหัสผ่าน</a>
  </div>
</div><br>
<?php
if (@$_SESSION['uclass'] == 2 || @$_SESSION['uclass'] == 3) {
?>
<div class="card shadow">
  <div class="card-header">
    <div class="col-12">
      <h5 class="fw-semibold">ตั้งค่าระบบ <i class="fa fa-cogs fa-fw"></i></h4>
        <hr class="mt-0" />
    </div>
  </div>
  <div class="card-body">
    <a href="?p=setting_system" class="btn btn-primary"><br><i class="fa fa-wrench fa-3x"></i><br><br>จัดการในระบบ</a>

    <a href="?p=setting_card_status" class="btn btn-success"><br><i class="fa fa-tags fa-3x"></i><br><br>สถานะประเภท</a>
  </div>
</div>
<?php } ?>
<br>
<?php
if (@$_SESSION['uclass'] == 3) {
?>
<div class="card shadow">
  <div class="card-header">
    <div class="col-12">
      <h5 class="fw-semibold">ผู้ดูแลระบบ <i class="fa fa-cogs fa-fw"></i></h4>
        <hr class="mt-0" />
    </div>
  </div>
  <div class="card-body">
    <a href="?p=setting_users" class="btn btn-secondary"><br><i class="fa fa-users fa-3x"></i><br><br>ผู้ใช้งานระบบ</a>
    <a href="?p=administrator_access_list" class="btn btn-primary"><br><i
        class="fa fa-street-view fa-3x"></i><br><br>ข้อมูลการเข้าถึง</a>
    <a href="?p=administrator_menus" class="btn btn-warning"><br><i
        class="fa fa-sitemap fa-3x"></i><br><br>จัดการลิงค์เมนู</a>
    <a href="?p=administrator_cases" class="btn btn-success"><br><i
        class="fa fa-bezier-curve fa-3x"></i><br><br>จัดการหน้าระบบ</a>
    <a href="?p=setting_app" class="btn btn-info"><br><i
        class="far fa-window-maximize fa-3x"></i><br><br>ตั้งค่าระบบ</a>
    <a href="?p=administrator_log" class="btn btn-danger"><br><i
        class="fa fa-user-clock fa-3x"></i><br><br>ประวัติเข้าระบบ</a>
    <a href="?p=setting_backup" class="btn btn-danger"><br><i
        class="fa fa-database fa-3x"></i><br><br>สำรองฐานข้อมูล</a>
    <a href="service/autoalert.php" class="btn btn-danger" target="_blank"><br><i
        class="fa fa-clock fa-3x"></i><br><br>ตรวจสอบการแจ้งเตือนอัตโนมัติ</a>
  </div>
</div>
<?php } ?>
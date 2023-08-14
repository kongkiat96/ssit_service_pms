<div class="row">
  <div class="col-12">
    <h3 class="page-header"><i class="fa fa-sliders-h fa-fw"></i> ตั้งค่า</h3>
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
    <h6 class="m-0 font-weight-bold text-left text-info">ข้อมูลผู้ใช้งาน <i class="fa fa-user-cog fa-fw"></i></h6>
  </div>
  <div class="card-body">
    <a href="?p=view_info" class="btn btn-primary mt-1"><i class="fa fa-user fa-fw fa-2x mt-2"></i><br><br>ข้อมูลส่วนตัว</a>
    <a href="?p=setting_info" class="btn btn-warning mt-1"><i class="fa fa-key fa-fw fa-2x mt-2"></i><br><br>เปลี่ยนแปลงรหัสผ่าน</a>
  </div>
</div><br>
<?php
if (@$_SESSION['uclass'] == 2 || @$_SESSION['uclass'] == 3) {
?>
  <div class="card shadow">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-left text-warning">ตั้งค่าระบบ <i class="fa fa-cogs fa-fw"></i></h6>
    </div>
    <div class="card-body">
      <a href="?p=setting_system" class="btn btn-primary mt-1"><i class="fa fa-wrench fa-fw fa-2x mt-2"></i><br><br>ภายในระบบ</a>
      <a href="?p=setting_users" class="btn btn-warning mt-1"><i class="fa fa-users fa-fw fa-2x mt-2"></i><br><br>ผู้ใช้งานระบบ</a>
      <!-- <a href="?p=setting_card_status" class="btn btn-success mt-1"><i class="fa fa-tags fa-fw fa-2x mt-2"></i><br><br>สถานะประเภท</a> -->
      <a href="?p=setting_room" class="btn btn-info mt-1"><i class="fa fa-calendar-minus fa-fw fa-2x mt-2"></i><br><br>เพิ่มข้อมูลรายงานห้องพัก</a>
    </div>
  </div>
<?php } ?>
<br>
<?php
if (@$_SESSION['uclass'] == 3) {
?>
  <div class="card shadow">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-left text-danger">ผู้ดูแลระบบ <i class="fa fa-cogs fa-fw"></i></h6>
    </div>
    <div class="card-body">
      <a href="?p=administrator_access_list" class="btn btn-primary mt-1"><i class="fa fa-street-view fa-fw fa-2x mt-2"></i><br><br>ข้อมูลการเข้าถึง</a>
      <a href="?p=administrator_menus" class="btn btn-warning mt-1"><i class="fa fa-sitemap fa-fw fa-2x mt-2"></i><br><br>จัดการเมนู</a>
      <a href="?p=setting_app" class="btn btn-info mt-1"><i class="far fa-window-maximize fa-fw fa-2x mt-2"></i><br><br>ตั้งค่าระบบ</a>
      <a href="?p=setting_backup" class="btn btn-danger mt-1"><i class="fa fa-database fa-fw fa-2x mt-2"></i><br><br>สำรองฐานข้อมูล</a>
      <!-- <a href="?p=administrator_cases" class="btn btn-success mt-1"><i class="fa fa-bezier-curve fa-fw fa-2x mt-2"></i><br><br>ตรวจสอบหน้าระบบ</a> -->


    </div>
  </div>
<?php } ?>
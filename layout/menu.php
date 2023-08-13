<?php $page = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
        <li class="menu-item <?php echo $page == 'index' ? 'active' : ''; ?>">
            <a href="index" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>หน้าหลักระบบแจ้งซ่อม/ปัญหา
            </a>
        </li>
        <li class="menu-item <?php echo $page == 'service' ? 'active' : ''; ?>">
            <a href="service" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cast"></i>ฟอร์มแจ้งซ่อม/ปัญหา
            </a>

        </li>
        <li class="menu-item <?php echo $page == 'list' ? 'active' : ''; ?>">
            <a href="list" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>ตรวจสอบสถานะ
            </a>
        </li>

        <li class="menu-item <?php echo $page == 'calendar' ? 'active' : ''; ?>">
            <a href="calendar" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>ปฏิทินรายการแจ้งปัญหา
            </a>
        </li>
        

        <!-- <li class="menu-item <?php echo $page == 'login' ? 'active' : ''; ?>">
            <a href="login" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-in"></i>ลงซื่อเข้าใช้งาน
            </a>

        </li> -->

    </ul>
</div>
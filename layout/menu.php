<?php $page = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
        <li class="menu-item <?php echo $page == 'index' ? 'active' : ''; ?>">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i> <span>ตรวจสอบรายการห้องพัก</span>
            </a>
        </li>
    </ul>
</div>
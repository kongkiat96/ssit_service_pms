<?php $page = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="container-xxl d-flex h-100">
    <ul class="menu-inner">
        <li class="menu-item <?php echo $page == 'index' ? 'active' : ''; ?>">
            <a href="index" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i> ตรวจสอบรายการห้องพัก
            </a>
        </li>
    </ul>
</div>
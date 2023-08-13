<?php 
error_reporting(0);
require("core/config.core.php");
require("core/connect.core.php");
require("core/functions.core.php");
require("core/alert.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
$system_info = $getdata->my_sql_query($connect, null, 'system_info', null);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="light-style" data-theme="theme-default" data-assets-path="assets/"
    data-template="horizontal-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <meta name="description" content="<?php echo @$system_info->site_name; ?>">

        <link rel="icon" type="image/x-icon" href="resource/system/favicon/<?php echo @$system_info->site_favicon; ?>" />
        <title><?php echo @$system_info->site_name; ?></title>
    <?php include 'core/header.php'?>

</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <?php include 'layout/nav.php';?>
            </nav>
            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu"
                        class="layout-menu-horizontal menu-horizontal menu flex-grow-0 bg-menu-theme">
                        <?php include 'layout/menu.php'?>
                    </aside>
                    <!-- / Menu -->

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php include 'layout/user/list_service.php';?>

                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-column flex-md-row flex-wrap justify-content-between py-2">
                            <div class="mb-2 mb-md-0">
                            <?php echo @$system_info->site_name; ?> สำนักจัดการอุทยานรังสรรค์นวัตกรรมอวกาศ : สจอ. © <script>document.write(new Date().getFullYear());</script> Information System Design & Develop By <a href="https://line.me/ti/p/-cfquTAxAJ" target="_blank" class="footer-link fw-bolder">Ekapong</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>
            <!--/ Layout container -->
        </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    <!--/ Layout wrapper -->
</body>
<?php include 'core/footer.php'?>
<?php echo @$alert; ?>
</html>
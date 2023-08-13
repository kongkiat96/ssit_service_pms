<?php
session_start();
error_reporting(0);

?>
<?php 
require 'core/config.core.php';
require 'core/connect.core.php';
require 'core/functions.core.php';
require 'core/alert.php';
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$system_info = $getdata->my_sql_query($connect, null, 'system_info', null);

mysqli_set_charset($connect, "utf8"); ?>
<!DOCTYPE html>

<html dir="ltr" class="light-style" data-theme="theme-default" data-assets-path="assets/"
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
                        <div class="row">

                            <!-- FormValidation -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-block p-2">

                                            <!-- Account Details -->
                                            <div class="col-12">
                                                <h5 class="fw-semibold">เข้าสู่ระบบสำหรับเจ้าหน้าที่</h4>
                                                    <hr class="mt-0" />
                                            </div>
                                            <div class="container-xxl">
                                                <div class="authentication-wrapper authentication-basic container-p-y">
                                                    <div class="authentication-inner">
                                                        <!-- Register -->
                                                        <div class="card ">
                                                            <div class="card-body">
                                                                <!-- Logo -->
                                                                <div class="app-brand justify-content-center mb-5">
                                                                    <a href="#" class="app-brand-link gap-2">
                                                                        <span class="app-brand-text demo text-body fw-bolder text-capitalize"><?php echo @$system_info->site_name; ?> Login</span>
                                                                    </a>
                                                                </div>
                                                                <!-- /Logo -->

                                                                <form id="formAuthentication" class="mb-3" method="POST"
                                                                    action="core/takelogin.core.php">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label">Email
                                                                            or Username</label>
                                                                        <input type="text" class="form-control"
                                                                            id="email" name="email-username"
                                                                            placeholder="Enter your email or username"
                                                                            autofocus />
                                                                    </div>
                                                                    <div class="form-password-toggle mb-3">
                                                                        <div class="d-flex justify-content-between">
                                                                            <label class="form-label"
                                                                                for="password">Password</label>

                                                                        </div>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="password"
                                                                                class="form-control" name="password"
                                                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                                aria-describedby="password" />
                                                                            <span
                                                                                class="input-group-text cursor-pointer"><i
                                                                                    class="bx bx-hide"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <button class="btn btn-primary d-grid w-100"
                                                                            type="submit">Sign in</button>
                                                                    </div>
                                                                </form>


                                                            </div>
                                                        </div>
                                                        <!-- /Register -->
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FormValidation -->
                        </div>

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
<?php
            if (@htmlspecialchars($_GET['c']) == 'nouser') {
              echo $chk_user;
            }
            ?>

</html>
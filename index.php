<?php
require("core/config.core.php");
require("core/connect.core.php");
require("core/functions.core.php");
require("core/alert.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
$system_info = $getdata->my_sql_query($connect, null, 'system_info', null);
$system_detail = $getdata->my_sql_query($connect, null, 'detail_index', null);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="light-style" data-theme="theme-default" data-assets-path="assets/" data-template="horizontal-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="<?php echo @$system_info->site_name; ?>">

    <link rel="icon" type="image/x-icon" href="resource/system/favicon/<?php echo @$system_info->site_favicon; ?>" />
    <title><?php echo @$system_info->site_name; ?></title>
    <?php include 'core/header.php' ?>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <?php include 'layout/nav.php'; ?>
            </nav>
            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0 bg-menu-theme">
                        <?php include 'layout/menu.php' ?>
                    </aside>
                    <!-- / Menu -->

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-12">
                                    <h4 class="fw-semibold"> รายการแสดงข้อมูลห้องและการเข้าพัก</h3>
                                        <hr class="mt-0" />
                                </div>
                            </div>
                            <div class="card-body">
                                <?php require_once 'layout/listroom/showall.php'; ?>
                            </div>
                        </div>

                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-column flex-md-row flex-wrap justify-content-between py-2">
                            <div class="mb-2 mb-md-0">
                                <?php echo @$system_info->site_name; ?> สำนักจัดการอุทยานรังสรรค์นวัตกรรมอวกาศ : สจอ. © <script>
                                    document.write(new Date().getFullYear());
                                </script> Information System Design & Develop By <a href="https://line.me/ti/p/-cfquTAxAJ" target="_blank" class="footer-link fw-bolder">Ekapong</a>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel4">นโยบายความเป็นส่วนตัว (Privacy Policy)</h2>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <?php echo $system_detail->detail; ?>
                    <div class="text-center">
                        <input class="form-check-input mt-1" type="checkbox" id="acceptCheckbox" value="">
                        <label class="form-check-label" for="acceptCheckbox">
                            <strong>ยอมรับเงื่อนไข</strong>
                        </label>
                        <br>
                        <br>
                        <button class="btn btn-label-success" id="acceptButton" type="button" disabled data-bs-dismiss="modal">
                            <i class='bx bxs-user-check'></i> <strong>ยอมรับเงื่อนไข</strong>
                        </button>


                    </div>

                </div>

            </div>
        </div>
    </div>




</body>
<?php include 'core/footer.php' ?>
<?php echo @$alert; ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // ตรวจสอบว่ามีคุกกี้ยินยอมหรือไม่
        if (!getCookie("cookieConsent")) {
            Swal.fire({
                title: 'นโยบายคุกกี้ (Cookies Policy)',
                icon: 'info',
                showCancelButton: false,
                confirmButtonText: "<i class='bx bxs-book-bookmark'></i> อ่านรายละเอียด",
                // cancelButtonText: 'ปฏิเสธ'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user accepts, show the Bootstrap Modal
                    $('#myModal').modal('show');


                    $('#acceptCheckbox').on('change', function() {
                        if ($(this).is(':checked')) {
                            $('#acceptButton').prop('disabled', false);
                        } else {
                            $('#acceptButton').prop('disabled', true);
                        }
                    });



                } else if (result.isDismissed) {
                    // If user dismisses, reload the page
                    location.reload();
                }
            });
        }
    });

    function setCookie(name, value, days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        let expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    function getCookie(name) {
        let cookieArray = document.cookie.split(';');
        for (let i = 0; i < cookieArray.length; i++) {
            let cookie = cookieArray[i];
            while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(name + "=") == 0) {
                return cookie.substring(name.length + 1, cookie.length);
            }
        }
        return "";
    }
</script>

</html>
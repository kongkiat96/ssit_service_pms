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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel4"><strong>การอนุญาตคุกกี้ในการใช้งาน</strong></h4>
                </div>
                <div class="modal-body text-center">
                    <span>
                        เว็บไซต์นี้ใช้งานคุกกี้ในการใช้งานสามารถใช้งานเว็บไซต์อย่างต่อเนื่องและมีประสิทธิภาพ เว็บไซต์นี้จะมีการเก็บค่าคุกกี้เพื่อให้การใช้เว็บไซต์ของท่านเป็นไปอย่างราบรื่นและเป็นส่วนตัวมากขึ้น
                        จึงขอให้ท่านรับรองว่าท่านได้อ่านและทำความเข้าใจนโยบายการใช้งานคุกกี้ <br>
                    </span>
                    <div class="mt-3"></div>
                    <a href="https://www.gistda.or.th/download/article/article_20220613093807.pdf" target="_blank" rel="noopener noreferrer" style="color:#ff8d26"> นโยบายการคุ้มครองข้อมูลส่วนบุคคล GISTDA </a>
                    <!-- <?php echo $system_detail->detail; ?> -->
                    
                    <div class="text-center mt-3">
                        <input class="form-check-input mt-1" type="checkbox" id="acceptCheckbox" value="">
                        <label class="form-check-label" for="acceptCheckbox">
                            <strong>ยอมรับเงื่อนไข</strong>
                        </label>
                        <br>
                        <button class="btn btn-label-success mt-4" id="acceptButton" type="button" disabled data-bs-dismiss="modal">
                            <i class='bx bxs-user-check'></i> <strong>ยอมรับ</strong>
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
            $('#myModal').modal('show');
        }

        $('#acceptCheckbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('#acceptButton').prop('disabled', false);
            } else {
                $('#acceptButton').prop('disabled', true);
            }
        });
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



    (() => {
        const getCookie = (name) => {
            const value = " " + document.cookie;
            console.log("value", `==${value}==`);
            const parts = value.split(" " + name + "=");
            return parts.length < 2 ? undefined : parts.pop().split(";").shift();
        };

        const setCookie = function(name, value, expiryDays, domain, path, secure) {
            const exdate = new Date();
            exdate.setHours(
                exdate.getHours() +
                (typeof expiryDays !== "number" ? 365 : expiryDays) * 24
            );
            document.cookie =
                name +
                "=" +
                value +
                ";expires=" +
                exdate.toUTCString() +
                ";path=" +
                (path || "/") +
                (domain ? ";domain=" + domain : "") +
                (secure ? ";secure" : "");
        };

        const $cookiesBanner = document.querySelector(".cookies-eu-banner");
        const $cookiesBannerButton = $cookiesBanner.querySelector("button");
        const cookieName = "cookiesBanner";
        const hasCookie = getCookie(cookieName);

        if (!hasCookie) {
            $cookiesBanner.classList.remove("hidden");
        }

        $cookiesBannerButton.addEventListener("click", () => {
            setCookie(cookieName, "closed");
            $cookiesBanner.remove();
        });
    })();
</script>

</html>
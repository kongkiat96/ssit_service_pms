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

<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="horizontal-menu-template-no-customizer">

<head>

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="<?php echo @$system_info->site_name; ?>">

    <link rel="icon" type="image/x-icon" href="resource/system/favicon/<?php echo @$system_info->site_favicon; ?>" />
    <title><?php echo @$system_info->site_name; ?></title>
    <link rel="stylesheet" href="assets/vendor/css/pages/app-calendar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/fullcalendar/fullcalendar.css" />
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
                        <div class="card app-calendar-wrapper">
                            <div class="row g-0">
                                <!-- Calendar Sidebar -->
                                <div class="app-calendar-sidebar col" id="app-calendar-sidebar">
                                    <div class="border-bottom p-4 my-sm-0 mb-3  d-none">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-toggle-sidebar"
                                                data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar"
                                                aria-controls="addEventSidebar">
                                                <i class="bx bx-plus"></i>
                                                <span class="align-middle">ตรวจสอบรายการแจ้งซ่อม</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <!-- inline calendar (flatpicker) -->
                                        <div class="ms-n2">
                                            <div class="inline-calendar"></div>
                                        </div>

                                        <hr class="container-m-nx my-4" />

                                        <!-- Filter -->
                                        <div class="mb-4">
                                            <small
                                                class="text-small text-muted text-uppercase align-middle">เลือกรายการเพื่อตรวจสอบ</small>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input class="form-check-input select-all" type="checkbox" id="selectAll"
                                                data-value="all" checked />
                                            <label class="form-check-label" for="selectAll">ดูทั้งหมด</label>
                                        </div>

                                        <div class="app-calendar-events-filter">
                                            <div class="form-check form-check-info mb-2">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-it" data-value="it" checked />
                                                <label class="form-check-label" for="select-it">กลุ่มงานสารสนเทศ
                                                    (IT)</label>
                                            </div>
                                            <div class="form-check form-check-warning mb-2">
                                                <input class="form-check-input input-filter" type="checkbox"
                                                    id="select-bu" data-value="bu" checked />
                                                <label class="form-check-label" for="select-bu">กลุ่มงานอาคาร</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /Calendar Sidebar -->

                                <!-- Calendar & Modal -->
                                <div class="app-calendar-content col">
                                    <div class="card shadow-none border-0">
                                        <div class="card-body pb-0">
                                            <!-- FullCalendar -->
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                    <div class="app-overlay"></div>
                                    <!-- FullCalendar Offcanvas -->
                                    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                                        <div class="offcanvas-header border-bottom">
                                            <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">ตรวจสอบรายการแจ้งซ่อม</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                                                <div class="mb-3">
                                                    <h6>ชื่อและนามสกุลผู้แจ้ง</h6>
                                                    <input type="text" class="form-control" id="eventTitle"
                                                        name="eventTitle" disabled />
                                                </div>
                                                <div class="mb-3">
                                                    <h6>เลขที่อ้างอิง</h6>
                                                    <input type="text" class="form-control" id="eventticket"
                                                        name="eventticket" disabled />
                                                </div>
                                                <div class="mb-3">
                                                    <h6>สถานะ</h6>
                                                    <input type="text" class="form-control" id="eventstatus"
                                                        name="eventstatus" disabled/>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>ประเภทของงาน</h6>
                                                    <select class="select2 select-event-label form-select"
                                                        id="eventLabel" name="eventLabel" disabled>
                                                        <option data-label="info" value="It">กลุ่มงานสารสนเทศ (ICT)</option>
                                                        <option data-label="warning" value="Bu" selected>กลุ่มงานอาคาร</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 d-none">
                                                    <label class="form-label" for="eventStartDate">Start Date</label>
                                                    <input type="text" class="form-control" id="eventStartDate"
                                                        name="eventStartDate" placeholder="Start Date" />
                                                </div>
                                                <div class="mb-3 d-none">
                                                    <label class="form-label" for="eventEndDate">End Date</label>
                                                    <input type="text" class="form-control" id="eventEndDate"
                                                        name="eventEndDate" placeholder="End Date" />
                                                </div>
                                                <div class="mb-3 d-none">
                                                    <label class="switch">
                                                        <input type="checkbox" class="switch-input allDay-switch" />
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-on"></span>
                                                            <span class="switch-off"></span>
                                                        </span>
                                                        <span class="switch-label">All Day</span>
                                                    </label>
                                                </div>
                                                
                                                
                                                <div class="mb-3">
                                                    <h6>สถานที่ตั้ง</h6>
                                                    <input type="text" class="form-control" id="eventLocation"
                                                        name="eventLocation" disabled/>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>รายละเอียด</h6>
                                                    <textarea class="form-control" rows="5" name="eventDescription"
                                                        id="eventDescription" disabled></textarea>
                                                </div>
                                                <button type="reset"
                                                    class="btn btn-label-danger btn-cancel me-1 me-sm-0"
                                                    data-bs-dismiss="offcanvas">
                                                    ปิด
                                                </button>
                                                <div
                                                    class="d-flex justify-content-start justify-content-sm-between my-4 mb-3 d-none">
                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-add-event me-1 me-sm-3 ">Add</button>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-update-event d-none me-1 me-sm-3">
                                                            Update
                                                        </button>

                                                    </div>
                                                    <div><button
                                                            class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Calendar & Modal -->
                            </div>
                        </div>
                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-column flex-md-row flex-wrap justify-content-between py-2">
                            <div class="mb-2 mb-md-0">
                                <?php echo @$system_info->site_name; ?> สำนักจัดการอุทยานรังสรรค์นวัตกรรมอวกาศ : สจอ. ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Information System Design & Develop By <a
                                    href="https://line.me/ti/p/-cfquTAxAJ" target="_blank"
                                    class="footer-link fw-bolder">Ekapong</a>
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
<!-- Page JS -->
<script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="assets/vendor/libs/fullcalendar/fullcalendar.js"></script>
<!-- <script src="assets/js/app-calendar-events.js"></script> -->
<script src="assets/js/app-calendar.js"></script>

<script>
    /**
     * App Calendar Events
     */

    let date = new Date();
    let nextDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    // prettier-ignore
    let nextMonth = date.getMonth() === 11 ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(), date
        .getMonth() + 1, 1);
    // prettier-ignore
    let prevMonth = date.getMonth() === 11 ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(), date
        .getMonth() - 1, 1);

        // let It = 'It';
        // let Bu = 'Bu';


        
<?php $getProblem = $getdata->my_sql_select($connect, NULL, "problem_list", "ID ORDER BY ID DESC"); ?>

    let events = [
        <?php while ($showProblem = mysqli_fetch_object($getProblem)) { ?>
            {
            id: <?php echo $showProblem->ID;?>,
            url: '',
            title: '<?php echo @getemployeeName($showProblem->user_key); ?>',
            start: '<?php echo $showProblem->date;?>',
            allDay: true,
            extendedProps: {
                status: '<?php echo @useStatusCalendar($showProblem->status); ?>',
                ticket: '<?php echo $showProblem->ticket; ?>',
                location: '<?php echo @getLocation($showProblem->se_location);?>',
                description: '<?php echo $showProblem->se_other; ?>',
                calendar: '<?php echo @forCalendar($showProblem->se_req);?>'
            }
            },
        <?php } ?>

    ];
</script>

</html>
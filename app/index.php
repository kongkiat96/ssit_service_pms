<?php
session_start();
error_reporting(0);
?>
<?php 
if ($_SESSION['uname'] == null || $_SESSION['uclass'] >= 4) {
    echo '<script>window.location="../"</script>';
  }
require("../core/config.core.php");
require("../core/alert.php");
require("../core/connect.core.php");
require("../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, "utf8");
$userdata = $getdata->my_sql_query($connect, null, 'user', "user_key ='" . $_SESSION['ukey'] . "'");
$getdatailuser = $getdata->my_sql_query($connect, NULL, "employee", "em_key = '".$_SESSION['ukey']."'");
$system_info = $getdata->my_sql_query($connect, null, 'system_info', null);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="light-style" data-theme="theme-default" data-assets-path="../assets/"
    data-template="horizontal-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <meta name="description" content="<?php echo @$system_info->site_name; ?>">

        <link rel="icon" type="image/x-icon" href="../resource/system/favicon/<?php echo @$system_info->site_favicon; ?>" />
        <title><?php echo @$system_info->site_name; ?></title>
    <?php require '../getStyle/header.php'?>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <?php include '../layout/nav.php';?>
            </nav>
            <!-- / Navbar -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Menu -->
                    <aside id="layout-menu"
                        class="layout-menu-horizontal menu-horizontal menu flex-grow-0 bg-menu-theme">
                        <div class="container-xxl d-flex h-100">
                            <ul class="menu-inner">
                                <?php
                            $getmenus = $getdata->my_sql_select($connect, null, 'menus', "menu_status ='1' AND menu_key != 'c6c8729b45d1fec563f8453c16ff03b8' ORDER BY menu_sorting");
                            while ($showmenus = mysqli_fetch_object($getmenus)) {

                                if ($_GET['p'] == $showmenus->menu_case) {
                                    $show = '
                                <li class="menu-item active"> <a class="menu-link" href="' . $showmenus->menu_link . '">

                                <i class="fas ' . $showmenus->menu_icon . ' fa-1x"></i><span>&nbsp&nbsp' . $showmenus->menu_name . '</span></a>
                                </li>';
                                    echo @accessMenus($showmenus->menu_key, $_SESSION['ukey'], $show);
                                } else {
                                    $show = '
                                    <li class="menu-item"> <a class="menu-link" href="' . $showmenus->menu_link . '">
                                    
                                    <i class="fas ' . $showmenus->menu_icon . ' fa-1x"></i><span>&nbsp&nbsp' . $showmenus->menu_name . '</span></a>
                                    </li>';
                                    echo @accessMenus($showmenus->menu_key, $_SESSION['ukey'], $show);
                                }
                            }
                        ?>
                            </ul>
                        </div>
                    </aside>
                    <!-- / Menu -->

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php require '../layout/user/status.php'; ?>

                        <?php
                     
                            $page = htmlspecialchars(@$_GET['p']);
                            $listdata = $getdata->my_sql_query($connect, null, 'list', "cases='" . $page . "' AND case_status='1'");
                            if ($listdata != null) {
                                require $listdata->pages;
                            } else {
                                if ($_SESSION['uclass'] == 2 || $_SESSION['uclass'] == 3) {
                                // echo '<div id="toaster"></div>';
                                require 'home.php';
                                }
                            }
                            ?>


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
<?php require '../getStyle/footer.php' ?>
<?php echo @$alert; ?>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('detail');

function CKupdate() {
    for (instance in CKEDITOR.instances)
        CKEDITOR.instances[instance].updateElement();
}
</script>

<script>
<?php
    $month = @getallmonth();
    $workITMonth = @workITMonth();
    $workITSuccessMonth = @workITSuccessMonth();
    $workITWaitMonth = @workITWaitMonth();
    $workITOtherMonth = @workITOtherMonth();


    $workBuildingMonth = @workBuildingMonth();
    $workBuildingSuccessMonth = @workBuildingSuccessMonth();
    $workBuildingWaitMonth = @workBuildingWaitMonth();
    $workBuildingOtherMonth = @workBuildingOtherMonth();

    $getallCount = @getallcount();
    ?>

var options = {
    series: [{
        name: 'จำนวนงานทั้งหมด',
        data: <?php echo $workITMonth; ?>
    }, {
        name: 'งานที่เสร็จสิ้น',
        data: <?php echo $workITSuccessMonth; ?>
    }, {
        name: 'งานที่รอแก้ไข',
        data: <?php echo $workITWaitMonth; ?>
    }, {
        name: 'อื่น ๆ',
        data: <?php echo $workITOtherMonth; ?>
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: <?php echo $month; ?>,
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " งาน"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

var options = {
    series: [{
        name: 'จำนวนงานทั้งหมด',
        data: <?php echo $workBuildingMonth; ?>
    }, {
        name: 'งานที่เสร็จสิ้น',
        data: <?php echo $workBuildingSuccessMonth; ?>
    }, {
        name: 'งานที่รอแก้ไข',
        data: <?php echo $workBuildingWaitMonth; ?>
    }, {
        name: 'อื่น ๆ',
        data: <?php echo $workBuildingOtherMonth; ?>
    }],
    chart: {
        type: 'bar',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: <?php echo $month; ?>,
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return val + " งาน"
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#chart2"), options);
chart.render();

var options = {
          series: <?php echo $getallCount; ?>,
          chart: {
          type: 'pie',
        },
        labels: ['กลุ่มงานสารสนเทศ (IT)','กลุ่มงานอาคาร'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'center'
            }
          }
        }],
        tooltip: {
        y: {
            formatter: function(val) {
                return val + " งาน"
            }
        }
    }
        };

        var chart = new ApexCharts(document.querySelector("#pie"), options);
        chart.render();


</script>
<script>
    $(document).ready(function () {
        $("#select2").select2({
            dropdownParent: $("#export")
        });
        $("#select2-2").select2({
            dropdownParent: $("#export")
        });
        $("#select2-3").select2({
            dropdownParent: $("#export")
        });
        $("#select2-4").select2({
            dropdownParent: $("#export")
        });
    });
</script>
</html>
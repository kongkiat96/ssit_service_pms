<?php
require_once 'procress/dataSetting.php';
$getsystem_info = $getdata->my_sql_query($connect, NULL, "system_info", NULL);
$getalert = $getdata->my_sql_query($connect, NULL, "system_alert", NULL);
$getdetail = $getdata->my_sql_query($connect, NULL, "detail_index", NULL);
?>
<?php echo @$alert; ?>
<div class="row">
    <div class="col-12">
        <h3 class="page-header"><i class="fa fa-sliders-h fa-fw"></i> ตั้งค่า</h3>
        <hr class="mt-2">
    </div>
</div>
<nav aria-label="breadcrumb" class="mt-3 mb-3">
    <ol class="breadcrumb breadcrumb-inverse">
        <li class="breadcrumb-item">
            <a href="index.php">หน้าแรก</a>
        </li>
        <li class="breadcrumb-item">
            <a href="?p=setting">ตั้งค่า</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">ตั้งค่าระบบ</li>
    </ol>
</nav>
<div class="card mt-3">
    <div class="card-body">
        <div class="col-12">
            <h5 class="fw-semibold">เกี่ยวกับระบบ</h4>

            <hr class="mt-0" />
        </div>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills nav-fill mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link " role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                        aria-selected="true">
                        <i class="tf-icons bx bx-home"></i> เกี่ยวกับระบบ
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                        aria-selected="false">
                        <i class='bx bxs-bell-ring' ></i> การแจ้งเตือน
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-index" aria-controls="navs-pills-justified-index"
                        aria-selected="false">
                        <i class='bx bx-list-ol' ></i> ข้อความหน้าแรก
                    </button>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade" id="navs-pills-justified-home" role="tabpanel">
                    <p>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label-md fw-semibold mb-2 mt-3"
                                            for="site_logo">โลโกบริษัท</label>
                                        <img src="../resource/system/logo/<?php echo @$getsystem_info->site_logo; ?>"
                                            width="256" alt="" />
                                        <div class="form-group">
                                            <input type="file" name="site_logo" id="site_logo"
                                                class="form-control input-sm mt-2" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label-md fw-semibold mb-2 mt-3"
                                            for="site_favicon">ไอคอนบริษัท</label>
                                        <img src="../resource/system/favicon/<?php echo @$getsystem_info->site_favicon; ?>"
                                            width="256" alt="" />
                                        <div class="form-group">
                                            <input type="file" name="site_favicon" id="site_favicon"
                                                class="form-control input-sm mt-2" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label class="form-label-md fw-semibold mb-2 mt-3"
                                            for="site_name">ชื่อบริษัท</label>
                                        <input type="text" class="form-control" name="site_name" id="site_name"
                                            value="<?php echo @$getsystem_info->site_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label-md fw-semibold mb-2 mt-3"
                                            for="site_color_name">สีของชื่อบริษัท</label>
                                        <input type="color" class="form-control" name="site_color_name"
                                            id="site_color_name"
                                            value="<?php echo @$getsystem_info->site_color_name; ?>">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label class="form-label-md fw-semibold mb-2 mt-3"
                                            for="site_color_form">สีของหน้าฟอร์ม</label>
                                        <input type="color" class="form-control" name="site_color_form"
                                            id="site_color_form"
                                            value="<?php echo @$getsystem_info->site_color_form; ?>">
                                    </div>

                                </div>
                            </div>

                            <div class="text-center mt-3">

                                <button type="submit" name="save_info" class="btn btn-primary"><i
                                        class="bx bx-save"></i>
                                    บันทึกข้อมูล</button>
                            </div>

                        </form>
                    </p>

                </div>
                <div class="tab-pane fade " id="navs-pills-justified-profile" role="tabpanel">
                    <p>
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-12">
                                    <!-- <label for="line_notify">Line Notify <a href="settings/Set_line_notify.pdf" target="_blank" rel="noopener noreferrer">คู่มือการตั้งค่า</a></label> -->
                                    <label class="form-label-md fw-semibold mb-2 mt-3" for="host">Line Token</label>
                                    <input type="text" class="form-control" name="line_notify" id="line_notify"
                                        placeholder="Ex. : ILgVattVGcQm5preH3uqlApJ4jqDCacByMGJ27YEvAx"
                                        value="<?php echo $getalert->alert_line_token; ?>" autocomplete="off">
                                </div>
                            </div>
                            <hr>

                            <div class="text-center mt-3">


                                <button type="submit" name="save_alert" class="btn btn-primary"><i
                                        class="bx bx-save"></i>
                                    บันทึกข้อมูล</button>
                            </div>

                        </form>
                    </p>
                </div>
                <div class="tab-pane fade show active" id="navs-pills-justified-index" role="tabpanel">
                    <p>
                        <form action="" method="post" enctype="multipart/form-data">
                            <textarea name="detail" id="detail"><?php echo $getdetail->detail; ?></textarea>
                            <div class="text-center mt-3">
                                <input type="hidden" name="key" id="key" value="<?php echo $getdetail->id; ?>">
                                <button type="submit" name="save_detail" class="btn btn-primary"><i
                                        class="bx bx-save"></i>
                                    บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </p>
                </div>

            </div>
        </div>

    </div>
    <div class="card-footer text-center">
        <a class="btn btn-info" href="index.php?p=setting"><i class="fa fa-reply"></i> กลับ</a>
    </div>
</div>
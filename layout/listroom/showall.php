<div class="modal fade" id="showguest" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="showguest">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                    ปิด
                </button>
            </div>
        </div>
    </div>
</div>


<div class="col-lg">
    <div id="accordionPopoutIcon" class="accordion mt-3 accordion-popout">
        <div class="accordion-item card active">
            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionPopoutIconOne">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionPopoutIcon-1" aria-controls="accordionPopoutIcon-1" aria-expanded="true">
                    <i class="bx bx-trending-up me-2 bx-md"></i>
                    <strong>แสดงข้อมูลสถานะแต่ละอาคาร</strong>
                </button>
            </h2>
            <div id="accordionPopoutIcon-1" class="accordion-collapse collapse show" data-bs-parent="#accordionPopoutIcon" style="">
                <div class="accordion-body">
                    <div class="col-12">
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="false">
                                        <i class="fas fa-building"></i> อาคาร Vertex View
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="true">
                                        <i class="fas fa-building"></i> อาคาร Horizon
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false">
                                        <i class="fas fa-building"></i> อาคาร Vertical View
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                                    <div class="row">
                                        <?php
                                        $i = 0;
                                        $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '1' AND se_status = '1'");
                                        while ($showfloor = mysqli_fetch_object($getbuilding)) {
                                            $i++
                                        ?>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        <i class="fa fa-chart-bar"></i> <strong><?php echo $showfloor->se_name; ?></strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <?php

                                                            $getroom = $getdata->my_sql_select($connect, NULL, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '1' AND se_li_status != '0'");
                                                            while ($showroom = mysqli_fetch_object($getroom)) {
                                                                //$guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "key_guest='" . htmlspecialchars($_GET['key']) . "'");
                                                            ?>
                                                                <?php if ($showroom->se_li_status == '1') { ?>


                                                                    <div class="col-md-2 col-sm-4 mt-2">

                                                                        <button type="button" class="mb-1 btn btn-outline-success" data-bs-toggle="modal" data-whatever="<?php echo @$showroom->se_li_id; ?>">
                                                                            <i class="fas fa-user-plus fa-lg"></i> <?php echo $showroom->se_li_name; ?>
                                                                        </button>
                                                                    </div>
                                                                <?php } elseif ($showroom->se_li_status == '2') {  ?>
                                                                    <div class="col-md-2 col-sm-4 mt-2">
                                                                        <button type="button" class="mb-1 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#showguest" data-whatever="<?php echo @$showroom->se_li_id; ?>">
                                                                            <i class="fas fa-user-slash fa-lg"></i> <?php echo $showroom->se_li_name; ?>
                                                                        </button>
                                                                        <!-- <a class="mb-1 btn btn-outline-danger" data-toggle="modal" data-target="#genlink" data-whatever="<?php echo @$showroom->se_li_id; ?>"><i class="fas fa-user-slash fa-lg"></i> <?php echo $showroom->se_li_name; ?></a> -->
                                                                    </div>
                                                                <?php } ?>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center" style="background-color:#f0f8ff00">

                                                    </div>
                                                </div>

                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                                    <div class="row">
                                        <?php
                                        $i = 0;
                                        $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '2' AND se_status = '1'");
                                        while ($showfloor = mysqli_fetch_object($getbuilding)) {
                                            $i++
                                        ?>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        <i class="fa fa-chart-bar"></i> <strong><?php echo $showfloor->se_name; ?></strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <?php

                                                            $getroom = $getdata->my_sql_select($connect, NULL, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '2' AND se_li_status != '0'");
                                                            while ($showroom = mysqli_fetch_object($getroom)) {
                                                                //$guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "key_guest='" . htmlspecialchars($_GET['key']) . "'");
                                                            ?>
                                                                <?php if ($showroom->se_li_status == '1') { ?>


                                                                    <div class="col-md-2 col-sm-4 mt-2">

                                                                        <button type="button" class="mb-1 btn btn-outline-success" data-bs-toggle="modal" data-whatever="<?php echo @$showroom->se_li_id; ?>">
                                                                            <i class="fas fa-user-plus fa-lg"></i> <?php echo $showroom->se_li_name; ?>
                                                                        </button>
                                                                    </div>
                                                                <?php } elseif ($showroom->se_li_status == '2') {  ?>
                                                                    <div class="col-md-2 col-sm-4 mt-2">
                                                                        <button type="button" class="mb-1 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#showguest" data-whatever="<?php echo @$showroom->se_li_id; ?>">
                                                                            <i class="fas fa-user-slash fa-lg"></i> <?php echo $showroom->se_li_name; ?>
                                                                        </button>
                                                                        <!-- <a class="mb-1 btn btn-outline-danger" data-toggle="modal" data-target="#genlink" data-whatever="<?php echo @$showroom->se_li_id; ?>"><i class="fas fa-user-slash fa-lg"></i> <?php echo $showroom->se_li_name; ?></a> -->
                                                                    </div>
                                                                <?php } ?>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center" style="background-color:#f0f8ff00">

                                                    </div>
                                                </div>

                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
                                    <div class="row">
                                        <?php
                                        $i = 0;
                                        $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '3' AND se_status = '1'");
                                        while ($showfloor = mysqli_fetch_object($getbuilding)) {
                                            $i++
                                        ?>
                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <div class="card">
                                                    <div class="card-header text-center">
                                                        <i class="fa fa-chart-bar"></i> <strong><?php echo $showfloor->se_name; ?></strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <?php

                                                            $getroom = $getdata->my_sql_select($connect, NULL, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '3' AND se_li_status != '0'");
                                                            while ($showroom = mysqli_fetch_object($getroom)) {
                                                                //$guest_detail = $getdata->my_sql_query($connect, NULL, "bm_guest", "key_guest='" . htmlspecialchars($_GET['key']) . "'");
                                                            ?>
                                                                <?php if ($showroom->se_li_status == '1') { ?>


                                                                    <div class="col-md-2 col-sm-4 mt-2">

                                                                        <button type="button" class="mb-1 btn btn-outline-success" data-bs-toggle="modal" data-whatever="<?php echo @$showroom->se_li_id; ?>">
                                                                            <i class="fas fa-user-plus fa-lg"></i> <?php echo $showroom->se_li_name; ?>
                                                                        </button>
                                                                    </div>
                                                                <?php } elseif ($showroom->se_li_status == '2') {  ?>
                                                                    <div class="col-md-2 col-sm-4 mt-2">
                                                                        <button type="button" class="mb-1 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#showguest" data-whatever="<?php echo @$showroom->se_li_id; ?>">
                                                                            <i class="fas fa-user-slash fa-lg"></i> <?php echo $showroom->se_li_name; ?>
                                                                        </button>
                                                                        <!-- <a class="mb-1 btn btn-outline-danger" data-toggle="modal" data-target="#genlink" data-whatever="<?php echo @$showroom->se_li_id; ?>"><i class="fas fa-user-slash fa-lg"></i> <?php echo $showroom->se_li_name; ?></a> -->
                                                                    </div>
                                                                <?php } ?>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center" style="background-color:#f0f8ff00">

                                                    </div>
                                                </div>

                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item card">
            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionPopoutIconTwo">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionPopoutIcon-2" aria-controls="accordionPopoutIcon-2" aria-expanded="false">
                    <i class="bx bx-trending-up me-2 bx-md"></i>
                    <strong>ข้อมูลรายชื่อผู้เข้าพักและสถานะ</strong>
                </button>
            </h2>
            <div id="accordionPopoutIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionPopoutIcon" style="">
                <div class="form-block p-2">
                    <div class="table-responsive text-nowrap">
                        <table id="responsive-data-table-1" class="table dt-responsive table-hover" style="font-family: sarabun; font-size: 16px;" width="100%">
                            <thead class="text-center">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ - นาสกุลผู้เข้าพัก</th>
                                    <th>ตำแหน่ง</th>
                                    <th>วันที่เข้าพัก</th>
                                    <th>วันที่ออกจากห้องพัก</th>
                                    <th>จำนวนบริวาร</th>
                                    <th>สถานะข้อมูล</th>
                                    <th>เข้าพักที่</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $u = 0;
                                $getguest  = $getdata->my_sql_select($connect, NULL, "bm_guest", "key_guest <> 'hidden' AND sys_procress != '99' ORDER BY check_in ASC");
                                while ($guest_detail = mysqli_fetch_object($getguest)) {
                                    $u++;
                                ?>
                                    <tr>
                                        <td><?php echo $u; ?></td>
                                        <td><?php echo @prefixConvertor($guest_detail->prefix_name) . $guest_detail->fname . ' ' . $guest_detail->lname; ?></td>
                                        <td><?php echo @$guest_detail->position; ?></td>
                                        <td><?php if ($guest_detail->check_in == NULL) {
                                                echo '<span class="badge bg-label-danger">ยังไม่มีการระบุ</span>';
                                            } else {
                                                echo @dateTimeConvertor($guest_detail->check_in);
                                            } ?></td>
                                        <td><?php if ($guest_detail->check_out == NULL) {
                                                echo '<span class="badge bg-label-danger">ยังไม่มีการระบุ</span>';
                                            } else {
                                                echo @dateTimeConvertor($guest_detail->check_out);
                                            } ?></td>
                                        <td>
                                            <?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $guest_detail->code . "'");
                                            echo $count_guest_detail; ?> ท่าน</td>
                                        <td class="text-center"><?php if ($guest_detail->status == '1') {
                                                                    echo '<span class="badge bg-label-warning">รอการยืนยันเข้าพัก</span>';
                                                                } elseif ($guest_detail->status == '2') {
                                                                    echo '<span class="badge bg-label-success">เข้าพัก</span>';
                                                                } elseif ($guest_detail->status == '9') {
                                                                    echo '<span class="badge bg-label-danger">ยกเลิกข้อมูล</span>';
                                                                } else {
                                                                    echo '<span class="badge bg-label-danger">ออกจากห้องพัก</span>';
                                                                } ?></td>
                                        <td><?php
                                            if ($guest_detail->sys_procress == '1') {
                                                echo @building($guest_detail->building) . ' ' . @prefixConvertorService($guest_detail->floor) . ' <br>ห้อง ' . @prefixConvertorServiceList($guest_detail->room);
                                            } elseif ($guest_detail->sys_procress == '2') {
                                                echo '<span class="badge bg-label-danger">ยกเลิกข้อมูล</span>';
                                            } elseif ($guest_detail->sys_procress == '0') {
                                                echo '<span class="badge bg-label-primary">ข้อมูลไม่สมบูรณ์</span>';
                                            }
                                            ?>
                                        </td>

                                    </tr>

                                <?php } ?>


                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
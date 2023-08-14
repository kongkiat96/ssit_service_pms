<div class="row">
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header bg-warning mb-3 text-white d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2 text-white"><strong>อาคาร Vertex View</strong></h5>
            </div>
            <div class="card-body">
                <?php
                $i = 0;
                $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '1' AND se_status = '1'");
                while ($showfloor = mysqli_fetch_object($getbuilding)) {
                    $i++;

                    $getcheckin = $getdata->my_sql_show_rows($connect, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '1' AND se_li_status != '0' AND se_li_status = '1'");
                    $getcheckout = $getdata->my_sql_show_rows($connect, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '1' AND se_li_status != '0' AND se_li_status = '2'");

                ?>
                    <div class="row mb-3">
                        <div class="col-4 text-end">
                            <strong><?php echo $showfloor->se_name; ?> <span class="badge badge-center rounded-pill bg-label-primary"><?php echo $count = $getcheckin + $getcheckout; ?></span> <i class="fas fa-arrow-right"></i></strong>
                        </div>
                        <div class="col-2 text-end">
                            ว่าง :
                        </div>
                        <div class="col-1">
                            <span class="badge badge-center rounded-pill bg-label-success"><?php echo $getcheckin; ?></span>
                        </div>
                        <div class="col-3 text-end">
                            ไม่ว่าง :
                        </div>
                        <div class="col-1">
                            <span class="badge badge-center rounded-pill bg-label-danger"><?php echo $getcheckout; ?></span>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header bg-warning mb-3 text-white d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2 text-white"><strong>อาคาร Horizon</strong></h5>

            </div>
            <div class="card-body">
                <?php
                $i = 0;
                $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '2' AND se_status = '1'");
                while ($showfloor = mysqli_fetch_object($getbuilding)) {
                    $i++;

                    $getcheckin = $getdata->my_sql_show_rows($connect, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '2' AND se_li_status != '0' AND se_li_status = '1'");
                    $getcheckout = $getdata->my_sql_show_rows($connect, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '2' AND se_li_status != '0' AND se_li_status = '2'");

                ?>
                    <div class="row mb-3">
                        <div class="col-4 text-end">
                            <strong><?php echo $showfloor->se_name; ?> <span class="badge badge-center rounded-pill bg-label-primary"><?php echo $count = $getcheckin + $getcheckout; ?></span> <i class="fas fa-arrow-right"></i></strong>
                        </div>
                        <div class="col-2 text-end">
                            ว่าง :
                        </div>
                        <div class="col-1">
                            <span class="badge badge-center rounded-pill bg-label-success"><?php echo $getcheckin; ?></span>
                        </div>
                        <div class="col-3 text-end">
                            ไม่ว่าง :
                        </div>
                        <div class="col-1">
                            <span class="badge badge-center rounded-pill bg-label-danger"><?php echo $getcheckout; ?></span>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header bg-warning mb-3 d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2 text-white"><strong>อาคาร Vertical View</strong></h5>

            </div>
            <div class="card-body">
                <?php
                $i = 0;
                $getbuilding = $getdata->my_sql_select($connect, NULL, "service", "se_id AND se_group = '3' AND se_status = '1'");
                while ($showfloor = mysqli_fetch_object($getbuilding)) {
                    $i++;

                    $getcheckin = $getdata->my_sql_show_rows($connect, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '3' AND se_li_status != '0' AND se_li_status = '1'");
                    $getcheckout = $getdata->my_sql_show_rows($connect, "service_list", "se_id = '" . $showfloor->se_id . "' AND se_group = '3' AND se_li_status != '0' AND se_li_status = '2'");

                ?>
                    <div class="row mb-3">
                        <div class="col-4 text-end">
                            <strong><?php echo $showfloor->se_name; ?> <span class="badge badge-center rounded-pill bg-label-primary"><?php echo $count = $getcheckin + $getcheckout; ?></span> <i class="fas fa-arrow-right"></i></strong>
                        </div>
                        <div class="col-2 text-end">
                            ว่าง :
                        </div>
                        <div class="col-1">
                            <span class="badge badge-center rounded-pill bg-label-success"><?php echo $getcheckin; ?></span>
                        </div>
                        <div class="col-3 text-end">
                            ไม่ว่าง :
                        </div>
                        <div class="col-1">
                            <span class="badge badge-center rounded-pill bg-label-danger"><?php echo $getcheckout; ?></span>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
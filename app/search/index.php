<div class="card">
    <div class="card-header">
        <strong>ค้นหารายการผู้เข้าพัก</strong>
        <hr>
    </div>
    <div class="card-body">
        <?php
        $searchName = $_POST['searchName'];
        if (isset($_POST['search'])) {
            if (!empty($_POST['searchName'])) {
                $getguest  = $getdata->my_sql_select($connect, NULL, "bm_guest", "key_guest <> 'hidden' AND CONCAT(fname,lname) LIKE '%$searchName%'");
            } else {
                $getguest  = $getdata->my_sql_select($connect, NULL, "bm_guest", "key_guest <> 'hidden' AND sys_procress != '99' ORDER BY check_in ASC");
            }
        } ?>
        <div class="row">
            <div class="col-12">
                <form action="<?php echo $SERVER_NAME; ?>" method="post">
                    <div class="form-group row mb-4">
                        <div class="col-md-3 col-sm-12 text-center" style="padding-top: 10px;">
                            <label for="searchName"><strong>ระบุชื่อ / นามสกุล</strong></label>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <input type="text" name="searchName" id="searchName" class="form-control" onfocus="this.value=''" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="text-center">
                        <?php if (isset($_POST['search'])) { ?>
                            <button class="btn btn-label-danger mt-3" onclick="reloadPage()" data-style="expand-left">
                                <span class="fas fa-trash-alt"> ล้างค่า</span>
                            </button>

                            <button class="btn btn-label-warning mt-3" data-style="expand-left" type="submit" name="search">
                                <span class="fas fa-search"> ค้นหา</span>
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-label-warning mt-3" data-style="expand-left" type="submit" name="search">
                                <span class="fas fa-search"> ค้นหา</span>
                            </button>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="showSearch" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="showSearch">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-danger" data-bs-dismiss="modal">
                            ปิด
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <?php if (isset($_POST['search'])) { ?>

            <div class="card mt-5">
                <div class="card-header">
                    <div class="col-12">
                        <h4 class="fw-semibold">
                            </h3>
                            <hr class="mt-0" />
                    </div>
                </div>
                <div class="card-body">
                    <table id="responsive-data-table-1" class="table dt-responsive table-hover" style="font-family: sarabun; font-size: 16px;" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ - นาสกุลผู้เข้าพัก</th>
                                <th>ตำแหน่ง</th>
                                <th>วันที่เข้าพัก</th>
                                <!-- <th>วันที่ออกจากห้องพัก</th> -->
                                <th>จำนวนบริวาร</th>
                                <th>สถานะข้อมูล</th>
                                <th>เข้าพักที่</th>
                                <th>ตรวจสอบรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $u = 0;
                            // $getguest  = $getdata->my_sql_select($connect, NULL, "bm_guest", "key_guest <> 'hidden' AND sys_procress != '99' ORDER BY check_in ASC");
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
                                    <!-- <td><?php if ($guest_detail->check_out == NULL) {
                                                    echo '<span class="badge bg-label-danger">ยังไม่มีการระบุ</span>';
                                                } else {
                                                    echo @dateTimeConvertor($guest_detail->check_out);
                                                } ?></td> -->
                                    <td>
                                        <?php if ($guest_detail->status_guest_detail == '1') { ?>
                                            <label for="prefix_code"><?php $count_guest_detail = $getdata->my_sql_show_rows($connect, "bm_guest_detail", "code_guest = '" . $guest_detail->code . "'");
                                                                        echo $count_guest_detail; ?> ท่าน</label>
                                        <?php } else { ?>
                                            <span class="badge bg-label-info">ไม่แจ้งบริวาร</span>
                                        <?php } ?>
                                    </td>
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
                                    <?php if ($_SESSION['uclass'] != '2') { ?>
                                        <td class="text-center">
                                            <a href="index.php?p=guest_detail&key=<?php echo $guest_detail->key_guest; ?>" target="_blank" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                            <?php if ($guest_detail->status == '9' && $guest_detail->sys_procress == '2') { ?>
                                                <button type="button" class="btn btn-danger btn-sm" onClick="javascript:delete_guest('<?php echo @$guest_detail->key_guest; ?>');" data-top="toptitle" data-placement="top" title="ลบรายการ"><i class="fa fa-trash-alt fa-fw"></i></button>
                                            <?php } ?>
                                            <!-- <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#showSearch" data-whatever="<?php echo @$guest_detail->building . '_' . $guest_detail->floor . '_' . $guest_detail->room; ?>">
                                                <i class="fas fa-search fa-lg"></i>
                                            </button> -->
                                        </td>
                                    <?php } ?>

                                </tr>

                            <?php } ?>


                        </tbody>

                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
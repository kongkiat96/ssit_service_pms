<?php
if (isset($_POST['search'])) {
    if ($_POST['em_company'] != NULL) {
        $em_company = $_POST['em_company'];

        $getemployee = $getdata->my_sql_select($connect, NULL, "employee", "(department_id LIKE '%" . $em_company . "%') AND em_status = '1' ORDER BY title_name", "card_key");
    }
    if ($_POST['em_department'] != NULL) {
        $em_department = $_POST['em_department'];

        $getemployee = $getdata->my_sql_select($connect, NULL, "employee", "user_department = '" . $em_department . "' AND em_status = '1' ORDER BY title_name");
    }
    if ($_POST['em_company'] == NULL && $_POST['em_department'] == NULL) {

        $getemployee = $getdata->my_sql_select($connect, NULL, "employee", "card_key <> 'hidden' AND em_status = '1' ORDER BY title_name");
    }

    if ($_POST['em_company'] != NULL && $_POST['em_department'] != NULL) {
        $em_company = $_POST['em_company'];
        $em_department = $_POST['em_department'];

        $getemployee = $getdata->my_sql_select($connect, NULL, "employee", "department_id = '" . $em_company . "' AND  user_department LIKE '" . $em_department . "' AND em_status = '1' ORDER BY title_name");
    }
}
?>

<!-- <div class=" card-default text-center">

    <form method="post" action="<?php echo $SERVER_NAME; ?>" class="needs-validation">

        <div class="form-group row">

            <div class="col-md-6 col-sm-12">

                <label for="em_company">บริษัท / สังกัด</label>
                <select name="em_company" id="em_company" class="form-control select2bs4">
                    <option value="" selected>--- เลือกข้อมูล ---</option>
                    <?php
                    $getcompany = $getdata->my_sql_select($connect, NULL, "company", "cp_status = '1'");
                    while ($show = mysqli_fetch_object($getcompany)) {
                        echo '<option value="' . $show->id . '">' . $show->company_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="em_department">แผนก</label>
                <select name="em_department" id="em_department" class="form-control select2bs4">
                    <option value="">--- เลือกข้อมูล ---</option>
                    <?php
                    $getdep = $getdata->my_sql_select($connect, NULL, "department_name", "department_status ='1' ORDER BY id");
                    while ($show = mysqli_fetch_object($getdep)) {
                        echo '<option value="' . $show->id . '">' . $show->department_name . '</option>';
                    }
                    ?>
                </select>
            </div>


        </div>


        <?php if (isset($_POST['search'])) { ?>

            <button class="ladda-button btn btn-primary btn-square btn-ladda bg-danger" onclick="reloadPage()" data-style="expand-left">
                <span class="mdi mdi-filter-remove"> ล้างค่า</span>
                <span class="ladda-spinner"></span>
            </button>

            <button class="ladda-button btn btn-primary btn-square btn-ladda bg-info" data-style="expand-left" type="submit" name="search">
                <span class="mdi mdi-filter"> ค้นหา</span>
                <span class="ladda-spinner"></span>
            </button>
        <?php } else { ?>



            <button class="ladda-button btn btn-primary btn-square btn-ladda bg-info" data-style="expand-left" type="submit" name="search">
                <span class="mdi mdi-filter"> ค้นหา</span>
                <span class="ladda-spinner"></span>
            </button>
        <?php } ?>

    </form>
</div>
<hr> -->
<?php if (!isset($_POST['search'])) { ?>
    <div class="responsive-data-table">
        <table id="responsive-data-table-1" class="table dt-responsive nowrap hover" style="width:100%">
            <thead class="font-weight-bold text-center">
                <tr>
                    <td>ลำดับ</td>
                    <td>User Login</td>
                    <td>ชื่อ - นามสกุล</td>
                    <td>ตำแหน่ง</td>
                    <td>สังกัด</td>
                    <td>ฝ่าย</td>
                    <td>E-mail</td>
                    <td>จัดการ</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 0;
                $getemployee = $getdata->my_sql_select($connect, NULL, "employee", "card_key <> 'hidden' AND em_status = '1' ORDER BY date_create desc");
                while ($showmember = mysqli_fetch_object($getemployee)) {
                    $getuser = $getdata->my_sql_query($connect, NULL, "user", "user_key = '" . $showmember->card_key . "' AND user_status = '1'");
                    $x++;
                ?>
                    <tr>
                        <td align="center"><?php echo @$x; ?></td>
                        <td align="center"><?php echo @$getuser->username; ?></td>
                        <td>
                            <?php echo @prefixConvertor($showmember->title_name) . '&nbsp;' . $showmember->name . '&nbsp;' . $showmember->lastname; ?>
                        </td>
                        <td class="text-center">
                            <?php
                            if (@$showmember->user_position != NULL) {
                                # code...
                                echo @$showmember->user_position;
                            } else {
                                echo '<strong><div style="color: #E81600">-</div></strong>';
                            }
                            ?>
                        </td>


                        <td align="center">
                            <?php if (@$showmember->department_id != NULL) {

                                echo @prefixConvertorDepartment($showmember->department_id);
                            } else {
                                echo '<strong><div style="color: #E81600">-</div></strong>';
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php if (@$showmember->user_department != NULL) {

                                echo @getComName($showmember->user_department);
                            } else {
                                echo '<strong><div style="color: #E81600">-</div></strong>';
                            }
                            ?>
                        </td>

                        <!-- <td><?php echo @prefixConvertorCompany($showmember->department_id); ?></td> -->
                        <td><?php echo $getuser->email; ?></td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit_employee" data-whatever="<?php echo @$showmember->card_key; ?>" class="btn btn-sm btn-info" data-top="toptitle" data-placement="top" title="แก้ไขรายการนี้"><i class="fa fa-edit"></i></a>

                            <!-- <a onclick="deleteEmployee('<?php echo @$showmember->card_key; ?>');" class="btn btn-sm btn-danger" style="color:#FFF;"><i class="fa fa-times"></i> ลบ</a> -->
                            <a href="#" onclick="deleteEmployee('<?php echo @$showmember->card_key; ?>');" class="btn btn-sm btn-danger" data-toggle="toptitle" data-placement="top" title="ลบรายการนี้"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php } ?>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        width: '100%'
    });
</script>
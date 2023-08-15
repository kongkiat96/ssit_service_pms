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
                    <p>สำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (องค์การมหาชน) :GISTDA ให้ความสำคัญกับการคุ้มครองข้อมูลส่วนบุคคลของคุณ โดยนโยบายความเป็นส่วนตัวฉบับนี้ได้อธิบายแนวปฏิบัติเกี่ยวกับการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคล รวมถึงสิทธิต่าง ๆ ของเจ้าของข้อมูลส่วนบุคคล ตามกฎหมายคุ้มครองข้อมูลส่วนบุคคล</p>

                    <h2>การเก็บรวบรวมข้อมูลส่วนบุคคล</h2>
                    <p>
                        เราจะเก็บรวบรวมข้อมูลส่วนบุคคลที่ได้รับโดยตรงจากคุณผ่านช่องทาง ดังต่อไปนี้
                    </p>
                    <ul>
                        <li>ชื่อ - สกุล</li>
                        <li>หมายเลขโทรศัพท์</li>
                        <li>ข้อมูลบริวาร
                    </ul>
                    <p></p>

                    <h2>ประเภทข้อมูลส่วนบุคคลที่เก็บรวบรวม</h2>
                    <p><b>ข้อมูลส่วนบุคคล</b> เช่น ชื่อ นามสกุล เป็นต้น</p>
                    <p><b>ข้อมูลการติดต่อ</b> เช่น หมายเลขโทรศัพท์ เป็นต้น</p>
                    <p><b>ข้อมูลอื่น ๆ</b> เช่น รูปภาพ และข้อมูลอื่นใดที่ถือว่าเป็นข้อมูลส่วนบุคคลตามกฎหมายคุ้มครองข้อมูลส่วนบุคคล</p>

                    <h2>ผู้เยาว์</h2>
                    <p>หากคุณมีอายุต่ำกว่า 20 ปีหรือมีข้อจำกัดความสามารถตามกฎหมาย เราอาจเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณ เราอาจจำเป็นต้องให้พ่อแม่หรือผู้ปกครองของคุณให้ความยินยอมหรือที่กฎหมายอนุญาตให้ทำได้ หากเราทราบว่ามีการเก็บรวบรวมข้อมูลส่วนบุคคลจากผู้เยาว์โดยไม่ได้รับความยินยอมจากพ่อแม่หรือผู้ปกครอง เราจะดำเนินการลบข้อมูลนั้นออกจากเซิร์ฟเวอร์ของเรา</p>

                    <h2>วิธีการเก็บรักษาข้อมูลส่วนบุคคล</h2>
                    <p>เราจะเก็บรักษาข้อมูลส่วนบุคคลของคุณในรูปแบบเอกสารและรูปแบบอิเล็กทรอนิกส์</p>
                    <p>เราเก็บรักษาข้อมูลส่วนบุคคลของคุณ ดังต่อไปนี้</p>
                    <ul>
                        <li>ผู้ให้บริการเซิร์ฟเวอร์ในประเทศไทย</li>
                    </ul>

                    <h2>การประมวลผลข้อมูลส่วนบุคคล</h2>
                    <p>เราจะเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณเพื่อวัตถุประสงค์ดังต่อไปนี้</p>
                    <ul>
                        <li>เพื่อการบริหารจัดการภายในบริษัท</li>
                        <li>เพื่อปฏิบัติตามกฎหมายและกฎระเบียบของหน่วยงานราชการ</li>
                    </ul>

                    <h2>การเปิดเผยข้อมูลส่วนบุคคล</h2>
                    <p>เราอาจเปิดเผยข้อมูลส่วนบุคคลของคุณให้แก่ผู้อื่นภายใต้ความยินยอมของคุณหรือที่กฎหมายอนุญาตให้เปิดเผยได้ ดังต่อไปนี้</p>

                    <p><b>การบริหารจัดการภายในองค์กร</b></p>
                    <p>เราอาจเปิดเผยข้อมูลส่วนบุคคลของคุณภายในบริษัทเท่าที่จำเป็นเพื่อปรับปรุงและพัฒนาสินค้าหรือบริการของเรา เราอาจรวบรวมข้อมูลภายในสำหรับสินค้าหรือบริการต่าง ๆ ภายใต้นโยบายนี้เพื่อประโยชน์ของคุณและผู้อื่นมากขึ้น</p>

                    <h2>ระยะเวลาจัดเก็บข้อมูลส่วนบุคคล</h2>
                    <p>เราจะเก็บรักษาข้อมูลส่วนบุคคลของคุณไว้ตามระยะเวลาที่จำเป็นในระหว่างที่คุณเป็นลูกค้าหรือมีความสัมพันธ์อยู่กับเราหรือตลอดระยะเวลาที่จำเป็นเพื่อให้บรรลุวัตถุประสงค์ที่เกี่ยวข้องกับนโยบายฉบับนี้ ซึ่งอาจจำเป็นต้องเก็บรักษาไว้ต่อไปภายหลังจากนั้น หากมีกฎหมายกำหนดไว้ เราจะลบ ทำลาย หรือทำให้เป็นข้อมูลที่ไม่สามารถระบุตัวตนของคุณได้ เมื่อหมดความจำเป็นหรือสิ้นสุดระยะเวลาดังกล่าว</p>

                    <h2>สิทธิของเจ้าของข้อมูลส่วนบุคคล</h2>
                    <p>ภายใต้กฎหมายคุ้มครองข้อมูลส่วนบุคคล คุณมีสิทธิในการดำเนินการดังต่อไปนี้</p>

                    <p><b>สิทธิขอถอนความยินยอม (right to withdraw consent)</b> หากคุณได้ให้ความยินยอม เราจะเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณ ไม่ว่าจะเป็นความยินยอมที่คุณให้ไว้ก่อนวันที่กฎหมายคุ้มครองข้อมูลส่วนบุคคลใช้บังคับหรือหลังจากนั้น คุณมีสิทธิที่จะถอนความยินยอมเมื่อใดก็ได้ตลอดเวลา</p>

                    <p><b>สิทธิขอเข้าถึงข้อมูล (right to access)</b> คุณมีสิทธิขอเข้าถึงข้อมูลส่วนบุคคลของคุณที่อยู่ในความรับผิดชอบของเราและขอให้เราทำสำเนาข้อมูลดังกล่าวให้แก่คุณ รวมถึงขอให้เราเปิดเผยว่าเราได้ข้อมูลส่วนบุคคลของคุณมาได้อย่างไร</p>

                    <p><b>สิทธิขอถ่ายโอนข้อมูล (right to data portability)</b> คุณมีสิทธิขอรับข้อมูลส่วนบุคคลของคุณในกรณีที่เราได้จัดทำข้อมูลส่วนบุคคลนั้นอยู่ในรูปแบบให้สามารถอ่านหรือใช้งานได้ด้วยเครื่องมือหรืออุปกรณ์ที่ทำงานได้โดยอัตโนมัติและสามารถใช้หรือเปิดเผยข้อมูลส่วนบุคคลได้ด้วยวิธีการอัตโนมัติ รวมทั้งมีสิทธิขอให้เราส่งหรือโอนข้อมูลส่วนบุคคลในรูปแบบดังกล่าวไปยังผู้ควบคุมข้อมูลส่วนบุคคลอื่นเมื่อสามารถทำได้ด้วยวิธีการอัตโนมัติ และมีสิทธิขอรับข้อมูลส่วนบุคคลที่เราส่งหรือโอนข้อมูลส่วนบุคคลในรูปแบบดังกล่าวไปยังผู้ควบคุมข้อมูลส่วนบุคคลอื่นโดยตรง เว้นแต่ไม่สามารถดำเนินการได้เพราะเหตุทางเทคนิค</p>

                    <p><b>สิทธิขอคัดค้าน (right to object)</b> คุณมีสิทธิขอคัดค้านการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณในเวลาใดก็ได้ หากการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณที่ทำขึ้นเพื่อการดำเนินงานที่จำเป็นภายใต้ประโยชน์โดยชอบด้วยกฎหมายของเราหรือของบุคคลหรือนิติบุคคลอื่น โดยไม่เกินขอบเขตที่คุณสามารถคาดหมายได้อย่างสมเหตุสมผลหรือเพื่อดำเนินการตามภารกิจเพื่อสาธารณประโยชน์</p>

                    <p><b>สิทธิขอให้ลบหรือทำลายข้อมูล (right to erasure/destruction)</b> คุณมีสิทธิขอลบหรือทำลายข้อมูลส่วนบุคคลของคุณหรือทำให้ข้อมูลส่วนบุคคลเป็นข้อมูลที่ไม่สามารถระบุตัวคุณได้ หากคุณเชื่อว่าข้อมูลส่วนบุคคลของคุณถูกเก็บรวบรวม ใช้ หรือเปิดเผยโดยไม่ชอบด้วยกฎหมายที่เกี่ยวข้องหรือเห็นว่าเราหมดความจำเป็นในการเก็บรักษาไว้ตามวัตถุประสงค์ที่เกี่ยวข้องในนโยบายฉบับนี้ หรือเมื่อคุณได้ใช้สิทธิขอถอนความยินยอมหรือใช้สิทธิขอคัดค้านตามที่แจ้งไว้ข้างต้นแล้ว</p>

                    <p><b>สิทธิขอให้ระงับการใช้ข้อมูล (right to restriction of processing)</b> คุณมีสิทธิขอให้ระงับการใช้ข้อมูลส่วนบุคคลชั่วคราวในกรณีที่เราอยู่ระหว่างตรวจสอบตามคำร้องขอใช้สิทธิขอแก้ไขข้อมูลส่วนบุคคลหรือขอคัดค้านของคุณหรือกรณีอื่นใดที่เราหมดความจำเป็นและต้องลบหรือทำลายข้อมูลส่วนบุคคลของคุณตามกฎหมายที่เกี่ยวข้องแต่คุณขอให้เราระงับการใช้แทน</p>

                    <p><b>สิทธิขอให้แก้ไขข้อมูล (right to rectification)</b> คุณมีสิทธิขอแก้ไขข้อมูลส่วนบุคคลของคุณให้ถูกต้อง เป็นปัจจุบัน สมบูรณ์ และไม่ก่อให้เกิดความเข้าใจผิด</p>

                    <p><b>สิทธิร้องเรียน (right to lodge a complaint)</b> คุณมีสิทธิร้องเรียนต่อผู้มีอำนาจตามกฎหมายที่เกี่ยวข้อง หากคุณเชื่อว่าการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของคุณ เป็นการกระทำในลักษณะที่ฝ่าฝืนหรือไม่ปฏิบัติตามกฎหมายที่เกี่ยวข้อง</p>


                    <p>คุณสามารถใช้สิทธิของคุณในฐานะเจ้าของข้อมูลส่วนบุคคลข้างต้นได้ โดยติดต่อมาที่เจ้าหน้าที่คุ้มครองข้อมูลส่วนบุคคลของเราตามรายละเอียดท้ายนโยบายนี้ เราจะแจ้งผลการดำเนินการภายในระยะเวลา 30 วัน นับแต่วันที่เราได้รับคำขอใช้สิทธิจากคุณ ตามแบบฟอร์มหรือวิธีการที่เรากำหนด ทั้งนี้ หากเราปฏิเสธคำขอเราจะแจ้งเหตุผลของการปฏิเสธให้คุณทราบผ่านช่องทางต่าง ๆ เช่น ข้อความ (SMS) อีเมล โทรศัพท์ จดหมาย เป็นต้น</p>


                    <h2>การรักษาความมั่งคงปลอดภัยของข้อมูลส่วนบุคคล</h2>
                    <p>เราจะรักษาความมั่นคงปลอดภัยของข้อมูลส่วนบุคคลของคุณไว้ตามหลักการ การรักษาความลับ (confidentiality) ความถูกต้องครบถ้วน (integrity) และสภาพพร้อมใช้งาน (availability) ทั้งนี้ เพื่อป้องกันการสูญหาย เข้าถึง ใช้ เปลี่ยนแปลง แก้ไข หรือเปิดเผย นอกจากนี้เราจะจัดให้มีมาตรการรักษาความมั่นคงปลอดภัยของข้อมูลส่วนบุคคล ซึ่งครอบคลุมถึงมาตรการป้องกันด้านการบริหารจัดการ (administrative safeguard) มาตรการป้องกันด้านเทคนิค (technical safeguard) และมาตรการป้องกันทางกายภาพ (physical safeguard) ในเรื่องการเข้าถึงหรือควบคุมการใช้งานข้อมูลส่วนบุคคล (access control)</p>

                    <h2>การแจ้งเหตุละเมิดข้อมูลส่วนบุคคล</h2>
                    <p>ในกรณีที่มีเหตุละเมิดข้อมูลส่วนบุคคลของคุณเกิดขึ้น เราจะแจ้งให้สำนักงานคณะกรรมการคุ้มครองข้อมูลส่วนบุคคลทราบโดยไม่ชักช้าภายใน 72 ชั่วโมง นับแต่ทราบเหตุเท่าที่สามารถกระทำได้ ในกรณีที่การละเมิดมีความเสี่ยงสูงที่จะมีผลกระทบต่อสิทธิและเสรีภาพของคุณ เราจะแจ้งการละเมิดให้คุณทราบพร้อมกับแนวทางการเยียวยาโดยไม่ชักช้าผ่านช่องทางต่าง ๆ เช่น เว็บไซต์ ข้อความ (SMS) อีเมล โทรศัพท์ จดหมาย เป็นต้น</p>

                    <h2>การแก้ไขเปลี่ยนแปลงนโยบายความเป็นส่วนตัว</h2>
                    <p>เราอาจแก้ไขเปลี่ยนแปลงนโยบายนี้เป็นครั้งคราว โดยคุณสามารถทราบข้อกำหนดและเงื่อนไขนโยบายที่มีการแก้ไขเปลี่ยนแปลงนี้ได้ผ่านทางเว็บไซต์ของเรา</p>
                    <p>นโยบายนี้แก้ไขล่าสุดและมีผลใช้บังคับตั้งแต่วันที่ 07 สิงหาคม 2566</p>

                    <h2>นโยบายความเป็นส่วนตัวของเว็บไซต์อื่น</h2>
                    <p>นโยบายความเป็นส่วนตัวฉบับนี้ใช้สำหรับการเสนอสินค้า บริการ และการใช้งานบนเว็บไซต์สำหรับลูกค้าของเราเท่านั้น หากคุณเข้าชมเว็บไซต์อื่นแม้จะผ่านช่องทางเว็บไซต์ของเรา การคุ้มครองข้อมูลส่วนบุคคลต่าง ๆ จะเป็นไปตามนโยบายความเป็นส่วนตัวของเว็บไซต์นั้น ซึ่งเราไม่มีส่วนเกี่ยวข้องด้วย</p>

                    <h2>รายละเอียดการติดต่อ</h2>
                    <p>หากคุณต้องการสอบถามข้อมูลเกี่ยวกับนโยบายความเป็นส่วนตัวฉบับนี้ รวมถึงการขอใช้สิทธิต่าง ๆ คุณสามารถติดต่อเราหรือเจ้าหน้าที่คุ้มครองข้อมูลส่วนบุคคลของเราได้ ดังนี้</p>

                    <p><b>ผู้ควบคุมข้อมูลส่วนบุคคล (Data Controller)</b></p>
                    <p>สำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (องค์การมหาชน)</p>

                    <p>
                        สำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (องค์การมหาชน)
                        ศูนย์ราชการเฉลิมพระเกียรติ 80 พรรษา 5 ธันวาคม 2550 เลขที่ 120 อาคารรัฐประศาสนภักดี
                        ชั้น 6 และชั้น 7 ถนนแจ้งวัฒนะ แขวงทุ่งสองห้อง เขตหลักสี่ กรุงเทพฯ 10210
                    </p>

                    <p>อีเมล pdpa@gistda.or.th</p>
                    <p><b>เจ้าหน้าที่คุ้มครองข้อมูลส่วนบุคคล</b></p>
                    <p>(Data Protection Officer : DPO)</p>
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
                title: 'นโยบายการคุ้มครองข้อมูลส่วนบุคคล (Privacy Policy)',
                icon: 'info',
                showCancelButton: false,
                confirmButtonText: 'อ่านรายละเอียด',
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
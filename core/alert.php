<?php
// Set Alert  Timer 1000 = 1 วิ 
$chk_user = '
    <script type="text/javascript">
        Swal.fire({
            position: "top-end",
            size: "small",
            icon: "error",
            title: "ชื่อผู้ใช้งาน หรือรหัสผ่านผิด",
            timer: 3000,  
            showConfirmButton: false
        })
    </script>';
$ch_user = '
    <script type="text/javascript">
        Swal.fire({

            icon: "warning",
            title: "รหัสพนักงานมีอยู่แล้ว",
            timer: 2000,  
            showConfirmButton: false
        })
    </script>';
    $success_assign = '<script type="text/javascript">
    Swal.fire({
        position: "top-end",
        size: "small",
        icon: "info",
        title: "บันทึกมอบหมายงานเรียบร้อย...",
        timer: 3000,  
        showConfirmButton: false
    })
    setTimeout(4000);
</script>';
$success = '<script type="text/javascript">
    Swal.fire({
        position: "top-end",
        size: "small",
        icon: "success",
        title: "บันทึกเรียบร้อย...",
        timer: 3000,  
        showConfirmButton: false
    })
    setTimeout(function() {
            window.location = "index";
    }, 3000);

</script>';

$reqService = '<script type="text/javascript">
    Swal.fire({
        position: "top-end",
        size: "small",
        icon: "success",
        title: "บันทึกรายการแจ้งซ่อม/ปัญหา...",
        html:
          "ของท่านเรียบร้อยแล้วขั้นตอนถัดไป ระบบจะส่งข้อความแจ้งเตือน ไปถึง ฝ่ายจัดการพื้นที่และโครงสร้างพื้นฐาน เพื่อตรวจสอบและประเมินการซ่อม เป็นลำดับ ถัดไป. <br><br>แจ้งเตือนจะปิดลงและจะนำไปยังหน้ารายการในอีก <strong></strong> วินาที.<br/>",
        timer: 10000,  
        showConfirmButton: false,
        didOpen: () => {
            const content = Swal.getHtmlContainer()
            const $ = content.querySelector.bind(content)
        
            
            const increase = $("#increase")
        
            Swal.showLoading()
        
            function toggleButtons () {
              stop.disabled = !Swal.isTimerRunning()
              resume.disabled = Swal.isTimerRunning()
            }

            timerInterval = setInterval(() => {
              Swal.getHtmlContainer().querySelector("strong")
                .textContent = (Swal.getTimerLeft() / 1000)
                  .toFixed(0)
            }, 100)
          },
        willClose: () => {
            clearInterval(timerInterval)
          }
    })
    setTimeout(function() {
            window.location = "list";
    }, 10000);

</script>';
$success_admin = '<script type="text/javascript">
    Swal.fire({
        position: "top-end",
        size: "small",
        icon: "success",
        title: "บันทึกเรียบร้อย...",
        timer: 3000,  
        showConfirmButton: false
    })
</script>';
$warning = '<script type="text/javascript">
    Swal.fire({
        icon: "error",
        title: "ข้อมูลบางอย่างไม่ถูกต้อง",
        timer: 3000,  
        showConfirmButton: false
    })
</script>';

$counterror = '<script type="text/javascript">
    Swal.fire({
        icon: "warning",
        title: "มีข้อมูลในระบบแล้ว",
        timer: 3000,  
        showConfirmButton: false
    })
</script>';

$selectdata = '<script type="text/javascript">
    Swal.fire({
        icon: "warning",
        title: "เลือกข้อมูล",
        timer: 3000,  
        showConfirmButton: false
    })
</script>';

$saveedit = '<script type="text/javascript">
  Swal.fire({
    position: "top-end",
    icon: "success",
    title: "แก้ไขเรียบร้อย...",
    timer: 3000,  
    showConfirmButton: false
  })
</script>';

$ck_pass = '<script type="text/javascript">
    Swal.fire({
        icon: "warning",
        title: "รหัสผ่านไม่ตรงกัน",
        timer: 3000,  
        showConfirmButton: false
    })
</script>';

$newproject = '<script type="text/javascript">
    Swal.fire({
        icon: "warning",
        title: "กำลังอยู่ในระหว่างปรับปรุง",
        timer: 3000,  
        showConfirmButton: false
    })
    setTimeout(function () {
        window.location.href = "index.php";
     }, 4000);
</script>';

$check_pic = '<script type="text/javascript">
Swal.fire({
    position: "top-end",
    size: "small",
    icon: "warning",
    title: "ไม่สามารถแจ้งซ่อมได้",
    html:
      "เนื่องจากไฟล์ที่ได้อัพโหลดไม่ถูกต้อง (รับได้เฉพาะ PNG, JPG)<br><br>แจ้งเตือนจะปิดลงในอีก <strong></strong> วินาที.<br/>",
    timer: 10000,  
    showConfirmButton: false,
    didOpen: () => {
        const content = Swal.getHtmlContainer()
        const $ = content.querySelector.bind(content)
    
        
        const increase = $("#increase")
    
        Swal.showLoading()
    
        function toggleButtons () {
          stop.disabled = !Swal.isTimerRunning()
          resume.disabled = Swal.isTimerRunning()
        }

        timerInterval = setInterval(() => {
          Swal.getHtmlContainer().querySelector("strong")
            .textContent = (Swal.getTimerLeft() / 1000)
              .toFixed(0)
        }, 100)
      },
    willClose: () => {
        clearInterval(timerInterval)
      }
})


</script>';

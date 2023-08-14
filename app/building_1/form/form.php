<form method="post" enctype="multipart/form-data" class="was-validated" id="waitsave">
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label for="fname">ชื่อเจ้าหน้าที่</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="ชื่อเจ้าหน้าที่" autofocus required>
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="lname">นามสกุลเจ้าหน้าที่</label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="นามสกุลเจ้าหน้าที่" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label for="position">ตำแหน่ง</label>
            <input type="text" name="position" id="position" class="form-control" placeholder="ตำแหน่ง" required>
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="tel">หมายเลขโทรศัพท์</label>
            <input type="tel" name="tel" id="tel" class="form-control" placeholder="หมายเลขโทรศัพท์" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label for="idcard">เลขประจำตัวเจ้าหน้าที่</label>
            <input type="text" name="idcard" id="idcard" class="form-control" placeholder="เลขประจำตัวเจ้าหน้าที่" required>
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="pic">รูปถ่าย</label>
            <input type="file" name="pic" id="pic" class="form-control" placeholder="รูปถ่าย" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label for="detail">รายละเอียดเพิ่มเติม (ถ้ามี)</label>
            <textarea name="detail" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-12 text-center">
            <button class="ladda-button btn btn-warning btn-square btn-ladda bg-success" data-style="expand-left" type="submit" name="save_card">
                <span class="fas fa-save"> บันทึก</span>
                <span class="ladda-spinner"></span>
            </button>
        </div>

    </div>
</form>
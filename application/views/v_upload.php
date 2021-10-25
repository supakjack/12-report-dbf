<div>
    <?php
    if (isset($new_path)) {
    ?>
        <div class="col-md-12 mt-3">
            <button
            onclick="window.open(`<?= $base_url ?>uploads/<?= $new_path ?>`, '_blank')"
            type="submit" class="btn bg-gradient-danger w-100">ดูผลลัพทธ์ประมวลผลไฟล์ล่าสุด</button>
        </div>
    <?php
    }
    ?>
    <form action="<?= $base_url ?>Upload/convert_to_dbf" method="post" enctype="multipart/form-data">
        <div class="row text-center py-3 mt-3">
            <div class="col-12 mx-auto">
                <div class="input-group input-group-static">
                    <label>กรอกเลขรหัส</label>
                    <input name="code" class="form-control" placeholder="ตัวอย่าง 6311" type="text" required>
                </div>
            </div>
        </div>
        <div class="col-12">
            <label for="formFileLg" class="form-label">เลือก 12 ไฟล์ที่จะอัพโหลด</label>

            <input name="fileToUpload[]" class="form-control form-control-lg" type="file" multiple required>
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn bg-gradient-success w-100">ประมวลผลไฟล์</button>
        </div>
    </form>

</div>
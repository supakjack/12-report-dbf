<div>
    <?php
    if (isset($array_error)) {
    ?>
        <div class="table-responsive">
            <table class="table caption-top dateexp">
                <caption>พบข้อผิดพลาด INSyymm.txt ที่ DATEEXP</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ข้อผิดพลาด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($array_error['INSyymm.txt']['DATEEXP'] as $message) {
                        $i = $i + 1;
                    ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $message ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
    <?php
    if (isset($array_error)) {
    ?>
        <div class="table-responsive">
            <table class="table caption-top datein">
                <caption>พบข้อผิดพลาด INSyymm.txt ที่ DATEIN</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ข้อผิดพลาด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($array_error['INSyymm.txt']['DATEIN'] as $message) {
                        $i = $i + 1;
                    ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $message ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
    <?php
    if (isset($new_path)) {
    ?>
        <div class="col-md-12 mt-3">
            <button onclick="window.open(`<?= $base_url ?>uploads/<?= $new_path ?>`, '_blank')" type="submit" class="btn bg-gradient-danger w-100">ดูผลลัพทธ์ประมวลผลไฟล์ล่าสุด</button>
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

<script>
    $(document).ready(function() {
        $('.dateexp').DataTable();
        $('.datein').DataTable();
        $('#DataTables_Table_0_filter').addClass('input-group input-group-outline');
        $('#DataTables_Table_1_filter').addClass('input-group input-group-outline');
    });
</script>

<style>
    /* #DataTables_Table_0_filter > label input , #DataTables_Table_1_filter > label input{
        border-style: solid;
        border-width: 1px;
    } */
</style>
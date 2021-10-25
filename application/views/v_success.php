<button type="button" class="btn btn-success">เปิดดูแฟ้ม</button>
<button type="button" class="btn btn-success">อัพโหลดใหม่</button>
<script>
    window.open(`<?= $base_url ?>uploads/<?= $new_path ?>`, '_blank');
</script>
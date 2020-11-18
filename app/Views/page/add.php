<?= $this->extend('temp/template') ?>

<?= $this->section('content') ?>
<div class="card mt-2">
    <div class="card-header text-center">
        Tambah Post
    </div>
    <div class="card-body">
        <form action="<?= base_url('/user/adds') ?>" method="post">
            <?= csrf_field() ?>
            <label for="title" class="font-weight-bold">Tulis Judul</label>
            <input type="text" id="title" class="form-control" name="judul" placeholder="Tulis Sebuah Judul" autofocus required>
            <br>
            <label for="title" class="font-weight-bold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="validationTextarea" placeholder="Tulis Sebuah Deskripsi" required rows="10"></textarea>
            <br>
            <label for="Status" class="font-weight-bold">Status</label>
            <select class="custom-select" name="status" id="Status" required>
                <option value="publish">Publish</option>
                <option value="pending">Pending</option>
                <option value="draft">Draft</option>
            </select>
            <br><br>
            <label for="tipe" class="font-weight-bold">Tipe</label>
            <select class="custom-select" name="tipe" id="tipe" required>
                <option value="post">Post</option>
                <option value="halaman">Halaman</option>
            </select>
            <br><br>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
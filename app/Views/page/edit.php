<?= $this->extend('temp/template') ?>

<?= $this->section('content') ?>
<div class="card mt-2">
    <div class="card-header text-center">
        Edit Post
    </div>
    <div class="card-body">
        <form action="<?= base_url('/p/'.$username.'/'.$post->slug.'/edits') ?>" method="post">
            <?= csrf_field() ?>
            <label for="title" class="font-weight-bold">Tulis Judul</label>
            <input type="text" id="title" class="form-control" name="judul" placeholder="Tulis Sebuah Judul" autofocus required value="<?=$post->judul ?>">
            <br>
            <label for="title" class="font-weight-bold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="validationTextarea" placeholder="Tulis Sebuah Deskripsi" required rows="10"><?= $post->deskripsi ?></textarea>
            <br>
            <label for="Status" class="font-weight-bold">Status</label>
            <select class="custom-select" name="status" id="Status" required>
                <option value="publish" <?php if($post->status == "publish") echo "selected";?>>Publish</option>
                <option value="pending" <?php if($post->status == "pending") echo "selected";?>>Pending</option>
                <option value="draft" <?php if($post->status == "draft") echo "selected";?>>Draft</option>
            </select>
            <br><br>
            <label for="tipe" class="font-weight-bold">Tipe</label>
            <select class="custom-select" name="tipe" id="tipe" required>
                <option value="post" <?php if($post->tipe == "post") echo "selected";?>>Post</option>
                <option value="halaman" <?php if($post->tipe == "halaman") echo "selected";?>>Halaman</option>
            </select>
            <br><br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
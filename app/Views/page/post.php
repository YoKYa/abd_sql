<?= $this->extend('temp/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12 text-center">
        <h1 class="mt-4"><?= $post->judul ?> </h1>
        <small>by <a href="<?= base_url('u/'.$user->username) ?>"><?= $user->nama ?></a> at <?= $post->created_at ?></small><br>
        <small>last update <?= $post->updated_at ?></small>
    </div>
    <div class="col-12"><hr></div>
    <div><?= $post->deskripsi ?></div>
    
</div>

<?= $this->endSection() ?>
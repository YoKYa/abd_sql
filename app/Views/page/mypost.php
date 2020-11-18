<?= $this->extend('temp/template') ?>

<?= $this->section('content') ?>
<nav class="navbar navbar-expand-sm navbar-light mt-2" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="table-responsive">
    <table class="table">
        <caption>Daftar Post</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">JUDUL</th>
                <th scope="col">PENULIS</th>
                <th scope="col">TERAKHIR UPDATE</th>
                <th scope="col">DIBUAT PADA</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) { ?>
                <tr>
                    <th scope="row"><?= ++$no ?></th>
                    <td><?= $post->judul ?></td>
                    <td><?= $post->penulis ?></td>
                    <td><?= $post->updated_at ?></td>
                    <td><?= $post->created_at ?></td>
                    <td>
                    <div class="row">
                        <a href="<?= base_url('/p/'.$username).'/'.$post->slug ?>" class="btn btn-sm btn-outline-info ml-2 font-weight-bold">Lihat</a>
                        <a href="<?= base_url('/p/'.$username).'/'.$post->slug ?>/edit" class="btn btn-sm btn-outline-secondary ml-2 font-weight-bold">Edit</a>
                        <a href="<?= base_url('/user/mypost/del/'.$post->id)?>" class="btn btn-sm btn-outline-danger ml-2 font-weight-bold">Hapus</a>
                    </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item<?php if($no == 5) echo " disabled"; ?>"><a class="page-link" href="<?php $b = ceil($no/5)-1; echo base_url('/user/mypost/'.$b)?>"><<</a></li>
                    <?php $a = 1; while ($a <= $num) { ?>
                        <li class="page-item <?php if(current_url() == base_url('/user/mypost/'.$a)) echo "active"; ?>"><a class="page-link" href="<?= base_url('/user/mypost/'.$a) ?>"><?= $a ?></a></li>
                    <?php $a++; } ?>
                    <li class="page-item <?php if(base_url('/user/mypost/'.$num) == current_url()) echo "disabled";?>"><a class="page-link" href="<?php $b = ceil($no/5)+1; echo base_url('/user/mypost/'.$b)?>">>></a></li>
                </ul>
            </nav>
        </div>
</div>
<?= $this->endSection() ?>
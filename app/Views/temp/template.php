<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?> || MiniBlog</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="<?php base_url() ?>/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>

<body>
    <header class="fixed-top">
        <div class="d-flex justify-content-center bg-primary">
            <div class="font-weight-bold text-light p-2">MiniBlog</div>
        </div>
    </header>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Hi, <?= $username ?></h3>
            </div>
            <ul class="list-unstyled components">
                <li class=" <?php if (current_url() == base_url() . "/beranda") {
                                echo 'active';
                            } ?>">
                    <a href="<?php echo base_url() ?>">Beranda</a>
                </li>
                <li>
                    <a href="#post" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Postingan</a>
                    <ul class="collapse list-unstyled <?php if(current_url() == base_url('/user/mypost') || current_url() == base_url('/user/mypage') || current_url() == base_url('/user/add')) echo "show";?>" id="post">
                    <?php $num; if(!isset($num)) $num = null;?>
                        <li class="<?php if(current_url() == base_url('/user/mypost') || current_url() == base_url('/user/mypost/'.$num)) echo "active";?>">
                            <a href="<?= base_url('/user/mypost') ?>">Postingan Saya</a>
                        </li>
                        <li class="<?php if(current_url() == base_url('/user/mypage') || current_url() == base_url('/user/mypage/'.$num)) echo "active";?>">
                            <a href="<?= base_url('/user/mypage') ?>">Halaman Saya</a>
                        </li>
                        <li class="<?php if(current_url() == base_url('/user/add')) echo "active";?>">
                            <a href="<?= base_url('/user/add') ?>">Tambah Post/Halaman</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Profil</a>
                </li>
                <hr>
                <li>
                    <a href="<?= base_url() ?>/logout">Logout</a>
                </li>
            </ul>
        </nav>
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>>></span>
        </button>
        <div id="content">
            <?= $this->renderSection('content') ?>
        </div>
        <footer class="fixed-bottom">
            <div class="d-flex justify-content-center bg-primary">
                <small class="text-light">&copy;YoKYa <?php echo date('Y'); ?></small>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
</body>

</html>
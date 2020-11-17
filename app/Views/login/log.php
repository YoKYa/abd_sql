<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
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
            <div class="font-weight-bold text-light p-2">Control Panel Blog</div>
        </div>
    </header>
    <div class="wrapper">
        <div class="container text-center">
            <div style="height: 75px;"></div>
            <div class="dropdown-divider"></div>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form class="form-signin" action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <h1 class="h3 mb-5 font-weight-normal text-center">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address/Username</label>
                <input name="login" type="text" id="inputEmail" class="form-control mb-2" placeholder="Email address / Username" required autofocus>
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required>
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
                <div class="checkbox mb-3 mt-2 text-left">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <p><a class="dropdown-item" href="<?= base_url('register') ?>">Baru disini, Daftar sekarang</a></p>
            <a class="dropdown-item" href="<?= base_url('forgot') ?>">Lupa Passwordmu?</a>
        </div>
    </div>

    <footer class="fixed-bottom">
        <div class="d-flex justify-content-center bg-primary">
            <small class="text-light">&copy;YoKYa <?php echo date('Y'); ?></small>
        </div>
    </footer>
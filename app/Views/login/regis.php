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
            <form class="form-signin" action="<?= route_to('register') ?>" method="post">
                <?= csrf_field() ?>
                <h1 class="h3 mb-5 font-weight-normal text-center">Please sign up</h1>
                <label for="inputEmail" class="sr-only">Email address/Username</label>
                <input name="email" type="text" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus value="<?= old('email') ?>" >
                <input type="text" class="form-control mb-2<?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                <label for="inputPassword" class="sr-only">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required>
                <label for="pass_confirm" class="sr-only">Pass Confirm Password</label>
                <input name="pass_confirm" type="password" id="pass_confirm" class="form-control mb-2" placeholder="Password Confirm" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
            </form>
            <div class="dropdown-divider"></div>
            <p>Sudah Mendaftar? <a href="<?= route_to('login') ?>">Login</a></p>
        </div>
    </div>

    <footer class="fixed-bottom">
        <div class="d-flex justify-content-center bg-primary">
            <small class="text-light">&copy;YoKYa <?php echo date('Y'); ?></small>
        </div>
    </footer>
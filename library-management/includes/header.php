<?php require_once __DIR__ . '/bootstrap.php'; ?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? APP_NAME) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="<?= url('dashboard.php') ?>">Thư viện UTT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topMenu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="topMenu">
            <ul class="navbar-nav ms-auto">
                <?php if(is_logged_in()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= url('profile.php') ?>">Xin chào, <?= e(current_user()['full_name']) ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= url('logout.php') ?>">Đăng xuất</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= url('login.php') ?>">Đăng nhập</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= url('register.php') ?>">Đăng ký</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid"><div class="row">
<?php if(is_logged_in()): include __DIR__ . '/sidebar.php'; endif; ?>
<main class="<?= is_logged_in() ? 'col-md-9 ms-sm-auto col-lg-10 px-md-4' : 'col-12' ?> py-4">
<?php if($msg=flash('success')): ?><div class="alert alert-success"><?= e($msg) ?></div><?php endif; ?>
<?php if($msg=flash('error')): ?><div class="alert alert-danger"><?= e($msg) ?></div><?php endif; ?>

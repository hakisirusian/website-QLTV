<?php
require_once __DIR__ . '/../includes/bootstrap.php'; use app\Services\AuthService;
if(is_logged_in()) redirect_to('dashboard.php');
if($_SERVER['REQUEST_METHOD']==='POST'){ $r=(new AuthService())->login($_POST['email']??'',$_POST['password']??''); if($r['ok']){ $_SESSION['user']=$r['data']; $_SESSION['api_token']=$r['data']['api_token']; redirect_to('dashboard.php'); } flash('error',$r['message']); }
$title='Đăng nhập'; include __DIR__.'/../includes/header.php'; ?>
<div class="row justify-content-center"><div class="col-md-5"><div class="card shadow-sm"><div class="card-body p-4"><h3 class="mb-3 text-center">Đăng nhập hệ thống</h3><form method="post"><div class="mb-3"><label class="form-label required">Email</label><input type="email" name="email" class="form-control" required></div><div class="mb-3"><label class="form-label required">Mật khẩu</label><input type="password" name="password" class="form-control" required></div><button class="btn btn-primary w-100">Đăng nhập</button></form><p class="mt-3 text-center">Chưa có tài khoản? <a href="<?= url('register.php') ?>">Đăng ký</a></p></div></div></div></div><?php include __DIR__.'/../includes/footer.php'; ?>

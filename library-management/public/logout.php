<?php
require_once __DIR__ . '/../includes/bootstrap.php';
if(is_logged_in()) (new app\Repositories\UserRepository())->updateToken((int)current_user()['id'],null);
session_destroy(); session_start(); flash('success','Đã đăng xuất.'); redirect_to('login.php');

<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse show min-vh-100 border-end"><div class="position-sticky pt-3"><ul class="nav flex-column">
<li class="nav-item"><a class="nav-link" href="<?= url('dashboard.php') ?>"><span class="menu-icon">&#128202;</span> Dashboard</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('books/index.php') ?>"><span class="menu-icon">&#128218;</span> Sách</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('newspapers/index.php') ?>"><span class="menu-icon">&#128240;</span> Báo</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('magazines/index.php') ?>"><span class="menu-icon">&#128478;</span> Tạp chí</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('book_types/index.php') ?>"><span class="menu-icon">&#127991;</span> Loại sách</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('members/index.php') ?>"><span class="menu-icon">&#128101;</span> Thành viên thư viện</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('borrows/index.php') ?>"><span class="menu-icon">&#128214;</span> Mượn tài liệu</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('returns/index.php') ?>"><span class="menu-icon">&#8617;</span> Trả tài liệu</a></li>
<?php if(is_admin()): ?><li class="nav-item"><a class="nav-link" href="<?= url('users/index.php') ?>"><span class="menu-icon">&#128274;</span> Người dùng hệ thống</a></li><?php endif; ?>
<li class="nav-item"><a class="nav-link" href="<?= url('profile.php') ?>"><span class="menu-icon">&#128100;</span> Hồ sơ</a></li>
<li class="nav-item"><a class="nav-link" href="<?= url('change_password.php') ?>"><span class="menu-icon">&#128273;</span> Đổi mật khẩu</a></li>
</ul></div></nav>

<?php if (!isset($_SESSION['auth'])) {
    header("location: http://localhost/poly_tro/site/account?signIn");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/poly_tro/public/css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav class="account-navbar">
            <a href="http://localhost/poly_tro" class="account-navbar_item--link account-navbar--link">Polytro.com</a>
            <ul class="account-navbar_list">
                <li class="account-navbar_item">
                    <a href="http://localhost/poly_tro" class="account-navbar_item--link">Trang
                        chủ</a>
                </li>
                <li class="account-navbar_item">
                    <a href="http://localhost/poly_tro/site/category?id=1" class="account-navbar_item--link">Phòng trọ</a>
                </li>
                <li class="account-navbar_item">
                    <a href="http://localhost/poly_tro/site/category?id=2" class="account-navbar_item--link">Nhà trọ</a>
                </li>
                </li>
            </ul>
        </nav>
        <main class="account-content">
            <div class="account-sidebar">
                <div class="user-info">
                    <div class="user-avatar">
                        <img src="http://localhost/poly_tro<?= $GLOBALS['userInfo']['image'] ?>" alt="" class="user-avatar_img">
                    </div>
                    <div class="user-meta">
                        <p class="user-meta_name">
                            <?= $GLOBALS['userInfo']['fullname'] ?>
                        </p>
                        <p class="user-meta_phone-number">
                            <?= $GLOBALS['userInfo']['phone'] ?>
                        </p>
                    </div>
                </div>
                <ul class="account-sidebar_list">
                    <?php if ($GLOBALS['userInfo']['role'] == 1) : ?>
                        <li class="account-sidebar_item">
                            <a href="http://localhost/poly_tro/site/account" class="account-sidebar_item--link">
                                <i class="fa-solid fa-file-lines"></i>
                                <span class="account-sidebar_item--title">Quản
                                    lý tin đăng</span>
                            </a>
                        </li>
                    <?php endif ?>
                    <li class="account-sidebar_item">
                        <a href="http://localhost/poly_tro/site/account/profile" class="account-sidebar_item--link">
                            <i class="fa-solid fa-circle-user"></i>
                            <span class="account-sidebar_item--title">Sửa
                                thông tin cá nhân</span>
                        </a>
                    </li>
                    <li class="account-sidebar_item">
                        <a href="http://localhost/poly_tro/site/account/order" class="account-sidebar_item--link">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span class="account-sidebar_item--title">Lịch
                                sử thuê phòng</span>
                        </a>
                    </li>
                    <li class="account-sidebar_item">
                        <a href="" class="account-sidebar_item--link">
                            <i class="fa-regular fa-message"></i>
                            <span class="account-sidebar_item--title">Liên
                                hệ</span>
                        </a>
                    </li>
                    <li class="account-sidebar_item">
                        <a href="http://localhost/poly_tro/site/auth/logout" class="account-sidebar_item--link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="account-sidebar_item--title">Thoát</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="account-main">
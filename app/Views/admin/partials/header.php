<?php if (!isset($_SESSION['admin'])) {
    header("location: http://localhost/poly_tro/admin");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/poly_tro/public/css/dashboard.css">
    <link rel="stylesheet" href="http://localhost/poly_tro/public/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <img src="http://localhost/poly_tro/public/image/logo.png" style="width:100%; height:90px" alt="">
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="http://localhost/poly_tro/admin/dashboard">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="http://localhost/poly_tro/admin/auth">
                        <span>Người dùng</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="http://localhost/poly_tro/admin/new">
                        <span>Tin đăng</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="http://localhost/poly_tro/admin/order">
                        <span>Đơn chờ duyệt</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="http://localhost/poly_tro/admin/permission">
                        <span>Cấp quyền</span>
                    </a>
                </li>
            </ul>
            <div class="account-info">
                <div class="account-info-name">
                    <?= $GLOBALS['adminInfo']['username'] ?>
                </div>
                <a class="account-info-more" href="http://localhost/poly_tro/admin/dashboard/logout">
                    Đăng xuất
                </a>
            </div>
        </div>
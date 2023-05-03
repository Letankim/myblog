<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./view/css/main.css">
    <link rel="stylesheet" href="./view/css/responsive.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Trang chủ</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="name_app">My admin blog</h2>
            <img src="../uploads/logo.png" alt="" class="header_logo">
            <div class="box_menu hide_on_laptop">
                <i class='bx bx-menu' ></i>
            </div>
        </div>
        <div class="box_show_menu hide_on_laptop">
            <div class="overlay"></div>
        </div>
        <div class="wrapper_app">
            <div class="navigation">
                <div class="header_nav">
                    <div class="box_info_admin">
                        <img src="https://scr.vn/wp-content/uploads/2020/07/Avatar-Facebook-tr%E1%BA%AFng.jpg" alt="">
                        <span class="name_user"><?=$_SESSION['usernameAdmin']?></span>
                    </div>
                    <div class="logout">
                        <a href="index.php?act=logout" class="logout_link">
                            <i class='bx bx-power-off' ></i>
                        </a>
                    </div>
                </div>
                <ul class="list_nav">
                    <li class="nav_item">
                        <a href="index.php?act=trangchu" class="nav_item_link">
                            <i class='bx bx-home'></i>
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=navigation" class="nav_item_link">
                            <i class='bx bxs-navigation' ></i>
                            Navigation
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=banner" class="nav_item_link">
                            <i class='bx bx-slider' ></i>
                            Banner
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=post" class="nav_item_link">
                            <i class='bx bxs-edit' ></i>
                            Bài viết
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=taikhoan" class="nav_item_link">
                            <i class='bx bxs-user-account' ></i>
                            Tài khoản
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=about" class="nav_item_link">
                            <i class='bx bxs-color'></i>
                            Giới thiệu
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=slogan" class="nav_item_link">
                            <i class='bx bxl-slack'></i>
                            Slogan
                        </a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?act=advertise" class="nav_item_link">
                            <i class='bx bxs-badge-dollar'></i>
                            Advertise
                        </a>
                    </li>
                </ul>
            </div>
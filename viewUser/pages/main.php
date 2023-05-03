
    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <title>Trang chủ</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <a href="." class="logo">
                <img src="./uploads/logo.png" alt="" class="img_logo">
            </a>
            <i class='bx bx-menu menu_btn hide_on_laptop hide_on_tablet' ></i>
            <div class="navigation">
                <i class='bx bx-x close_btn hide_on_laptop hide_on_tablet'></i>
                <ul class="list_nav">
                    <li class="item_nav">
                        <a href="." class="item_nav_link">Home</a>
                    </li>
                    <li class="item_nav">
                        <a href="post.html" class="item_nav_link">All blog</a>
                    </li>
                    <li class="item_nav">
                        <a href="about.html" class="item_nav_link">About us</a>
                    </li>
                    <li class="item_nav">
                        <?php
                            if(isset($_SESSION['userId'])) {
                                echo '<a href="personal.html" class="item_nav_link">Personal</a>';
                            } else {
                                echo '<a href="login.html" class="item_nav_link">Personal</a>';
                            }
                        ?>
                    </li>
                    <!-- <li class="item_nav">
                        <a href="" class="item_nav_link">Awards</a>
                    </li> -->
                    <?php
                        if(isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo '<li class="item_nav">
                                    <a href="?act=personal" class="item_nav_link">'.$username.'</a>
                                </li>
                                <li class="item_nav">
                                    <a href="?act=logout" class="item_nav_link">Logout</a>
                                </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <section class="container_main">
            <div class="banner">
                <?php
                    if(count($oneBanner) == 1) {
                        echo '<img src="./uploads/'.$oneBanner[0]['img'].'" alt="" class="img_banner">';
                    } else {
                        echo '<img src="https://static.wixstatic.com/media/d38084_87484aff53264c0688742da10b99782af000.jpg/v1/fill/w_1519,h_643,al_c,q_85,usm_0.33_1.00_0.00,enc_auto/d38084_87484aff53264c0688742da10b99782af000.jpg" alt="" class="img_banner">';
                    }
                ?>
                <div class="slogan">
                    <h2><?=$oneSlogan[0]['topslogan']?></h2>
                    <p class = "slogan_desc"><?=$oneSlogan[0]['bottomslogan']?></p>
                </div>
            </div>
            <div class="content_main">
                <div class="wrapper_post">
                    <h2 class="title__post">Posts</h2>
                    <div class="posts">
                        <?php
                            showAllPost($pagePost, $allComment);
                        ?>
                    </div>
                </div>
            </div>
        </section>
         <!-- footer -->
        <?php
            footer();
        ?>
        <!-- show advertise -->
        <?php
           if(count($oneAdver) == 1) {
             addAdvertisement($oneAdver);
           }
        ?>
    </div>
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/myblog.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
</html>
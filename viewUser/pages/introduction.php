    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <link rel="stylesheet" href="./assets/css/aboutus.css">
    <title>About us</title>
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
                </ul>
            </div>
        </div>
        <section class="container_main">
            <div class="wrapper_intr">
                <div class="content_intr">
                    <img src="./uploads/<?=$oneIntro[0]['img']?>" alt="" class="img_desc">
                    <div class="box_content_intr">
                        <h2>ABOUT<br>US</h2>
                        <p class = "short_intro">
                            <?=$oneIntro[0]['content']?>
                        </p>
                    </div>
                </div>
                <img src="https://static.wixstatic.com/media/84770f_aef170299c6c4ebb8e4dc27bc46c1301~mv2.png/v1/fill/w_171,h_172,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/84770f_aef170299c6c4ebb8e4dc27bc46c1301~mv2.png" alt="" class="img_decor">
            </div>
        </section>
         <!-- footer -->
         <?php
            footer();
        ?>
    </div>
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
</html>
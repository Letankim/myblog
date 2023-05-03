
    <link rel="stylesheet" href="./assets/css/posts.css">
    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <title>Searching</title>
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
        <div class="container_main">
            <div class="header_main">
                <div class="main_nav">
                    <a href="." class="main_nav_link">Home</a>
                    <span> / </span>
                    <a href="./?act=post" class="main_nav_link">Posts</a>
                </div>
                <div class="find_login">
                    <form action="?act=search" method="post" class="search">
                        <input type="text" class="input_search" name="keyword" placeholder="Search...">
                        <i class='bx bx-search'></i>
                        <input type="submit" value="Search" name = "search" id="search" class = "btn_search">
                    </form>
                    <div class="box_login">
                    <?php
                        if(isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo '<a href="#" class="herf_login">'.$username.'</a>
                            <span>/</span>
                                <a href="?act=logout" class="herf_login">Logout</a>';
                        } else {
                            echo '<a href="./viewUser/login.php" class="herf_login">Login</a>
                            <span>/</span>
                            <a href="./admin/auth/signup.php" class="herf_signup">Sign Up</a>';
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="content_main">
                <div class="wrapper_post">
                    <h2 class="title_search">Search results for "<?=$keyWord?>"</h2>
                    <div class="posts">
                        <?php
                            if(count($resultSearch) > 0) {
                                showAllPost($resultSearch, $allComment);
                            } else {
                                echo '<div class="box__not_found_result">
                                        <img src="./uploads/no-found-result.jpg" alt="Not found result for your search">
                                        <span class = "title_not_found">Không tìm thấy kết quả nào phù hợp</span>
                                    </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
         <!-- footer -->
         <?php
            footer();
        ?>
    </div>
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
<script src="./assets/javascript/myblog.js"></script>
</html>
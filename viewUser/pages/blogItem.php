    <link rel="stylesheet" href="./assets/css/posts.css">
    <link rel="stylesheet" href="./assets/css/itempost.css">
    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title><?= $onePost[0]['title'] ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <a href="." class="logo">
                <img src="./uploads/logo.png" alt="" class="img_logo">
            </a>
            <i class='bx bx-menu menu_btn hide_on_laptop hide_on_tablet'></i>
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
                        if (isset($_SESSION['userId'])) {
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
                    <a href="post.html" class="main_nav_link">All post</a>
                    <span> / </span>
                    <a href="./post-<?=$onePost[0]['id']?>/<?php echo vn_to_str($onePost[0]["title"])?>.html" class="main_nav_link"> <?= $onePost[0]['title'] ?> </a>
                </div>
                <div class="find_login">
                    <form action="search.html" method="post" class="search">
                        <input type="text" class="input_search" name="keyword" placeholder="Search...">
                        <i class='bx bx-search'></i>
                        <input type="submit" value="Search" name="search" id="search" class="btn_search">
                    </form>
                    <div class="box_login">
                        <?php
                        if (isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo '<a href="#" class="herf_login">' . $username . '</a>
                                <span>/</span>
                                    <a href="?act=logout" class="herf_login">Logout</a>';
                        } else {
                            echo '<a href="./admin/auth/login.php" class="herf_login">Login</a>
                                <span>/</span>
                                <a href="./admin/auth/signup.php" class="herf_signup">Sign Up</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content_main">
                <div class="wrapper_post">
                    <h1 class="title hide_on_blog">Posts</h1>
                    <div class="box_post_item">
                        <div class="user_post">
                            <img src="https://th.bing.com/th/id/OIP.IhLi5SNoTJG7at5pDZ4_wAHaHa?pid=ImgDet&rs=1" alt="" class="avatar">
                            <div class="infor_user">
                                <span class="name_user">Admin</span>
                                <span class="time_post"> Post at <?= $onePost[0]['time_post'] ?></span>
                            </div>
                        </div>
                        <h2 class="title_item_post"> <?= $onePost[0]['title'] ?> </h2>
                        <div class="main_content_item">
                            <img src="<?= $onePost[0]['img'] ?>" alt="" class="img_item_post">
                            <div class="main_content_item_post"><?= $onePost[0]['content'] ?></div>
                        </div>
                        <div class="share_post">
                            <ul class="list_share">
                                <li class="share_item"><a href="#" class="share_item_link"><i class='bx bx-link'></i> Share this post</a></li>
                            </ul>
                        </div>
                        <?php
                        $numberComment = 0;
                        $idPost = $onePost[0]['id'];
                        foreach ($allComment as $itemComment) {
                            if ($itemComment['idPost'] == $idPost) {
                                $numberComment++;
                            }
                        }
                        ?>
                        <div class="box_action">
                            <div class="show_comments">
                                <span class="number_comment"><?= $onePost[0]['view'] + 1 ?></span>
                                <span class="comment_title">viewed / </span>
                                <span class="number_comment"><?= $numberComment ?></span>
                                <span class="comment_title">comments</span>
                            </div>
                            <iframe class="share_post_frame" src="" width="87" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                </div>
                <div class="box_user_comment">
                    <h2 class="title_box_comment">
                        comments
                    </h2>
                    <?php
                        $idUser = "";
                        if (isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                            $idUser = $_SESSION['userId'];
                            foreach ($allUser as $itemUser) {
                                if ($idUser == $itemUser['id']) {
                                    $avatar = $itemUser['avatar'];
                                    if ($avatar == NULL) {
                                        $avatar = "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/03/17/trend-avatar-1.jpg";
                                    }
                                    break;
                                }
                            }
                            echo '<div class = "wrapper__comment_box">
                                    <div class = "box__avatar_comment avatar__mini">
                                        <img src="./uploads/'. $avatar .'" alt="Avatar" class = "avatar_peronal">
                                    </div>
                                    <div class = "comment_box">
                                            <input type="hidden" name="idPost" value = "'. $_GET['id']. '">
                                            <input required type="text" placeholder="Enter your comment here" name = "comment" class = "input_comment">
                                            <div class="wrapper_btn">
                                                <button type="reset" name="cancel" onclick = "clearInputComment()">Cancel</button>
                                                <span class = "input_submit" onclick="comment('.$itemUser['id'].', '.$_GET['id'].')">Comment</span>
                                            </div>
                                    </div>
                            </div>';
                        } else {
                            echo '<div class="box_login not_login">
                                    <a href="./viewUser/login.php" class="herf_login" target = "_parent">Please log in to comment</a>
                                </div>';
                        } 
                        ?>
                    <div class="box_list_comment">
                        <ul class="list_comment">
                            <?php
                                showComment($allComment, $allUser, $idPost,$idUser);
                            ?>
                        </ul>
                    </div>
                </div>
        </div>
        <!-- footer -->
        <?php
            footer();
        ?>
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
<script src="./assets/javascript/itempost.js"></script>
<script src="./assets/javascript/myblog.js"></script>
<script src="./assets/javascript/Ajax/comment.js"></script>
</html>
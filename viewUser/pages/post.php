
    <link rel="stylesheet" href="./assets/css/posts.css">
    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>All post</title>
    <script>
        // filter by category ajax
        function postFilter() {
            let filterValue = $('#filter').val();
            if(filterValue != 0) {
                $.ajax({
                    url: './viewUser/components/filterPost.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        filterValue: filterValue
                    }
                }).done(function(result) {
                    $('.box_post').html(result);
                });
                document.querySelector('.page').innerHTML = "";
            } else {
                window.location.reload();
            }
        }
    </script>
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
                                echo '<a href="./viewUser/login.php" class="item_nav_link">Personal</a>';
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container_main">
            <div class="header_main">
                <div class="main_nav">
                    <a href="." class="main_nav_link">Home</a>
                    <span class = "hide_on_mobile"> / </span>
                    <a href="post.html" class="main_nav_link">All Posts</a>
                </div>
                <div class="find_login">
                    <form action="search.html" method="post" class="search">
                        <input type="text" class="input_search" name = "keyword" placeholder="Search...">
                        <i class='bx bx-search'></i>
                        <input type="submit" value="Search" name = "search" id="search" class = "btn_search">
                    </form>
                    <div class="box_login">
                    <!--  render btn login if user  has logged in -->
                    <?php
                        if(isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo '<a href="personal.html" class="herf_login">'.$username.'</a>
                            <span>/</span>
                                <a href="?act=logout" class="herf_login">Logout</a>';
                        } else {
                            echo '<a href="login.html" class="herf_login">Login</a>
                            <span>/</span>
                            <a href="./admin/auth/signup.php" class="herf_signup">Sign Up</a>';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="content_main">
                <div class="wrapper_post">
                    <h2 class="title hide_on_blog">Posts</h2>
                    <div class="posts">
                        <!-- filter follow danh mục -->
                        <div class="filter_post">
                            <select name="" id="filter" onchange="postFilter()" >
                                <option value="0">----- All -----</option>
                                <?php
                                    if(isset($allNav) && count($allNav) > 0) {
                                        foreach($allNav as $itemNav) {
                                            if($itemNav['status'] == 1) {
                                                echo '<option value="'.$itemNav['id'].'">'.$itemNav['name'].'</option>';
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="box_post">
                            <!-- show all post get by sql -->
                            <?php
                                showAllPost($pagePost, $allComment);
                            ?>
                        </div>
                    </div>
                    <div class="page">
                        <div class="current_page">
                            <?php
                                $pages = $pages == 0 ? 1: $pages;
                                echo '<span>Page '.$pageNumber.' / '.$pages.'</span>';
                            ?>
                        </div>
                        <ul class="list_page">
                            <?php
                                if($pageNumber > 1) {
                                    $prePage = $pageNumber - 1;
                                    echo '<li class="page_item"><a href="./posts/page-'.$prePage.'.html" class="page_item_link" ><i class="bx bx-chevron-left" ></i></a></li>';
                                }
                            ?>
                            <?php
                                if($pages <= 1) {
                                    echo '<li class="page_item"><a href="./posts/page-1.html"" class="page_item_link">1</a></li>';
                                } else {
                                    for($i = 1; $i <= $pages; $i++) {
                                        if($pageNumber == $i) {
                                            echo '<li class="page_item active"><a href="./posts/page-'.$i.'.html"" class="page_item_link">'.$i.'</a></li>';
                                        } else {
                                            echo '<li class="page_item"><a href="./posts/page-'.$i.'.html"" class="page_item_link">'.$i.'</a></li>';
                                        }
                                    }
                                }
                            ?>
                            <?php
                                if($pageNumber < $pages) {
                                    $nextPage = $pageNumber + 1;
                                    echo '<li class="page_item"><a href="./posts/page-'.$nextPage.'.html"" class="page_item_link"><i class="bx bx-chevron-right"></i></a></li>';
                                }
                            ?>
                        </ul>
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

    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <link rel="stylesheet" href="./assets/css/personal.css">
    <title>Personal</title>
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
                        <a href="" class="item_nav_link">Personal</a>
                    </li>
                    <!-- <li class="item_nav">
                        <a href="" class="item_nav_link">Awards</a>
                    </li> -->
                </ul>
            </div>
        </div>
        <section class="container_main">
            <div class="wrapper_profile">
                <div class="profile_nav">
                    <h2 class="title_personal">Personal Profile</h2>
                </div>
                <div class="profile_main">
                    <div class="profile_main_title info_personal active">
                        <div class="container_main_profile" id = "thongtintaikhoan">
                            <div class="box_avatar">
                                <h2>Account Information</h2>
                                <?php
                                    if($oneUser[0]['avatar'] != NULL){
                                        echo '<img src="./uploads/'.$oneUser[0]['avatar'].'" alt="" class = "avatar_peronal">';
                                    } else {
                                        echo '<img src="https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/03/17/trend-avatar-1.jpg" alt="" class = "avatar_peronal">';
                                    }
                                ?>
                            </div>
                            <div class="box_wrapper_info">
                                <div class="wrapper_infor">
                                    <span class="title_infor">Fullname:</span>
                                    <span class="main_infor"><?=$oneUser[0]['name']?></span>
                                </div>
                                <div class="wrapper_infor">
                                    <span class="title_infor">Email:</span>
                                    <span class="main_infor"><?=$oneUser[0]['email']?></span>
                                </div>
                                <button class = "change_info">Change Information</button>
                            </div>
                        </div>
                        <div class="container_main_profile update_information">
                            <h2>Update Information</h2>
                            <form action="?act=updateInfor&id=<?=$oneUser[0]['id']?>" method="post" enctype="multipart/form-data">
                                <div class="wrapper_input">
                                    <span class="title_input">Fullname: </span>
                                    <input type="text" value="<?=$oneUser[0]['name']?>" placeholder="Please enter your fullname" name="name" class = "input_infor">
                                </div>
                                <div class="wrapper_input">
                                    <span class="title_input">Email: </span>
                                    <input type="text" value="<?=$oneUser[0]['email']?>" placeholder="Please enter your email" name="email" class = "input_infor">
                                </div>
                                <div class="wrapper_input">
                                    <span class="title_input">Avatar: </span>
                                    <input type="file" name="image" class = "input_infor input_avatar">
                                </div>
                                <div class="wrapper_input show_img_avatar_demo">
                                    <!-- show img desc demo -->
                                </div>
                                <input type="submit" value="Save Information" name = "submit" class = "submit_input">
                            </form>
                        </div>
                    </div>
                </div>
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
<script src="./assets/javascript/personal.js"></script>
</html>
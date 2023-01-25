<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/myblog.css">
    <link rel="stylesheet" href="./assets/css/itempost.css">
    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <title><?=$onePost[0]['title']?></title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo">
                <img src="./uploads/logo.png" alt="" class="img_logo">
            </div>
            <i class='bx bx-menu menu_btn hide_on_laptop hide_on_tablet' ></i>
            <div class="navigation">
                <i class='bx bx-x close_btn hide_on_laptop hide_on_tablet'></i>
                <ul class="list_nav">
                    <li class="item_nav">
                        <a href="." class="item_nav_link">Home</a>
                    </li>
                    <li class="item_nav">
                        <a href="?act=post" class="item_nav_link">All blog</a>
                    </li>
                    <li class="item_nav">
                        <a href="?act=about" class="item_nav_link">About us</a>
                    </li>
                    <li class="item_nav">
                    <?php
                            if(isset($_SESSION['userId'])) {
                                echo '<a href="?act=personal" class="item_nav_link">Personal</a>';
                            } else {
                                echo '<a href="./viewUser/login.php" class="item_nav_link">Personal</a>';
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
                    <a href="" class="main_nav_link">>  <?=$onePost[0]['title']?>  <</a>
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
                                echo '<a href="./admin/login.php" class="herf_login">Login</a>
                                <span>/</span>
                                <a href="./admin/signup.php" class="herf_signup">Sign Up</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content_main">
                <div class="wrapper_post">
                    <h2 class="title hide_on_blog">Posts</h2>
                    <div class="box_post_item">
                        <div class="user_post">
                            <img src="https://th.bing.com/th/id/OIP.IhLi5SNoTJG7at5pDZ4_wAHaHa?pid=ImgDet&rs=1" alt="" class = "avatar">
                            <div class="infor_user">
                                <span class="name_user">Admin</span>
                                <span class="time_post"> Post at <?=$onePost[0]['time_post']?></span>
                            </div>
                        </div>
                        <h2 class="title_item_post"> <?=$onePost[0]['title']?> </h2>
                        <div class="main_content_item">
                            <img src="<?=$onePost[0]['img']?>" alt="" class="img_item_post">
                            <div class = "main_content_item_post"><?=$onePost[0]['content']?></div>
                        </div>
                        <div class="share_post">
                            <ul class="list_share">
                                <li class="share_item"><a href="#" class="share_item_link"><i class='bx bx-link' ></i> Share this post</a></li>
                            </ul>
                        </div>
                        <?php
                            $numberComment = 0;
                            foreach($allComment as $itemComment) {
                                if($itemComment['idPost'] ==  $onePost[0]['id']){
                                    $numberComment++;
                                }
                            }
                        ?>
                        <div class="box_action">
                            <div class="show_comments">
                                <span class="number_comment"><?=$onePost[0]['view'] + 1?></span>
                                <span class="comment_title">viewed / </span>
                                <span class="number_comment"><?=$numberComment?></span>
                                <span class="comment_title">comments</span>
                            </div>
                            <iframe  class = "share_post_frame" src="" width="87" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                </div>
                <div class="box_user_comment">
                    <iframe src="./viewUser/comment.php?id=<?=$_GET['id']?>" frameborder="0" class = "frame_box_comment"></iframe>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="contact" id="contact">
                <div class="info_title">
                    <h2 class = "title_contact">Contact<br> us</h2>
                    <span class="contact_email">letankim2003@gmail.com</span>
                </div>
                <div class="space hide_on_laptop">
                    
                </div>
                    <?php
                        if(isset($_POST['submit']) && $_POST['submit']) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $message = $_POST['message'];
                            $resultMain = sendMail("Thank you for using website", "Thank you for contacting us, we will get back to you as soon as possible.",$email, $name, "", "");
                            sendMail("User send message", $message, 'letankim2003@gmail.com', $name, $email, $phone);
                        }
                    ?>
                <form action="" method="post" enctype="multipart/form">
                    <div class="message_contact">
                        <div class="contact_info_user">
                            <input type="text" class="info_user" name = "name" placeholder="Name">
                            <input type="text" class="info_user" name = "email" placeholder="Email">
                            <input type="text" class="info_user" name = "phone" placeholder="Phone">
                        </div>
                        <div class="message">
                            <textarea name="message" id="type_message" cols="30" rows="5" placeholder="Type your message here..."></textarea>
                            <input type="submit" value="SUBMIT" name = "submit" class = "btn btn_submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="main_footer">
                <div class="socials">
                    <a href = "" class="box_social">
                        <i class='bx bxl-facebook-circle'></i>
                    </a>
                    <a href = "" class="box_social">
                        <i class='bx bxl-twitter' ></i>
                    </a>
                    <a href = "" class="box_social">
                        <i class='bx bxl-instagram' ></i>
                    </a>
                    <a href = "" class="box_social">
                        <i class='bx bxl-linkedin' ></i>
                    </a>
                </div>
                <div class="copyright">
                    <span class="content_copyright">Copyright by letankim2003@gmail.com</span>
                </div>
            </div>
        </div>
        <div class="back_to_top">
            <i class='bx bx-chevron-up' ></i>
        </div>
        <div class="chat_now hide_on_mobile">
            <i class='bx bxl-messenger' ></i>
        </div>
    </div>
    <article></article>
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
<script src="./assets/javascript/itempost.js"></script>
<script src="./assets/javascript/myblog.js"></script>
</html>
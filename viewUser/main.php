<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/homeRespon.css">
    <title>Trang chủ</title>
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
                        <a href="index.php" class="item_nav_link">Home</a>
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
                    <h2 class="title">Posts</h2>
                    <div class="posts">
                        <?php
                            if(count($pagePost) > 0)  {
                                foreach($pagePost as $itemPost) {
                                    $numberComment = 0;
                                    foreach($allComment as $itemComment) {
                                        if($itemComment['idPost'] ==  $itemPost['id']){
                                            $numberComment++;
                                        }
                                    }
                                    if($itemPost['status'] == 1) {
                                        echo '<div class="post_item">
                                                <a href = "?act=blogItem&id='.$itemPost['id'].'" class="img_post">
                                                    <img src="./uploads/'.$itemPost['img'].'" alt="">
                                                </a>
                                                <div class="wraper_content_item">
                                                    <div class="user_post">
                                                        <img src="https://th.bing.com/th/id/OIP.IhLi5SNoTJG7at5pDZ4_wAHaHa?pid=ImgDet&rs=1" alt="" class = "avatar">
                                                        <div class="infor_user">
                                                            <span class="name_user">Admin</span>
                                                            <span class="time_post">'.$itemPost['time_post'].'</span>
                                                        </div>
                                                    </div>
                                                    <a href="?act=blogItem&id='.$itemPost['id'].'" class = "post_content">
                                                        <h3 class="title_post">'.$itemPost['title'].'</h3>
                                                        <session class="short_desc">'.$itemPost['content'].'</ả>
                                                    </a>
                                                    <div class="post_actions">
                                                        <div class="left_action">
                                                            <div class="wrapper_action">
                                                                <i class="bx bx-show-alt"></i>
                                                                <span class="numbers">'.$itemPost['view'].'</span>
                                                            </div>
                                                            <div class="wrapper_action">
                                                                <i class="bx bx-message" ></i>
                                                                <span class="numbers">'.$numberComment.'</span>
                                                            </div>
                                                        </div>
                                                        <div class="right_action">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                }
                            } else {
                                echo '<p>Chưa có bài post nào</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
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
                            <input required type="text" class="info_user" name = "name" placeholder="Name">
                            <input required type="text" class="info_user" name = "email" placeholder="Email">
                            <input required type="text" class="info_user" name = "phone" placeholder="Phone">
                        </div>
                        <div class="message">
                            <textarea required name="message" id="type_message" cols="30" rows="5" placeholder="Type your message here..."></textarea>
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
        <?php
            if(count($oneAdver) == 1) {
                echo '<div class="overlay_ad"></div>
                        <div class="box_advertisement">
                            <div class="box_btn_close">
                                <i class="bx bx-x close_ad"></i>
                            </div>
                            <a href="'.$oneAdver[0]['link_adver'].'" class="wrapper_advertisement">
                                <img src="'.$oneAdver[0]['img_adver'].'" alt="" class="img_ad">
                            </a>
                        </div>';

            }
        ?>
    </div>
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
</html>
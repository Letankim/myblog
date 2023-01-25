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
    <link rel="stylesheet" href="./assets/css/aboutus.css">
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
        <div class="footer">
            <div class="contact">
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
</body>
<script src="./assets/javascript/app.js"></script>
<script src="./assets/javascript/mobileApp.js"></script>
</html>
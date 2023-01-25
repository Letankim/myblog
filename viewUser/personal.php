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
    <link rel="stylesheet" href="./assets/css/personal.css">
    <title>Personal</title>
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
                        <a href="?act=blogItem" class="item_nav_link">About us</a>
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
<script src="./assets/javascript/personal.js"></script>
</html>
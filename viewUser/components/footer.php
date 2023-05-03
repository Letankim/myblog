<?php
if (isset($_POST["submit"]) && $_POST["submit"]) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $resultMain = sendMail("Thank you for using website", "Thank you for contacting us, we will get back to you as soon as possible.", $email, $name, "", "");
    sendMail("User send message", $message, "letankim2003@gmail.com", $name, $email, $phone);
}
function footer()
{
    echo '<div class="footer">
            <div class="contact" id="contact">
                <div class="info_title">
                    <h2 class="title_contact">Contact<br> us</h2>
                    <span class="contact_email">letankim2003@gmail.com</span>
                </div>
                <div class="space hide_on_laptop">

                </div>
                <form action="" method="post" enctype="multipart/form">
                    <div class="message_contact">
                        <div class="contact_info_user">
                            <div class = "group_input">
                                <input required type="text" class="info_user" name="name" placeholder="Name">
                            </div>
                            <div class = "group_input">
                                <input required type="text" class="info_user input_email" name="email" placeholder="Email">
                                <span class = "message_error_email">Email không hợp lệ.</span>
                            </div>
                            <div class = "group_input">
                                <input required type="text" class="info_user input_phone" name="phone" placeholder="Phone">
                                <span class = "message_error_phone">SĐT không hợp lệ.</span>
                            </div>
                        </div>
                        <div class="message">
                            <textarea required name="message" id="type_message" cols="30" rows="5" placeholder="Type your message here..."></textarea>
                            <input type="submit" value="SUBMIT" name="submit" class="btn btn_submit btn_submit_send_message">
                        </div>
                    </div>
                </form>
            </div>
            <div class="main_footer">
                <div class="socials">
                    <a href="" class="box_social">
                        <i class="bx bxl-facebook-circle"></i>
                    </a>
                    <a href="" class="box_social">
                        <i class="bx bxl-twitter"></i>
                    </a>
                    <a href="" class="box_social">
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a href="" class="box_social">
                        <i class="bx bxl-linkedin"></i>
                    </a>
                </div>
                <div class="copyright">
                    <span class="content_copyright">Copyright by letankim2003@gmail.com</span>
                </div>
            </div>
        </div>
        <div class="back_to_top">
            <i class="bx bx-chevron-up"></i>
        </div>';
}
?>
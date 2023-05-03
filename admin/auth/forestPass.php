<?php
    session_start();
    ob_start();
    include "../model/connectdb.php";
    include "../model/user.php";
    include "../../mail/sendmail.php";
    $error_message = "";
    if(isset($_POST['submit']) && $_POST['submit']) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $user = forestPass($email, $username);
        if(count($user) > 0) {
            $id = $user[0]['id'];
            $username = $user[0]['username'];
            $email = $user[0]['email'];
            $newPass = implode("",resetPass(8));
            $message = 'New password is '.$newPass.'. Get it to login into website.';
            updateNewPass($id, $newPass);
            $resultReset = sendmail("Reset password", $message, $email, $username, "", "");
            if($resultReset) {
                $error_message = "Reset password is successfully. Check mail to get new password";
            } else {
                $error_message = "Reset password is fail. Try again";
            }
        } else {
            $error_message = "Not found a your account in system!";
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/login.css">
    <title>Sign up</title>
</head>
<body>
    <div class="container_app">
        <div class="wrapper">
            <h2 class = "title">Sign up</h2>
            <div class="body_login">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="box_input">
                        <i class='bx bx-envelope' ></i>
                        <input required type="text" name="email" class = "input" placeholder="Enter your email">
                    </div>
                    <div class="box_input">
                        <i class='bx bxs-user' ></i>
                        <input required type="text" name="username" class = "input" placeholder="Enter your username">
                    </div>
                    <input type="submit" value="Reset password" name = "submit" class = "submit">
                    <p style="color: green; margin-top: 5px;"><?=$error_message?></p>
                    <a href="./login.php" class="page_login">
                        <i class='bx bx-left-arrow-alt' ></i>
                        [Go to login]
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../../assets/javascript/login.js"></script>
</html>
<?php
    session_start();
    ob_start();
    include "./model/connectdb.php";
    include "./model/user.php";
    $error_message = "";
    if(isset($_POST['submit']) && $_POST['submit']) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(count(checkUserName($username)) > 0 && checkUserName($username)[0] != "") {
            $error_message = "Tên đăng nhập đã tồn tại!";
        } else {
            addUserSignup($email, $username, $password);
            $error_message = "Đăng kí thành công";
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
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Sign up</title>
</head>
<body>
    <div class="container_app">
        <div class="wrapper">
            <h2 class = "title">Sign up</h2>
            <div class="body_login">
                <form action="" method="post">
                    <div class="box_input">
                        <i class='bx bx-envelope' ></i>
                        <input required type="text" name="email" class = "input" placeholder="Enter your email">
                    </div>
                    <div class="box_input">
                        <i class='bx bxs-user' ></i>
                        <input required type="text" name="username" class = "input" placeholder="Enter your username">
                    </div>
                    <div class="box_input box_input_pass active">
                        <i class='bx bxs-lock' ></i>
                        <input required type="password" name="password" class = "input input_pass pass" placeholder="Enter your password">
                        <i class='bx bx-show interact' ></i>
                        <i class='bx bx-hide interact' ></i>
                    </div>
                    <div class="box_input box_input_pass active">
                        <i class='bx bxs-lock' ></i>
                        <input required type="password" name="conform_password" class = "input input_pass conform" placeholder="Conform your password">
                    </div>
                    <input type="submit" value="Sign up" name = "submit" class = "submit">
                    <p style="<?php if(count(checkUserName($username)) > 0 && checkUserName($username)[0] != "") {echo 'color:red;';} else {echo 'color:blue;';}?> margin-top: 5px; font-weight: bold;"><?=$error_message?></p>
                    <a href="./login.php" class="page_login">
                        <i class='bx bx-left-arrow-alt' ></i>
                        [Go to login]
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../assets/javascript/login.js"></script>
</html>
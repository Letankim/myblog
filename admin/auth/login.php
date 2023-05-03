<?php
    session_start();
    ob_start();
    include "../model/connectdb.php";
    include "../model/user.php";
    $error_message = "";
    if(isset($_POST['submit']) && $_POST['submit']) {
        $allUser = getAllUsers();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = login($username, $password);
        if(count($user) > 0 && $user[0]['status'] == 1) {
            if($user[0]['role'] == 1) {
                $_SESSION['roleAdmin'] = $user[0]['role'];
                $_SESSION['usernameAdmin'] = $user[0]['username'];
                header("Location: ../index.php?act=trangchu");
            } else {
                $_SESSION['roleUser'] = $user[0]['role'];
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION["userId"] = $user[0]['id'];
                $_SESSION["avatar"] = $user[0]['avatar'];
                header("Location: ../../");
            }
        } else if(count($user) > 0 && $user[0]['status'] == 0) {
            $error_message = "Tài khoản của bạn đang bị tạm khóa.";
        } else {
            $error_message = "Tài khoản hoặc mật khẩu không chính xác.";
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
    <title>Login</title>
</head>
<body>
    <div class="container_app">
        <div class="wrapper">
            <h2 class = "title">Login</h2>
            <div class="body_login">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="box_input">
                        <i class='bx bxs-user' ></i>
                        <input required type="text" name="username" class = "input" placeholder="Enter your username">
                    </div>
                    <div class="box_input box_input_pass active">
                        <i class='bx bxs-lock' ></i>
                        <input required type="password" name="password" class = "input input_pass" placeholder="Enter your password">
                        <i class='bx bx-show interact' ></i>
                        <i class='bx bx-hide interact' ></i>
                    </div>
                    <a href="./forestPass.php" class="forest_pass">Forgot Password</a>
                    <input type="submit" value="Login" name = "submit" class = "submit">
                    <span style="color:red; display: block; margin-top: 5px; font-weight: bold;"><?=$error_message?></span>
                    <span class="or">Or</span>
                    <a href="./signup.php" class="sign_up">Sign Up</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../../assets/javascript/login.js"></script>
</html>
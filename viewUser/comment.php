<?php
    session_start();
    ob_start();
    include "../admin/model/connectdb.php";
    include "../admin/model/comment.php";
    include "../admin/model/user.php";
    if(isset($_POST['submit']) && $_POST['submit']) {
        $comment = $_POST['comment'];
        $idUser = $_SESSION['userId'];
        $idPost = $_POST['idPost'];
        $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date= date('Y/m/d H:i:s');
        addComment($comment, $idUser, $idPost, $date);
    }
    if(isset($_GET['act'])) {
        switch($_GET['act']) {
            case "deleteComment":
                if(isset($_GET['idComment']) && $_GET['idComment']) {
                    $id= $_GET['idComment'];
                    deleteComment($id);
                }
                header('Location: comment.php?act=&id='.$_GET['id'].'');
                break;
        }
    }
    $allComment = getAllComment();
    $allUser = getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myblog.css">
    <link rel="stylesheet" href="../assets/css/itempost.css">
    <link rel="stylesheet" href="../assets/css/homeRespon.css">
</head>
<body>
    <h2 class="title_box_comment">
        comments
    </h2>
    <div class="box_form_comment">
        <?php
            if(isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 0 && isset($_SESSION['username'])) {
                foreach($allUser as $itemUser) {
                    if($_SESSION['userId'] == $itemUser['id']) {
                        $avatar = $itemUser['avatar'];
                        if($avatar == NULL){
                            $avatar = "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/03/17/trend-avatar-1.jpg";
                        }
                        break;
                    }
                }
                echo '  <img src="../uploads/'.$avatar.'" alt="" class = "avatar_peronal">
                        <form class = "comment_box" action="comment.php?act=&id='.$_GET['id'].'" method="post">
                                <input type="hidden" name="idPost" value = "'.$_GET['id'].'">
                                <input type="text" placeholder="Enter your comment here" name = "comment" class = "input_comment">
                                <div class="wrapper_btn">
                                    <button type="reset" name="cancel">Cancel</button>
                                    <input type="submit" value="Publish" name = "submit" class = "input_submit">
                                </div>
                        </form>';
            } else {
                echo '<div class="box_login not_login">
                        <a href="../viewUser/login.php" class="herf_login" target = "_parent">Please log in to comment</a>
                    </div>';
            }
        ?>
    </div>  
    <div class="box_list_comment">
        <ul class="list_comment">
            <?php
                if(count($allComment) > 0) {
                    $check = true;
                    foreach ($allComment as $comment) {
                       if($comment['idPost'] == $_GET['id']) {
                            $check = false;
                            foreach($allUser as $itemUser) {
                                if($itemUser['id'] == $comment['idUser']) {
                                    $username = $itemUser['username'];
                                    $avatar = '../uploads/'.$itemUser['avatar'].'';
                                    if($itemUser['avatar'] == NULL) {
                                        $avatar = "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/03/17/trend-avatar-1.jpg"; 
                                    }
                                    break;
                                }
                            }
                            if(isset($_SESSION['userId']) &&$_SESSION['userId'] == $comment['idUser']) {
                                echo '<li class="item_comment">
                                    <img src="'.$avatar.'" alt="" class = "avatar">
                                    <div class="box_info_comment">
                                        <div class="box_content_comment">
                                            <div class="name_user_comment">
                                            <span class="username">'.$username.'</span>
                                                <span class="time_comment">'.$comment['time_comment'].'</span>
                                            </div>
                                            <span class="comment_content">'.$comment['comment'].'</span>
                                        </div>
                                        <div class="action_comment">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                            <ul class="list_action">
                                                <li class="item_action delete"><a href="comment.php?act=deleteComment&idComment='.$comment['id'].'&id='.$_GET['id'].'" class="action_link">Xóa</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>';
                            } else {
                                echo '<li class="item_comment">
                                    <img src="'.$avatar.'" alt="" class = "avatar">
                                    <div class="box_info_comment">
                                        <div class="box_content_comment">
                                            <div class="name_user_comment">
                                            <span class="username">'.$username.'</span>
                                                <span class="time_comment">'.$comment['time_comment'].'</span>
                                            </div>
                                            <span class="comment_content">'.$comment['comment'].'</span>
                                        </div>
                                    </div>
                                </li>';
                            }
                       }
                    }
                    if($check) {
                        echo 'Chưa có comment nào';
                    }
                } else {
                    echo 'Chưa có comment nào';
                }
            ?>
        </ul>
    </div> 
</body>
<script src="../assets/javascript/app.js"></script>
<script src="../assets/javascript/mobileApp.js"></script>
<script src="../assets/javascript/itempost.js"></script>
<script>
    var allDel = document.querySelectorAll('.delete');
    [...allDel].forEach(function(item) {
        item.addEventListener('click', function(e) {
            if(confirm("Are you sure to delete?") == false) {
                e.preventDefault();
            }
        })
    })
</script>
</html>
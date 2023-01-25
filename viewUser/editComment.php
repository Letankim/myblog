<?php
     session_start();
     ob_start();
     include "../admin/model/connectdb.php";
     include "../admin/model/comment.php";
     $allComment = getAllComment();
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
        <i class='bx bx-user-circle' ></i>
        <form action="comment.php?act=&id=<?=$_GET['id']?>" method="post">
            <input type="hidden" name="idPost" value = "<?=$_GET['id']?>">
            <input type="hidden" name="idComment" value = "<?=$oneComment[0]['id']?>">
            <input type="text" placeholder="Enter your comment here" value = "<?=$oneComment[0]['comment']?>" name = "comment" class = "input_comment">
            <div class="wrapper_btn">
                <button type="reset" name="cancel">Cancel</button>
                <input type="submit" value="Update" name = "submit" class = "input_submit">
            </div>
        </form>
    </div>  
    <div class="box_list_comment">
        <ul class="list_comment">
            <?php
                if(count($allComment) > 0) {
                    foreach ($allComment as $comment) {
                       if($comment['idPost'] == $_GET['id']) {
                            echo '<li class="item_comment">
                                    <i class="bx bx-user-circle" ></i>
                                    <div class="box_info_comment">
                                        <div class="box_content_comment">
                                            <span class="comment_content">'.$comment['comment'].'</span>
                                            <span class="time_comment">'.$comment['time_comment'].'</span>
                                        </div>
                                        <div class="action_comment">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                            <ul class="list_action">
                                                <li class="item_action"><a href="comment.php?act=editComment&idComment='.$comment['id'].'&id='.$_GET['id'].'" class="action_link">Chỉnh sửa</a></li>
                                                <li class="item_action"><a href="comment.php?act=deleteComment&idComment='.$comment['id'].'&id='.$_GET['id'].'" class="action_link">Xóa</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>';
                       }
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
</html>
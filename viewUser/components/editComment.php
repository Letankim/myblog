<?php
    session_start();
    ob_start();
    include "../../admin/model/connectdb.php";
    include "../../admin/model/comment.php";
    $idComment = $_POST['idComment'];
    $comment = getOneComment($idComment);
    echo '
        <input type="hidden" name="idComment" value = "">
        <input type="text" placeholder="Enter your comment here" value = "'.$comment[0]['comment'].'" name = "comment" class = "input_comment">
        <div class="wrapper_btn">
            <input type="submit" value="Update" name = "submit" class = "input_submit">
        </div>';
?>
        
    
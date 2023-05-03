<?php
    session_start();
    ob_start();
    include "../../admin/model/connectdb.php";
    include "../../admin/model/comment.php";
    include "../../admin/model/user.php";
    include "../components/showComment.php";
    $idPost = $_POST['idPost'];
    $idUser = $_POST['idUser'];
    if(isset($_POST['idComment'])) {
        deleteComment($_POST['idComment']);
    } else {
        $comment = $_POST['comment'];
        $idUser = $_POST['idUser'];
        $time = $_POST['time'];
        addComment($comment, $idUser, $idPost, $time);
    }
    $allComment = getAllCommentByIdPost($idPost);
    $allUser = getAllUsers();
    showComment($allComment, $allUser, $idPost,$idUser)
?>
       
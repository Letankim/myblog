<?php
    include "../../model/connectdb.php";
    include "../../model/post.php";
    include "../handleShow/showPost.php";
    include "../../model/user.php";
    include "../../model/comment.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusPost($id, $status);
    $allPost = getAllPost();
    $allComments = getAllComment();
    $allUsers = getAllUsers();
    showPost($allPost,$allComments,$allUsers);
?>
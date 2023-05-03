<?php
    include "../../model/connectdb.php";
    include "../../model/post.php";
    include "../../model/user.php";
    include "../../model/comment.php";
    include "./showPost.php";
    $navId = $_POST['navId'];
    $allComments = getAllComment();
    $allUsers = getAllUsers();
    $filterResult;
    if($navId == -1) {
        $filterResult = getAllPost();
    } else {
        $filterResult = getFilterPost($navId);
    }
    showPost($filterResult, $allComments, $allUsers);
?>
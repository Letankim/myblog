<?php
    session_start();
    ob_start();
    include "../../admin/model/connectdb.php";
    include "../../admin/model/post.php";
    include "../../admin/model/comment.php";
    include "../../admin/model/navigation.php";
    include "./nameLink.php";
    include "./allPost.php";
    $idNav = $_POST['filterValue'];
    $resultFilterPost = getFilterPost($idNav);
    $allComment = getAllComment();
    showAllPost($resultFilterPost,$allComment);
?>
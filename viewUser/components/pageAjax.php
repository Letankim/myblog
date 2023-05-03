<?php
    session_start();
    ob_start();
    include "../admin/model/connectdb.php";
    include "../admin/model/post.php";
    include "../admin/model/comment.php";
    include "../admin/model/navigation.php";
    $idNav = $_POST['filterValue'];
    if($idNav != 0) {
        echo "";
    }
?>
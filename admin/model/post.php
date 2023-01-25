<?php
    function getAllPost() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_post ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function pagePosts($page, $countPage) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_post ORDER BY id DESC LIMIT $page, $countPage");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addPost($idNav, $title, $content ,$img ,$status, $date) {
        $conn = connect();
        $sql = "INSERT INTO tbl_post (title, content, img, status, id_nav, time_post) VALUES ('".$title."', '".$content."', '".$img."', '".$status."', '".$idNav."', '".$date."')";
    // use exec() because no results are returned
        $conn->exec($sql);
    }
    function getOnePost($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_post WHERE id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getFilterPost($idNav) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_post WHERE id_nav=$idNav");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getSearch($keyWord) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_post WHERE (`title` LIKE '%".$keyWord."%')");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function updatePost($id, $idNav, $title, $content ,$img ,$status, $date, $view) {
        $conn = connect();
        if($img != "") {
            $sql ="UPDATE tbl_post SET title='".$title."',  content='".$content."', img='".$img."', status='".$status."', id_nav ='".$idNav."', time_post ='".$date."', view='".$view."' WHERE id=$id";
        } else {
            $sql ="UPDATE tbl_post SET title='".$title."',  content='".$content."', status='".$status."', id_nav ='".$idNav."', time_post ='".$date."', view='".$view."' WHERE id=$id";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function updateView($id, $view) {
        $conn = connect();
        $sql = "UPDATE tbl_post SET view='".$view."' WHERE id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function deletePost($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_post WHERE id=$id";
        $conn->exec($sql);
    }
?>
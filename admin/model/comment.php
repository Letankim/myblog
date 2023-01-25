<?php
    function getAllComment() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_comment ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getOneComment($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_comment WHERE id =$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function  addComment($comment, $idUser, $idPost, $date) {
        $conn = connect();
        $sql = "INSERT INTO tbl_comment (comment, idUser, idPost, time_comment) VALUES ('".$comment."', '".$idUser."', '".$idPost."', '".$date."')";
    // use exec() because no results are returned
        $conn->exec($sql);
    }
    function deleteComment($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_comment WHERE id=$id";
        $conn->exec($sql);
    }
    function deleteCommentPost($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_comment WHERE idPost=$id";
        $conn->exec($sql);
    }
?>
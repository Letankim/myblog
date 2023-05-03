<?php
    function getAllSlogan() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_slogan ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getFilterSlogan($status) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_slogan WHERE status=$status ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getOneSlogan($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_slogan WHERE id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addSlogan($topSlogan, $bottomSlogan, $status) {
        $conn = connect();
        $sql = "INSERT INTO tbl_slogan (topslogan, bottomslogan,status) VALUES ('".$topSlogan."','".$bottomSlogan."','".$status."')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function updateSlogan($id, $topSlogan, $bottomSlogan, $status) {
        $conn = connect();
        $sql = "UPDATE tbl_slogan SET topslogan='".$topSlogan."', bottomslogan='".$bottomSlogan."', status='".$status."' WHERE id='".$id."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function updateStatusSlogan($id, $status) {
        $conn = connect();
        $sql = "UPDATE tbl_slogan SET status='".$status."' WHERE id='".$id."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function deleteSlogan($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_slogan WHERE id='".$id."'"; //
        $conn->exec($sql);
    }
    function showOneSlogan() {
        $conn = connect();
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_slogan WHERE status=1 ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
?>
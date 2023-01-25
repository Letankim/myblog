<?php
    function getAllBanner() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_banner");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getOneBanner($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_banner WHERE id='$id'");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addBanner($status, $img) {
        $conn = connect();
        $sql = "INSERT INTO tbl_banner (status, img) VALUES ('$status', '$img')";
        $conn->exec($sql);
    }
    function updateBanner($id, $img, $status) {
        $conn = connect();
        if($img != "") {
            $sql = "UPDATE tbl_banner SET status='$status', img = '$img' WHERE id='$id'";
        } else {
            $sql = "UPDATE tbl_banner SET status='$status' WHERE id='$id'";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function deleteBanner($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_banner WHERE id='$id'";
        $conn->exec($sql);
    }
    function showOneBanner() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_banner WHERE status=1 ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
?>
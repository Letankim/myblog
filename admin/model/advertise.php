<?php
    function getAllAdver() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_advertiser ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getOneAdver($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_advertiser WHERE id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addAdver($name, $link, $img, $status) {
        $conn = connect();
        $sql = "INSERT INTO tbl_advertiser (name_program, link_adver, img_adver,status) VALUES ('$name', '$link', '$img', '$status')";
        $conn->exec($sql);
    }
    function updateAdver($id, $name , $link,$img, $status) {
        $conn = connect();
        if($img != "") {
            $sql = "UPDATE tbl_advertiser SET name_program='$name', link_adver='$link', img_adver = '$img', status='$status' WHERE id='$id'";
        } else {
            $sql = "UPDATE tbl_advertiser SET name_program='$name', link_adver='$link', status='$status' WHERE id='$id'";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function deleteAdver($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_advertiser WHERE id='$id'";
        $conn->exec($sql);
    }
    function showOneAdver() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_advertiser WHERE status=1 ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
?>
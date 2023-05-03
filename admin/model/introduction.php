<?php
    function getALlIntro() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_introduction ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getFilterIntro($status) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_introduction WHERE status=$status ORDER BY id DESC");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getIntroShow() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_introduction WHERE status=1 ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function getOneIntro($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_introduction WHERE id='$id'");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addIntro($content, $status, $img) {
        $conn = connect();
        $sql = "INSERT INTO tbl_introduction (content, status, img) VALUES ('$content', '$status', '$img')";
        $conn->exec($sql);
    }
    function updateIntro($id, $content, $img, $status) {
        $conn = connect();
        if($img != "") {
            $sql = "UPDATE tbl_introduction SET status='$status', img = '$img', content = '$content' WHERE id='$id'";
        } else {
            $sql = "UPDATE tbl_introduction SET status='$status', content = '$content' WHERE id='$id'";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function updateStatusIntro($id, $status) {
        $conn = connect();
        $sql = "UPDATE tbl_introduction SET status='$status'WHERE id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function deleteIntro($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_introduction WHERE id='$id'";
        $conn->exec($sql);
    }
?>
<?php
    function getAllNav() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_navigation");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addNav($navigation, $status) {
        $conn = connect();
        $sql = "INSERT INTO tbl_navigation (name, status) VALUES ('$navigation', '$status')";
        // use exec() because no results are returned
        $conn->exec($sql);
    }
    function getOneNav($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_navigation WHERE id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function updateNav($id, $navigation, $status) {
        $conn = connect();
        $sql = "UPDATE tbl_navigation SET name='".$navigation."', status='".$status."' WHERE id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function deleteNav($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_navigation WHERE id=$id";
        $conn->exec($sql);
    }
?>
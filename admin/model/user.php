<?php
    function getAllUsers() {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_user");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function addUser($name, $username, $email, $password, $role, $status) {
        $conn = connect();
        $sql = "INSERT INTO tbl_user (name, username, email, password, role, status) VALUES ('$name', '$username', '$email', '$password', '$role', '$status')";
        $conn->exec($sql);
    }
    function addUserSignup($email, $username, $password) {
        $conn = connect();
        $sql = "INSERT INTO tbl_user (email, username, password) VALUES ('$email', '$username', '$password')";
        $conn->exec($sql);
    }
    function forestPass($email, $username) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE email = '$email'  AND username ='$username'");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function resetPass($soluong) {
        $letterUpper = "ABCDEFGHIJKLMNOQPRSTUYWVZX";
        $letterLower = "abcdefghijklmnoqprstuvwyzx";
        $number = "0123456789";
        $special = "!@#&^?$*";
        $mkmoi = array();
        $tiso = rand(1, 4) % 4;
        for($i = 0; $i < $soluong; $i++) {
            if($tiso == 1) {
                $mkmoi[$i] = $letterUpper[rand(1, 26) % 26];
                $tiso = rand(1, 4) % 4;
            } else if($tiso == 2) {
                $mkmoi[$i] = $letterLower[rand(1, 26) % 26];
                $tiso = rand(1, 4) % 4;
            } else if($tiso == 3) {
                $mkmoi[$i] = $number[rand(1, 10) % 10];
                $tiso = rand(1, 4) % 4;
            } else {
                $mkmoi[$i] = $special[rand(1, 8) % 8];
                $tiso = rand(1, 4) % 4;
            }
        }
        return $mkmoi;
    }
    function getOneUser($id) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE id = '$id'");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ketqua = $stmt->fetchAll();
        return $ketqua;
    }
    function updateUser($id, $name, $username, $email, $password, $role, $status) {
        $conn = connect();
        $sql = "UPDATE tbl_user SET name='$name', username='$username', email='$email', password='$password', role='$role', status='$status' WHERE id='$id'";
        $conn->exec($sql);
    }
    function updateNewPass($id, $newPass) {
        $conn = connect();
        $sql = "UPDATE tbl_user SET password='$newPass' WHERE id='$id'";
        $conn->exec($sql);
    }
    function updateUserPersonal($id, $name, $email, $img) {
        $conn = connect();
        if($img != "") {
            $sql = "UPDATE tbl_user SET name='$name', email='$email', avatar='$img' WHERE id='$id'";
        }else {
            $sql = "UPDATE tbl_user SET name='$name', email='$email' WHERE id='$id'";
        }
        $conn->exec($sql);
    }
    function deleteUser($id) {
        $conn = connect();
        $sql = "DELETE FROM tbl_user WHERE id='$id'";
        $conn->exec($sql);
    }
    function login($username, $password) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = '".$username."' AND password = '".$password."'");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll();
        return $user;
    }
    function checkUserName($username) {
        $conn = connect();
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = '".$username."'");
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll();
        return $user;
    }
?>
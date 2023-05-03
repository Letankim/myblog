<?php
    include "../../model/connectdb.php";
    include "../../model/user.php";
    include "../handleShow/showAccount.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusUser($id, $status);
    $allUser = getAllUsers();
    showAccount($allUser);
?>
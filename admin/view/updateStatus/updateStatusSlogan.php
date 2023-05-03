<?php
    include "../../model/connectdb.php";
    include "../../model/slogan.php";
    include "../handleShow/showSlogan.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusSlogan($id, $status);
    $allSlogan= getAllSlogan();
    showSlogan($allSlogan);
?>
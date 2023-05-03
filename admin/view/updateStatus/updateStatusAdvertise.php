<?php
    include "../../model/connectdb.php";
    include "../../model/advertise.php";
    include "../handleShow/showAdvertise.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusAdver($id, $status);
    $allAdvertise = getAllAdver();
    showAdvertise($allAdvertise);
?>
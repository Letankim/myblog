<?php
    include "../../model/connectdb.php";
    include "../../model/banner.php";
    include "../handleShow/showBanner.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusBanner($id, $status);
    $allBanner = getAllBanner();
    showBanner($allBanner);
?>
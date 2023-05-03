<?php
    include "../../model/connectdb.php";
    include "../../model/navigation.php";
    include "../handleShow/showNavigation.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusNav($id, $status);
    $allNav = getAllNav();
    showNavigation($allNav);
?>
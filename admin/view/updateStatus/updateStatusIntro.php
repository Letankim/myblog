<?php
    include "../../model/connectdb.php";
    include "../../model/introduction.php";
    include "../handleShow/showIntroduction.php";
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status = $status == 1 ? 0 : 1;
    updateStatusIntro($id, $status);
    $allIntroduction= getAllIntro();
    showIntroduction($allIntroduction);
?>
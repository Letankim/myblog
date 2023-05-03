<?php
    include "../../model/connectdb.php";
    include "../../model/navigation.php";
    include "../../model/post.php";
    include "../../model/user.php";
    include "../../model/banner.php";
    include "../../model/introduction.php";
    include "../../model/comment.php";
    include "../../model/slogan.php";
    include "../../model/advertise.php";
    include "../filter.php";
    include "./showNavigation.php";
    include "./showPost.php";
    include "./showBanner.php";
    include "./showAccount.php";
    include "./showIntroduction.php";
    include "./showSlogan.php";
    include "./showAdvertise.php";
    $status = $_POST['status'];
    $typePage = $_POST['typePage'];
    switch ($typePage) {
        case 'Navigation':
        case 'Update navigation':
            if($status == -1) {
                $resultFilter = getAllNav();
            } else {
                $resultFilter = getFilterNav($status);
            }
            showNavigation($resultFilter);
            break;
        case 'Banner':
            if($status == -1) {
                $resultFilter = getAllBanner();
            } else {
                $resultFilter = getFilterBanner($status);
            }
            showBanner($resultFilter);
            break;
        case 'Posts':
        case 'Update post':
            $allComments = getAllComment();
            $allUsers = getAllUsers();
            if($status == -1) {
                $resultFilter = getAllPost();
            } else {
                $resultFilter = getFilterPostByStatus($status);
            }
            showPost($resultFilter, $allComments, $allUsers);
            break;
        case 'Tài khoản':
            if($status == -1) {
                $resultFilter = getAllUsers();
            } else {
                $resultFilter = getFilterUsers($status);
            }
            showAccount($resultFilter);
            break;
        case 'Introduction':
            if($status == -1) {
                $resultFilter = getAllIntro();
            } else {
                $resultFilter = getFilterIntro($status);
            }
            showIntroduction($resultFilter);
            break;
        case 'Slogan':
            if($status == -1) {
                $resultFilter = getAllSlogan();
            } else {
                $resultFilter = getFilterSlogan($status);
            }
            showSlogan($resultFilter);
            break;
        case 'Advertise':
            if($status == -1) {
                $resultFilter = getAllAdver();
            } else {
                $resultFilter = getFilterAdver($status);
            }
            showAdvertise($resultFilter);
            break;
    }
    
?>
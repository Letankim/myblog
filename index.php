<?php
    session_start();
    ob_start();
    include "./admin/model/connectdb.php";
    include "./admin/model/post.php";
    include "./admin/model/banner.php";
    include "./admin/model/comment.php";
    include "./admin/model/user.php";
    include "./admin/model/introduction.php";
    include "./admin/model/slogan.php";
    include "./admin/model/advertise.php";
    include "./admin/model/navigation.php";
    include "./mail/sendmail.php";
    include "./viewUser/components/header.php";
    include "./viewUser/components/footer.php";
    include "./viewUser/components/allPost.php";
    include "./viewUser/components/nameLink.php";
    include "./viewUser/components/showComment.php";
    include "./viewUser/pages/advertise.php";
    if(isset($_GET['act']) && $_GET['act']) {
        switch($_GET['act']) {
            case "trangchu":
                $pagePost = pagePosts(0, 6);
                $oneSlogan = showOneSlogan();
                $oneAdver = showOneAdver();
                $oneBanner = showOneBanner();
                $allComment = getAllComment();
                include "./viewUser/pages/main.php";
                break;
            case "post":
                $allPost = getAllPostActive();
                $pages = ceil(count($allPost) / 5);
                $pageNumber = 1;
                if(isset($_GET['page']) && $_GET['page']) {
                    $pageNumber = $_GET['page'];
                    $page = ($pageNumber - 1) * 5;
                } else {
                    $page = 0;
                }
                $pagePost = pagePosts($page, 5);
                $allComment = getAllComment();
                $allNav = getAllNav();
                include "./viewUser/pages/post.php";
                break;
            case "blogItem":
                if(isset($_GET['id']) && $_GET['id']) {
                    $id = $_GET['id'];
                    $onePost = getOnePost($id);
                    $view = $onePost[0]['view'];
                    updateView($id, ($view + 1));
                }
                $allComment = getAllComment();
                $allUser = getAllUsers();
                include "./viewUser/pages/blogItem.php";
                break;
            case "search":
                if(isset($_POST['search']) && $_POST['search']) {
                    $keyWord = $_POST['keyword'];
                    $resultSearch = getSearch($keyWord);
                }
                $allComment = getAllComment();
                include "./viewUser/pages/search.php";
                break;
            case "personal":
                $id = $_SESSION['userId'];
                $oneUser = getOneUser($id);
                include "./viewUser/pages/personal.php";
                break;
            case "updateInfor":
                if(isset($_POST['submit']) && $_POST['submit']) {
                    $id = $_GET['id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $target_dir = "./uploads/";
                    if($_FILES['image']["name"] != "") {
                        $target_file = $target_dir . basename($_FILES['image']["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            $uploadOk = 0;
                        }
                        if($uploadOk == 1) {
                            move_uploaded_file($_FILES['image']["tmp_name"], $target_file);
                            $img = basename($_FILES['image']["name"]);
                        }
                    } else {
                        $img = "";
                    }
                    updateUserPersonal($id, $name, $email, $img);
                }
                header("location: ?act=personal");
                break;
            case "about":
                $oneIntro = getIntroShow();
                include "./viewUser/pages/introduction.php";
                break;
            case "login":
                header("Location: ./admin/auth/login.php");
                break;
            case "logout":
                if(isset($_SESSION['userId'])  && isset($_SESSION['username'])) {
                    unset($_SESSION['roleUser']);
                    unset($_SESSION['username']);
                    unset($_SESSION['userId']);
                }
                header("Location: index.php");
                break;
            case "signup":
                header("Location: ./admin/auth/signup.php");
                break;
            default:
                
                break;
        }
    } else {
        $oneBanner = showOneBanner();
        $oneSlogan = showOneSlogan();
        $oneAdver = showOneAdver();
        $pagePost = pagePosts(0, 6);
        $allComment = getAllComment();
        include "./viewUser/pages/main.php";
    }
?>
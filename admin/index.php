<?php
    session_start();
    ob_start();
    if(isset($_SESSION['roleAdmin']) && $_SESSION['roleAdmin'] == 1) {
        include "./config/inclu.php";
        if(isset($_GET['act']) && $_GET['act']) {
            $type = $_GET['act'];
            switch($_GET['act']) {
                case "navigation":
                    $allNav = getAllNav();
                    $pages = ceil(count($allNav) / 15);
                    $pageNumber = 1;
                    if(isset($_GET['page']) && $_GET['page']) {
                        $pageNumber = $_GET['page'];
                        $page = ($pageNumber - 1) * 15;
                    } else {
                        $page = 0;
                    }
                    $pageNav = devicePageNavigation($page, 15);
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $navigation = $_POST['navigation'];
                        $status = $_POST['status'];
                        addNav($navigation, $status);
                    }
                    include "./view/navigation.php";
                    break;
                case "editNavForm":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $oneNav = getOneNav($id);
                    }
                    $allNav = getAllNav();
                    include "./view/editForm/editNavForm.php";
                    break;
                case "editNavigation":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $id = $_POST['id'];
                        $navigation = $_POST['navigation'];
                        $status = $_POST['status'];
                        updateNav($id, $navigation, $status);
                    }
                    $allNav = getAllNav();
                    include "./view/navigation.php";
                    header("Location: ?act=navigation");
                    break;
                case "deleteNav":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteNav($id);
                    }
                    $allNav = getAllNav();
                    include "./view/navigation.php";
                    header("Location: ?act=navigation");
                    break;
                case "post":
                    $allPost = getAllPost();
                    $pages = ceil(count($allPost) / 15);
                    $pageNumber = 1;
                    if(isset($_GET['page']) && $_GET['page']) {
                        $pageNumber = $_GET['page'];
                        $page = ($pageNumber - 1) * 15;
                    } else {
                        $page = 0;
                    }
                    $pagePost = pagePosts($page, 15);
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $idNav = $_POST['navigation'];
                        $title = $_POST['title_post'];
                        $shortDesc = $_POST['short_desc'];
                        $content = $_POST['content'];
                        $status = $_POST['status'];
                        $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date= date('Y/m/d H:i:s');
                        // upload ảnh
                        $target_dir = "../uploads/";
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
                            addPost($idNav, $title, $shortDesc,$content ,$img ,$status, $date);
                        }
                    }
                    $allComment = getAllComment();
                    $allUser = getAllUsers();
                    $allNav = getAllNav();
                    include "./view/post.php";
                    break;
                case "editPostForm":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $onePost = getOnePost($id);
                    }
                    $allPost = getAllPost();
                    $allComment = getAllComment();
                    $allUser = getAllUsers();
                    $allNav = getAllNav();
                    include "./view/editForm/editPostForm.php";
                    break;
                case "updatePost":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $id = $_POST['id'];
                        $idNav = $_POST['navigation'];
                        $title = $_POST['title_post'];
                        $shortDesc = $_POST['short_desc'];
                        $content = $_POST['content'];
                        $status = $_POST['status'];
                        $view = $_POST['view'];
                        $zone_Asia_Ho_Chi_Minh = date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date= date('Y/m/d H:i:s');
                        // upload ảnh
                        $target_dir = "../uploads/";
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
                        updatePost($id, $idNav, $title, $shortDesc,$content ,$img ,$status, $date, ($view));
                    }
                    $allPost = getAllPost();
                    $allComment = getAllComment();
                    $allUser = getAllUsers();
                    $allNav = getAllNav();
                    include "./view/post.php";
                    header("Location: ?act=post");
                    break;
                case "deletePost":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deletePost($id);
                        deleteCommentPost($id);
                    }
                    $allPost = getAllPost();
                    $allComment = getAllComment();
                    $allUser = getAllUsers();
                    $allNav = getAllNav();
                    include "./view/post.php";
                    header("Location: ?act=post");
                    break;
                case "deleteComment":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteComment($id);
                    }
                    $allPost = getAllPost();
                    $allComment = getAllComment();
                    $allUser = getAllUsers();
                    $allNav = getAllNav();
                    header("Location: ?act=post");
                    break;
                case "taikhoan":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $name = $_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $role = $_POST['role'];
                        $status = $_POST['status'];
                        addUser($name, $username, $email, $password, $role, $status);
                    }
                    $allUser = getAllUsers();
                    include "./view/user.php";
                    break; 
                case "editUserForm": 
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $oneUser = getOneUser($id);
                    }
                    $allUser = getAllUsers();
                    include "./view/editForm/editUserForm.php";
                    break;
                case "updateUser": 
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $role = $_POST['role'];
                        $status = $_POST['status'];
                        updateUser($id, $name, $username, $email, $password, $role, $status);
                    }
                    $allUser = getAllUsers();
                    include "./view/user.php";
                    header("Location: index.php?act=taikhoan");
                    break; 
                case "deleteUser": 
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteUser($id);
                    }
                    $allUser = getAllUsers();
                    include "./view/user.php";
                    header("Location: index.php?act=taikhoan");
                    break;
                case "banner": 
                    $pageNumberOnPage = 15;
                    $allBanner = getAllBanner();
                    $pages = ceil(count($allBanner)/$pageNumberOnPage);
                    $pageNumber = 1;
                    if(isset($_GET['page']) && $_GET['page']) {
                        $page = ($_GET['page'] - 1) * $pageNumberOnPage;
                    } else {
                        $page = 0;
                    }
                    $pageBanner = devicePageBanner($page , $pageNumberOnPage);
                    if(isset($_POST["submit"]) && $_POST["submit"]) {
                        $status = $_POST["status"].
                        $target_dir = "../uploads/";
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
                            addBanner($status, $img);
                        }
                    }
                    include "./view/banner.php";
                    break;
                case "editBannerForm":
                    if(isset($_GET["id"]) && $_GET["id"]) {
                        $id = $_GET["id"];
                        $oneBanner = getOneBanner($id);
                    } 
                    $allBanner = getAllBanner();
                    include "./view/editForm/editBannerForm.php";
                    break;
                case "updateBanner":
                    if(isset($_POST["submit"]) && $_POST["submit"]) {
                        $id = $_POST["id"];
                        $status = $_POST["status"];
                        if($_FILES['image']['name'] != "") {
                            $target_dir = "../uploads/";
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
                        updateBanner($id, $img, $status);
                    }
                    $allBanner = getAllBanner();
                    include "./view/banner.php";
                    header("Location: index.php?act=banner");
                    break;
                case "deleteBanner":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteBanner($id);
                    }
                    $allBanner = getAllBanner();
                    include "./view/banner.php";
                    header("Location: index.php?act=banner");
                    break;
                case "about": 
                    $allIntro = getAllIntro();
                    include "./view/aboutus.php";
                    break;
                case "addIntro": 
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $content = $_POST['content'];
                        $status = $_POST['status'];
                        $target_dir = "../uploads/";
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
                            addIntro($content, $status, $img);
                        }
                    }
                    header("Location: index.php?act=about");
                    break;
                case "editIntroForm":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $oneIntro = getOneIntro($id);
                    }
                    $allIntro = getAllIntro();
                    include "./view/editForm/editIntroForm.php";
                    break;
                case "updateIntro":
                    if(isset($_POST["submit"]) && $_POST["submit"]) {
                        $id = $_POST["id"];
                        $content = $_POST["content"];
                        $status = $_POST["status"];
                        if($_FILES['image']['name'] != "") {
                            $target_dir = "../uploads/";
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
                        updateIntro($id, $content, $img, $status);
                    }
                    $allIntro = getAllIntro();
                    include "./view/about.php";
                    header("Location: index.php?act=about");
                    break;
                case "deleteIntro":
                    if(isset($_GET["id"]) && $_GET["id"]) {
                        $id = $_GET["id"];
                        deleteIntro($id);
                    }
                    $allIntro = getAllIntro();
                    header("Location: index.php?act=about");
                    break;
                case "slogan":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $topSlogan = $_POST['topSlogan'];
                        $bottomSlogan = $_POST['bottomSlogan'];
                        $status = $_POST['status'];
                        addSlogan($topSlogan, $bottomSlogan, $status);
                    }
                    $allSlogan = getAllSlogan();
                    include "./view/slogan.php";
                    break;
                case "editSloganForm":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $oneSlogan = getOneSlogan($id);
                    }
                    $allSlogan = getAllSlogan();
                    include "./view/editForm/editFormSlogan.php";
                    break;
                case "updateSlogan":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $id = $_POST['id'];
                        $topSlogan = $_POST['topSlogan'];
                        $bottomSlogan = $_POST['bottomSlogan'];
                        $status = $_POST['status'];
                        updateSlogan($id, $topSlogan, $bottomSlogan, $status);
                    }
                    $allSlogan = getAllSlogan();
                    header('location: index.php?act=slogan');
                    break;
                case "deleteSlogan":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteSlogan($id);
                    }
                    $allSlogan = getAllSlogan();
                    header('location: index.php?act=slogan');
                    break;
                case "advertise":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $name = $_POST['name'];
                        $link = $_POST['link'];
                        $status = $_POST['status'];
                        $target_dir = "../uploads/";
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
                        addAdver($name, $link, $img, $status);
                    }
                    $allAdver = getAllAdver();
                    include "./view/advertise.php";
                    break;
                case "editAdverForm":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        $oneAdver = getOneAdver($id);
                    }
                    $allAdver = getAllAdver();
                    include "./view/editForm/editAdverForm.php";
                    break;
                case "updateAdver":
                    if(isset($_POST['submit']) && $_POST['submit']) {
                        $name = $_POST['name'];
                        $link = $_POST['link'];
                        $status = $_POST['status'];
                        $id = $_POST['id'];
                        $target_dir = "../uploads/";
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
                        } else {
                            $img = "";
                        }
                        updateAdver($id, $name , $link,$img, $status);
                    }
                    $allAdver = getAllAdver();
                    header('location: index.php?act=advertise');
                    break;
                case "deleteAdver":
                    if(isset($_GET['id']) && $_GET['id']) {
                        $id = $_GET['id'];
                        deleteAdver($id);
                    }
                    $allAdver = getAllAdver();
                    header('location: index.php?act=advertise');
                    break;
                case "logout":
                    unset($_SESSION['roleAdmin']);
                    unset($_SESSION['usernameAdmin']);
                    header("Location: index.php");
                    break;
                default: 
                    $allPost = getAllPost();
                    $allNav = getAllNav();
                    $allUser = getAllUsers();
                    $allBanner = getAllBanner();
                    include "./view/main.php";
            }
        } else {
            $allPost = getAllPost();
            $allUser = getAllUsers();
            $allNav = getAllNav();
            $allBanner = getAllBanner();
            include "./view/main.php";
        }
        include "./view/footer.php";
    } else {
        header("Location: ../admin/auth/login.php");
    }
?>
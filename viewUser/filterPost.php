<?php
    session_start();
    ob_start();
    include "../admin/model/connectdb.php";
    include "../admin/model/post.php";
    include "../admin/model/comment.php";
    include "../admin/model/navigation.php";
    $idNav = $_POST['filterValue'];
    $resultFilterPost = getFilterPost($idNav);
    $allComment = getAllComment();
    if(count($resultFilterPost) > 0) {
        foreach($resultFilterPost as $itemPost) {
            $numberComment = 0;
            foreach($allComment as $itemComment) {
                if($itemComment['idPost'] ==  $itemPost['id']){
                    $numberComment++;
                }
            }
            if($itemPost['status'] == 1) {
                echo '<div class="post_item">
                        <a href = "?act=blogItem&id='.$itemPost['id'].'" class="img_post">
                            <img src="./uploads/'.$itemPost['img'].'" alt="">
                        </a>
                        <div class="wraper_content_item">
                            <div class="user_post">
                                <img src="https://th.bing.com/th/id/OIP.IhLi5SNoTJG7at5pDZ4_wAHaHa?pid=ImgDet&rs=1" alt="" class = "avatar">
                                <div class="infor_user">
                                    <span class="name_user">Admin</span>
                                    <span class="time_post">'.$itemPost['time_post'].'</span>
                                </div>
                            </div>
                            <a href="?act=blogItem&id='.$itemPost['id'].'" class = "post_content">
                                <h3 class="title_post">'.$itemPost['title'].'</h3>
                                <session class="short_desc">'.$itemPost['content'].'</session>
                            </a>
                            <div class="post_actions all_post">
                                <div class="left_action">
                                    <div class="wrapper_action">
                                        <i class="bx bx-show-alt"></i>
                                        <span class="numbers">'.$itemPost['view'].'</span>
                                    </div>
                                    <div class="wrapper_action">
                                        <i class="bx bx-message" ></i>
                                        <span class="numbers">'.$numberComment.'</span>
                                    </div>
                                </div>
                                <div class="right_action">
                                    
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
    }
?>
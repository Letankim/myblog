<?php
    function showAllPost($allPostInPage, $allComment) {
        if(count($allPostInPage) > 0) {
            foreach($allPostInPage as $itemPost) {
                $numberComment = 0;
                foreach($allComment as $itemComment) {
                    if($itemComment['idPost'] ==  $itemPost['id']){
                        $numberComment++;
                    }
                }
                $getOneNav = getOneNav($itemPost['id_nav']);
                if($itemPost['status'] == 1 && $getOneNav[0]['status'] == 1) {
                    echo '<div class="post_item" onclick="moveOtherPage(this)">
                            <a class = "href__move_page" href="./post-'.$itemPost['id'].'/'.vn_to_str($itemPost['title']).'.html"></a>
                            <div class = "image__wrapper">
                                <img src="./uploads/'.$itemPost['img'].'" alt="">
                            </div>
                            <div class="wraper_content_item">
                                <div class="user_post">
                                    <img src="https://th.bing.com/th/id/OIP.IhLi5SNoTJG7at5pDZ4_wAHaHa?pid=ImgDet&rs=1" alt="" class = "avatar">
                                    <div class="infor_user">
                                        <span class="name_user">Admin</span>
                                        <span class="time_post">'.$itemPost['time_post'].'</span>
                                    </div>
                                </div>
                                <div class = "post_content">
                                    <h3 class="title_post">'.$itemPost['title'].'</h3>
                                    <session class="short_desc">'.$itemPost['shortDesc'].'</session>
                                </div>
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
        } else {
            echo "Chưa có bài post nào";
        }
    }
?>
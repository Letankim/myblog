<?php
    function showComment($allComment, $allUser, $idPost,$idUser) {
        echo '
        <div class = "count__comment">
            <span>'.count($allComment).' comments<span>
        </div>';
    if(count($allComment) > 0) {
        $check = true;
        foreach ($allComment as $comment) {
            if($comment['idPost'] == $idPost) {
                $check = false;
                $avatar = "";
                $username = "";
                foreach($allUser as $itemUser) {
                    if($itemUser['id'] == $comment['idUser']) {
                        $username = $itemUser['username'];
                        $avatar = './uploads/'.$itemUser['avatar'].'';
                        if($itemUser['avatar'] == NULL) {
                            $avatar = "https://vnn-imgs-a1.vgcloud.vn/image1.ictnews.vn/_Files/2020/03/17/trend-avatar-1.jpg"; 
                        }
                        break;
                    }
                }
                if($idUser == $comment['idUser']) {
                    echo '<li class="item_comment">
                        <div class = "box__avatar_comment avatar__mini">
                            <img src="'.$avatar.'" alt="" class = "avatar">
                        </div>
                        <div class="box_info_comment">
                            <div class="box_content_comment">
                                <div class="name_user_comment">
                                <span class="username">'.$username.'</span>
                                    <span class="time_comment">'.$comment['time_comment'].'</span>
                                </div>
                                <span class="comment_content">'.$comment['comment'].'</span>
                            </div>
                            <div class="action_comment">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                <ul class="list_action">
                                    <li class="item_action delete"><span class = "delete_comment_btn" onclick = "deleteComment('.$comment['id'].', '.$idPost.', '.$idUser.')">Xóa</span></li>
                                </ul>
                            </div>
                        </div>
                    </li>';
                } else {
                    echo '<li class="item_comment">
                        <div class = "box__avatar_comment">
                            <img src="'.$avatar.'" alt="" class = "avatar">
                        </div>
                        <div class="box_info_comment">
                            <div class="box_content_comment">
                                <div class="name_user_comment">
                                <span class="username">'.$username.'</span>
                                    <span class="time_comment">'.$comment['time_comment'].'</span>
                                </div>
                                <span class="comment_content">'.$comment['comment'].'</span>
                            </div>
                        </div>
                    </li>';
                }
            }
        }
        if($check) {
            echo '<span class = "title__no-comment">
                Hãy trở thành người đầu tiên comment bài viết này.
            </span>';
        }
    } else {
        echo '<span class = "title__no-comment">
        Hãy trở thành người đầu tiên comment bài viết này.
    </span>';
    }
    }
?>
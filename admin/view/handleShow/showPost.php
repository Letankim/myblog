<?php
    function showPost($allPost, $allComment, $allUser) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                    if(count($allPost) > 0) {
                        $i = 1;
                        foreach ($allPost as $itemPost) {
                            $status = "Ẩn";
                            $styleStatus= "background: #616262";
                            if($itemPost['status'] == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            }
                            $showPost = '  <tr>
                                        <td class = "stt">'.$i++.'</td>
                                        <td>'.$itemPost['title'].'</td>
                                        <td>
                                            <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$itemPost['id'].', '.$itemPost['status'].', 3)">'.$status.'</button>
                                        </td>
                                        <td class = "action">
                                            <a href="?act=editPostForm&id='.$itemPost['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                            <a href="?act=deletePost&id='.$itemPost['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                            <i class="bx bx-show-alt" onclick="clickShowDetails(this)"></i>
                                            <i class="bx bxs-comment" onclick="clickShowComment(this)"></i>
                                            <div class="overlay_show_post" onclick="closeShow(this)"></div>
                                            <div class="box_show_details">
                                                    <div class="btn_close">
                                                        <i class="bx bx-x" onclick="closeShow(this)"></i>
                                                    </div>
                                                    <h2 class="title_post">'.$itemPost['title'].' <view style = "color: #e1b12c; font-style: italic;">('.$itemPost['view'].' lược xem)<view></h2>
                                                    <img src="../uploads/'.$itemPost['img'].'" alt="" class="img_post">
                                                    <div class="post_content">
                                                    <p>'.$itemPost['content'].'</p>
                                                    </div>
                                                    <div class="time_post">
                                                        <span class="time">'.$itemPost['time_post'].'</span>
                                                    </div>
                                            </div>
                                            <div class="box_show_comment">
                                                <div class="btn_close">
                                                    <i class="bx bx-x" onclick="closeShow(this)"></i>
                                                </div>
                                                <h2 class="title_post">
                                                    Tất cả comments
                                                </h2>
                                                <ul class="list_comment">';
                                $checkComment = true;
                                $username = "";
                                foreach($allComment as $itemComment) {
                                    foreach($allUser as $itemUser) {
                                        if($itemUser['id'] == $itemComment['idUser']) {
                                            $username = $itemUser['username'];
                                            break;
                                        }
                                    }
                                    if($itemComment['idPost'] == $itemPost['id']) {
                                        $checkComment = false;
                                        $comment = $itemComment['comment'];
                                        $showPost .=  '<li class="comment_item">
                                                <div class="username_comment">
                                                    <span>'.$username.'</span>
                                                    <span class="time">'.$itemComment['time_comment'].'</span>
                                                </div>
                                                <div class="comment_conten_action">
                                                    <span class="content_comment">'.$comment.'</span>
                                                    <a href="index.php?act=deleteComment&id='.$itemComment['id'].'" class="delete_comment"><i class="bx bx-recycle"></i></a>
                                                </div>
                                                </li>';
                                    }
                                }
                                if($checkComment) {
                                    $showPost .= '
                                    <li class="comment_item">
                                    Chưa có bình luận nào cho bài viết này.
                                    </li>';
                                }
                                $showPost .= '</ul>
                                        </div>
                                    </td>
                                </tr>';
                                echo $showPost;
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có post</td>
                            </tr>';
                    }
            echo '</table>';
    }
?>
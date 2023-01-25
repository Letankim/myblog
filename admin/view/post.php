<div class="main_app">
    <div class="header_app">
        <h2 class="title">Posts</h2>
    </div>
    <div class="container_main">
        <form action="" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Phân loại navigation: <span style="color:red">*</span></span>
                <select name="navigation" id="status_nav">
                    <option value="<?=$allNav[0]['id']?>">----Trạng thái----</option>
                    <?php
                        foreach($allNav as $itemNav) {
                            echo '<option value="'.$itemNav['id'].'">'.$itemNav['name'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <span class="box_title">Tiêu đề bài viết: <span style="color:red">*</span></span>
                <input required type="text" name = "title_post" class = "input" placeholder = "Enter your title...">
            </div>
            <div class="box_form content_box">
                <span class="box_title">Nội dung bài viết: <span style="color:red">*</span></span>
                <textarea required name="content" id="content_post" cols="30" rows="10"></textarea>
            </div>
            <div class="box_form">
                <span class="box_title">Ảnh đại diện: <span style="color:red">*</span></span>
                <input required type="file" name = "image" class = "input input_files">
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <div class="box_form">
                <input type="submit" value="Thêm" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Post</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Title</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    if(count($allPost) > 0) {
                        $i = 1;
                        foreach ($allPost as $itemPost) {
                            $status = "Hoạt động";
                            if($itemPost['status'] != 1) {
                                $status = "Đã ẩn";
                            }
                            $showPost = '  <tr>
                                        <td class = "stt">'.$i++.'</td>
                                        <td>'.$itemPost['title'].'</td>
                                        <td>'.$status.'</td>
                                        <td class = "action">
                                            <a href="?act=editPostForm&id='.$itemPost['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                            <a href="?act=deletePost&id='.$itemPost['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                            <i class="bx bx-show-alt" ></i>
                                            <i class="bx bxs-comment" onclick="clickShowComment(this)"></i>
                                            <div class="overlay_show_post"></div>
                                            <div class="box_show_details">
                                                    <div class="btn_close">
                                                        <i class="bx bx-x"></i>
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
                                                    <i class="bx bx-x"></i>
                                                </div>
                                                <h2 class="title_post">
                                                    Tất cả comments
                                                </h2>
                                                <ul class="list_comment">';
                                $checkComment = true;
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
                ?>
            </table>
        </div>
    </div>
</div>

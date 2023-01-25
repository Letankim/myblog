<div class="main_app">
    <div class="header_app">
        <h2 class="title">Introduction</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=addIntro" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Ảnh mô tả: <span style="color:red">*</span></span>
                <input required type="file" name = "image" class = "input input_files">
            </div>
            <div class="box_form">
                <span class="box_title">Nội dung mô tả: <span style="color:red">*</span></span>
                <textarea required type="text" name = "content" class = "input" >Type here...</textarea>
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
            <header>List Banner</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Banner Introduction</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    if(count($allIntro) > 0) {
                        $i = 1;
                        foreach($allIntro as $itemIntro) {
                            $status = "Đang ẩn";
                            if($itemIntro['status'] == 1) {
                                $status = "Hoạt động";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td><img width="150px" src="../uploads/'.$itemIntro['img'].'"></td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editIntroForm&id='.$itemIntro['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteIntro&id='.$itemIntro['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                        <i class="bx bx-show-alt" ></i>
                                        <div class="overlay_show_post"></div>
                                        <div class="box_show_details">
                                            <div class="btn_close">
                                                <i class="bx bx-x"></i>
                                            </div>
                                            <h2 class="title_post">Chi tiết giới thiệu</h2>
                                            <img src="../uploads/'.$itemIntro['img'].'" alt="" class="img_post">
                                            <div class="post_content">
                                            <p>'.$itemIntro['content'].'</p>
                                            </div>
                                            <div class="time_post">
                                                <span class="time">Thêm bởi admin</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có Introduction nào</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
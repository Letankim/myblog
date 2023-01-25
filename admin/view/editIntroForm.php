<div class="main_app">
    <div class="header_app">
        <h2 class="title">Introduction</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateIntro" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Ảnh mô tả: <span style="color:red">*</span></span>
                <input type="file" name = "image" class = "input input_files">
                <img src="../uploads/<?=$oneIntro[0]['img']?>" alt="" class="img_show_edit">
            </div>
            <div class="box_form">
                <input type="hidden" name="id" value="<?=$oneIntro[0]['id']?>">
                <span class="box_title">Nội dung mô tả: <span style="color:red">*</span></span>
                <textarea required type="text" name = "content" class = "input" ><?=$oneIntro[0]['content']?></textarea>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneIntro[0]['status'] == 1) {
                            echo '<option value="1" selected>Đang hiển thị</option>
                            <option value="0">Đang ẩn</option>';
                        } else {
                            echo '<option value="1">Đang hiển thị</option>
                            <option value="0" selected>Đang ẩn</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input type="submit" value="Update Introduction" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Banner</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Banner</th>
                    <th>Nội dung</th>
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
                                    <td>'.$itemIntro['content'].'</td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editIntroForm&id='.$itemIntro['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteIntro&id='.$itemIntro['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
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
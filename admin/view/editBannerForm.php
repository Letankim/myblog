<div class="main_app">
    <div class="header_app">
        <h2 class="title">Banner</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateBanner" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Banner: <span style="color:red">*</span></span>
                <input type="file" name = "image" class = "input input_files">
                <img src="../uploads/<?=$oneBanner[0]['img']?>" alt="" class="img_show_edit">
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneBanner[0]['status'] == 1) {
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
                <input type="hidden" name="id" value="<?=$oneBanner[0]['id']?>">
                <input type="submit" value="Update banner" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Banner</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Banner</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    if(count($allBanner) > 0) {
                        $i = 1;
                        foreach($allBanner as $itemBanner) {
                            $status = "Đang ẩn";
                            if($itemBanner['status'] == 1) {
                                $status = "Hoạt động";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td><img width="150px" src="../uploads/'.$itemBanner['img'].'"></td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editBannerForm&id='.$itemBanner['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteBanner&id='.$itemBanner['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có Banner</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
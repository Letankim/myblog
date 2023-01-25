<div class="main_app">
    <div class="header_app">
        <h2 class="title">Advertise</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=advertise" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Tên chương trình: <span style="color:red">*</span></span>
                <input required type="text" name = "name" class = "input" placeholder = "Enter your name program">
            </div>
            <div class="box_form">
                <span class="box_title">Đường dẫn: <span style="color:red">*</span></span>
                <input required type="text" name = "link" class = "input" placeholder = "Enter your link program">
            </div>
            <div class="box_form">
                <span class="box_title">Ảnh quảng cáo: <span style="color:red">*</span></span>
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
            <header>List advertiser</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên chương trình</th>
                    <th>Link chương trình</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    if(count($allAdver) > 0) {
                        $i = 1;
                        foreach($allAdver as $itemAdver) {
                            $status = "Đang ẩn";
                            if($itemAdver['status'] == 1) {
                                $status = "Hoạt động";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td><img width="150px" src="../uploads/'.$itemAdver['img_adver'].'"></td>
                                    <td>'.$itemAdver['name_program'].'</td>
                                    <td><a style="font-size: 15px; color: blue;" href = "'.$itemAdver['link_adver'].'">Link here</a></td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editAdverForm&id='.$itemAdver['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteAdver&id='.$itemAdver['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có quảng cáo nào</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
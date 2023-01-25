<div class="main_app">
    <div class="header_app">
        <h2 class="title">Update navigation</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=editNavigation" method = 'POST'>
            <div class="box_form">
                <span class="box_title">Navigation: <span style="color:red">*</span></span>
                <input required type="text" name = "navigation" class = "input" value = "<?=$oneNav[0]['name']?>" placeholder = "Enter your navigation">
                <input type="hidden" name="id" value = "<?=$oneNav[0]['id']?>">
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneNav[0]['status'] == 1) {
                            echo '<option value="1" selected>Hiển thị</option>
                                <option value="0">Ẩn</option>';
                        } else {
                            echo '<option value="1">Hiển thị</option>
                            <option value="0" selected>Ẩn</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input type="submit" value="Update navigation" name = "submit" class = "input input_submit">
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
                    if(count($allNav) > 0) {
                        $i = 1;
                        foreach($allNav as $itemNav) {
                            $status = "Đang ẩn";
                            if($itemNav['status'] == 1) {
                                $status = "Đang hiển thị";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td>'.$itemNav['name'].'</td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editNavForm&id='.$itemNav['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteNav&id='.$itemNav['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có navigation</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
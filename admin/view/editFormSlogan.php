<div class="main_app">
    <div class="header_app">
        <h2 class="title">Slogan</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateSlogan" method = 'POST'>
            <div class="box_form">
                <span class="box_title">Top Slogan: <span style="color:red">*</span></span>
                <input required type="text" value = "<?=$oneSlogan[0]['topslogan']?>" name = "topSlogan" class = "input" placeholder = "Enter your top slogan">
            </div>
            <div class="box_form">
                <span class="box_title">Bottom Slogan: <span style="color:red">*</span></span>
                <input required type="text" value = "<?=$oneSlogan[0]['bottomslogan']?>" name = "bottomSlogan" class = "input" placeholder = "Enter your bottom slogan">
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneSlogan[0]['status'] == 1) {
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
                <input type="hidden" name="id" value = "<?=$oneSlogan[0]['id']?>">
                <input type="submit" value="Thêm" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Slogan</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Top slogan</th>
                    <th>Bottom slogan</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    if(count($allSlogan) > 0) {
                        $i = 1;
                        foreach($allSlogan as $itemSlogan) {
                            $status = "Đang ẩn";
                            if($itemSlogan['status'] == 1) {
                                $status = "Hoạt động";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td>'.$itemSlogan['topslogan'].'</td>
                                    <td>'.$itemSlogan['bottomslogan'].'</td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editSloganForm&id='.$itemSlogan['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteSlogan&id='.$itemSlogan['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có slogan nào</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
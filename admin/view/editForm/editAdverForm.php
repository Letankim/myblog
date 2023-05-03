<div class="main_app">
    <div class="header_app">
        <h2 class="title">Advertise</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateAdver" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Tên chương trình: <span style="color:red">*</span></span>
                <input required type="text" value="<?=$oneAdver[0]['name_program']?>" name = "name" class = "input" placeholder = "Enter your name program">
            </div>
            <div class="box_form">
                <span class="box_title">Đường dẫn: <span style="color:red">*</span></span>
                <input required type="text" value="<?=$oneAdver[0]['link_adver']?>" name = "link" class = "input" placeholder = "Enter your link program">
            </div>
            <div class="box_form">
                <span class="box_title">Ảnh quảng cáo: <span style="color:red">*</span></span>
                <input type="file" name = "image" class = "input input_files">
                <img src="../uploads/<?=$oneAdver[0]['img_adver']?>" alt="" class="img_show_edit">
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneAdver[0]['status'] == 1) {
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
                <input type="hidden" name="id" value = "<?= $oneAdver[0]['id']?>">
                <input type="submit" value="Update" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List advertiser</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show advertise -->
            <?php
                showAdvertise($allAdver);
            ?>
        </div>
    </div>
</div>
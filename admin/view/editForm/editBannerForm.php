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
            <?php
                formFilterByStatus();
            ?>
            <!-- show all banner -->
            <?php
                showBanner($allBanner);
            ?>
        </div>
    </div>
</div>
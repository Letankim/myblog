<div class="main_app">
    <div class="header_app">
        <h2 class="title">Update post</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updatePost" method = 'POST' enctype="multipart/form-data">
            <div class="box_form">
                <span class="box_title">Phân loại navigation: <span style="color:red">*</span></span>
                <select name="navigation" id="status_nav">
                    <option value="<?=$allNav[0]['id']?>">----Trạng thái----</option>
                    <?php
                        foreach($allNav as $itemNav) {
                            if($itemNav['id'] == $onePost[0]['id_nav']) {
                                echo '<option value="'.$itemNav['id'].'" selected>'.$itemNav['name'].'</option>';
                            } else {
                                echo '<option value="'.$itemNav['id'].'">'.$itemNav['name'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <span class="box_title">Tiêu đề bài viết: <span style="color:red">*</span></span>
                <input required type="text" name = "title_post" value="<?=$onePost[0]['title']?>" class = "input" placeholder = "Enter your title...">
            </div>
            <div class="box_form content_box">
                <span class="box_title">Mô tả ngắn bài viết: <span style="color:red">*</span></span>
                <textarea required name="short_desc" style = "padding: 10px;"cols="30" rows="10"><?=$onePost[0]['shortDesc']?></textarea>
            </div>
            <div class="box_form content_box">
                <span class="box_title">Nội dung bài viết: <span style="color:red">*</span></span>
                <textarea required name="content" id="content_post" cols="30" rows="10"><?=$onePost[0]['content']?></textarea>
            </div>
            <div class="box_form">
                <span class="box_title">Ảnh đại diện: <span style="color:red">*</span></span>
                <div>
                    <input type="file" name = "image" class = "input input_files">
                    <input type="hidden" name="view" value = "<?=$onePost[0]['view']?>">
                    <img src="../uploads/<?=$onePost[0]['img']?>" alt="" class="img_show_edit">
                </div>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($onePost[0]['status'] == 1) {
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
                <input type="hidden" name="id" value="<?=$onePost[0]['id']?>">
                <input type="submit" value="Cập nhật" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Navigation</header>
            <!-- filter -->
            <?php
                formFilterByStatus();
            ?>
            <?php
                showPost($allPost,$allComment,$allUser);
            ?>
        </div>
    </div>
</div>
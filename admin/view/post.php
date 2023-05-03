<div class="main_app">
    <div class="header_app">
        <h2 class="title">Posts</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="" class = "form__add" method = "POST" enctype="multipart/form-data">
                <div class="box_form">
                    <span class="box_title">Phân loại navigation: <span style="color:red">*</span></span>
                    <select name="navigation" id="status_nav">
                    <option value="'.$allNav[0]['id'].'">----Trạng thái----</option>';
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
                    <span class="box_title">Mô tả ngắn bài viết: <span style="color:red">*</span></span>
                    <textarea required name="short_desc" style = "padding: 10px;"cols="30" rows="10">Mô tả ngắn</textarea>
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
        </div>
        <div class="show_list">
            <header>List Post</header>
            <!-- filter -->
            <div class="box_fill">
                <?php
                    formFilterByStatus();
                    formFilterPostByNavigation($allNav);
                ?>
            </div>
            
            <?php
                showPost($pagePost,$allComment,$allUser);
            ?>
        </div>
        <?php
            showListPage($type, $pageNumber, $pages);
        ?>
    </div>
</div>

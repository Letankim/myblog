<div class="main_app">
    <div class="header_app">
        <h2 class="title">Introduction</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=addIntro" class = "form__add" method = 'POST' enctype="multipart/form-data">
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
        </div>
        <div class="show_list">
            <header>List Banner</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show introduction  -->
            <?php
                showIntroduction($allIntro);
            ?>
        </div>
    </div>
</div>
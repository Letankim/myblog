<div class="main_app">
    <div class="header_app">
        <h2 class="title">Banner</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="" class = "form__add" method = 'POST' enctype="multipart/form-data">
                <div class="box_form">
                    <span class="box_title">Banner: <span style="color:red">*</span></span>
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
            <header>List Banner</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all banner -->
            <?php
                showBanner($pageBanner);
            ?>
        </div>
        <?php
            showListPage($type, $pageNumber, $pages);
        ?>
    </div>
</div>
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Advertise</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=advertise" class = "form__add" method = 'POST' enctype="multipart/form-data">
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
        </div>
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
<div class="main_app">
    <div class="header_app">
        <h2 class="title">Slogan</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=slogan" class = "form__add" method = 'POST'>
                <div class="box_form">
                    <span class="box_title">Top Slogan: <span style="color:red">*</span></span>
                    <input required type="text" name = "topSlogan" class = "input" placeholder = "Enter your top slogan">
                </div>
                <div class="box_form">
                    <span class="box_title">Bottom Slogan: <span style="color:red">*</span></span>
                    <input required type="text" name = "bottomSlogan" class = "input" placeholder = "Enter your bottom slogan">
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
            <header>List Slogan</header>
            <?php
                formFilterByStatus();
            ?>
            <?php
                showSlogan($allSlogan);
            ?>
        </div>
    </div>
</div>
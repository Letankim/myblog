<div class="main_app">
    <div class="header_app">
        <h2 class="title">Navigation</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="index.php?act=navigation" class = "form__add" method = 'POST'>
                <div class="box_form">
                    <span class="box_title">Navigation: <span style="color:red">*</span></span>
                    <input required type="text" name = "navigation" class = "input" placeholder = "Enter your navigation">
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
            <header>List Navigation</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all navigation -->
            <?php
                showNavigation($pageNav);
            ?>
        </div>
        <!-- device page -->
        <?php
            showListPage($type, $pageNumber, $pages);
        ?>
    </div>
</div>
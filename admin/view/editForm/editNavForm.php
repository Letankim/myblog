<div class="main_app">
    <div class="header_app">
        <h2 class="title">Update navigation</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=editNavigation" method = 'POST'>
            <div class="box_form">
                <span class="box_title">Navigation: <span style="color:red">*</span></span>
                <input required type="text" name = "navigation" class = "input" value = "<?=$oneNav[0]['name']?>" placeholder = "Enter your navigation">
                <input type="hidden" name="id" value = "<?=$oneNav[0]['id']?>">
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneNav[0]['status'] == 1) {
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
                <input type="submit" value="Update navigation" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List Post</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all navigation -->
            <?php
                showNavigation($allNav);
            ?>
        </div>
    </div>
</div>
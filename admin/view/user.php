<div class="main_app">
    <div class="header_app">
        <h2 class="title">Tài khoản</h2>
    </div>
    <div class="container_main">
        <div class="box__form-add">
            <button class="btn show_hide_form-add-post" onclick="toggleShow(this)">Show form add</button>
            <form action="" class = "form__add" method = 'POST'>
                <div class="box_form">
                    <span class="box_title">Tên người dùng: <span style="color:red">*</span></span>
                    <input required type="text" name = "name" class = "input" placeholder = "Enter your name">
                </div>
                <div class="box_form">
                    <span class="box_title">Emial: <span style="color:red">*</span></span>
                    <input required type="text" name = "email" class = "input" placeholder = "Enter your email">
                </div>
                <div class="box_form">
                    <span class="box_title">Username: <span style="color:red">*</span></span>
                    <input required type="text" name = "username" class = "input" placeholder = "Enter your username">
                </div>
                <div class="box_form">
                    <span class="box_title">Password: <span style="color:red">*</span></span>
                    <input required type="text" name = "password" class = "input" placeholder = "Enter your password">
                </div>
                <div class="box_form">
                    <select name="role" id="status_nav">
                        <option value="0">----Vai trò----</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div class="box_form">
                    <select name="status" id="status_nav">
                        <option value="1">----Trạng thái----</option>
                        <option value="1">Bình thường</option>
                        <option value="0">Vô hiệu hóa</option>
                    </select>
                </div>
                <div class="box_form">
                    <input type="submit" value="Thêm" name = "submit" class = "input input_submit">
                </div>
            </form>
        </div>
        <div class="show_list">
            <header>List User</header>
            <?php
                formFilterByStatus();
            ?>
            <!-- show all account -->
            <?php
                showAccount($allUser);
            ?>
        </div>
    </div>
</div>
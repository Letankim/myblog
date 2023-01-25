<div class="main_app">
    <div class="header_app">
        <h2 class="title">Tài khoản</h2>
    </div>
    <div class="container_main">
        <form action="index.php?act=updateUser" method = 'POST'>
            <div class="box_form">
                <span class="box_title">Tên người dùng: <span style="color:red">*</span></span>
                <input required type="text" value="<?=$oneUser[0]['name']?>" name = "name" class = "input" placeholder = "Enter your name">
            </div>
            <div class="box_form">
                <span class="box_title">Email: <span style="color:red">*</span></span>
                <input required type="text" value="<?=$oneUser[0]['email']?>" name = "email" class = "input" placeholder = "Enter your email">
            </div>
            <div class="box_form">
                <span class="box_title">Username: <span style="color:red">*</span></span>
                <input required type="text" value="<?=$oneUser[0]['username']?>" name = "username" class = "input" placeholder = "Enter your username">
            </div>
            <div class="box_form">
                <span class="box_title">Password: <span style="color:red">*</span></span>
                <input required type="text" value="<?=$oneUser[0]['password']?>" name = "password" class = "input" placeholder = "Enter your password">
            </div>
            <div class="box_form">
                <select name="role" id="status_nav">
                    <option value="0">----Vai trò----</option>
                    <?php
                        if($oneUser[0]['role'] == 1) {
                            echo '<option value="1" selected>Admin</option>
                                <option value="0">User</option>';
                        } else {
                            echo '<option value="1">Admin</option>
                            <option value="0" selected>User</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <select name="status" id="status_nav">
                    <option value="1">----Trạng thái----</option>
                    <?php
                        if($oneUser[0]['status'] == 1) {
                            echo '<option value="1" selected>Bình thường</option>
                                <option value="0">Vô hiệu hóa</option>';
                        } else {
                            echo '<option value="1">Bình thường</option>
                            <option value="0" selected>Vô hiệu hóa</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="box_form">
                <input type="hidden" name = "id" value="<?=$oneUser[0]['id']?>">
                <input type="submit" value="Update User" name = "submit" class = "input input_submit">
            </div>
        </form>
        <div class="show_list">
            <header>List User</header>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    if(count($allUser) > 0) {
                        $i = 1;
                        foreach($allUser as $itemUser) {
                            $status = "Bình thường";
                            if($itemUser['status'] != 1) {
                                $status = "Vô hiệu hóa";
                            } 
                            $role = "User";
                            if($itemUser['role'] == 1) {
                                $role = "Admin";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td>'.$itemUser['name'].'</td>
                                    <td>'.$itemUser['username'].'</td>
                                    <td>'.$itemUser['email'].'</td>
                                    <td>'.$role.'</td>
                                    <td>'.$status.'</td>
                                    <td class = "action">
                                        <a href="index.php?act=editUserForm&id='.$itemUser['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteUser&id='.$itemUser['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có User</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
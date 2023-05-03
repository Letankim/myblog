<?php
    function showAccount($accounts) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th class = "hide_on_mobile">Tên người dùng</th>
                    <th>Username</th>
                    <th class = "hide_on_mobile">Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                    if(count($accounts) > 0) {
                        $i = 1;
                        foreach($accounts as $account) {
                            $status = "Vô hiệu hóa";
                            $styleStatus= "background: #616262";
                            if($account['status'] == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            } 
                            $role = "User";
                            $admin = "";
                            if($account['role'] == 1) {
                                $role = "Admin";
                                $admin = "background-color: #535c68; color: #fff";
                            } 
                            echo '<tr style="'.$admin.'">
                                    <td class = "stt">'.$i++.'</td>
                                    <td class = "hide_on_mobile">'.$account['name'].'</td>
                                    <td>'.$account['username'].'</td>
                                    <td class = "hide_on_mobile">'.$account['email'].'</td>
                                    <td>'.$role.'</td>
                                    <td>';
                                    if($account['role'] != 1) {
                                        echo '<button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$account['id'].', '.$account['status'].', 4)">'.$status.'</button>';
                                    } else {
                                        echo '<button style="background: #ff7979;cursor: not-allowed;" class = "btn_change-status">'.$status.'</button>';
                                    }    
                                    echo '</td>
                                    <td class = "action">
                                        <a href="index.php?act=editUserForm&id='.$account['id'].'"><i class="bx bx-edit-alt" ></i></a>';
                                    if($account['role'] != 1) {
                                        echo '<a href="index.php?act=deleteUser&id='.$account['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>';
                                    }
                                    echo '</td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có User</td>
                            </tr>';
                    }
            echo '</table>';
    }
?>
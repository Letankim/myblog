<?php
    function showIntroduction($intro) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Banner Introduction</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                    if(count($intro) > 0) {
                        $i = 1;
                        foreach($intro as $itemIntro) {
                            $status = "Đang ẩn";
                            $styleStatus= "background: #616262";
                            if($itemIntro['status'] == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td><img width="150px" src="../uploads/'.$itemIntro['img'].'"></td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$itemIntro['id'].', '.$itemIntro['status'].', 5)">'.$status.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editIntroForm&id='.$itemIntro['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteIntro&id='.$itemIntro['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                        <i class="bx bx-show-alt" onclick="clickShowDetails(this)"></i>
                                        <div class="overlay_show_post" onclick="closeShow(this)"></div>
                                        <div class="box_show_details">
                                                <div class="btn_close">
                                                    <i class="bx bx-x" onclick="closeShow(this)"></i>
                                                </div>
                                                <h2 class="title_post">Introduction details</h2>
                                                <img src="../uploads/'.$itemIntro['img'].'" alt="" class="img_post">
                                                <div class="post_content">
                                                <p>'.$itemIntro['content'].'</p>
                                                </div>
                                                <div class="time_post">
                                                    <span class="time">Post at admin</span>
                                                </div>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có Introduction nào</td>
                            </tr>';
                    }
            echo '</table>';
    }
?>
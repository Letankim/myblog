<?php
    function showAdvertise($advertise) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên chương trình</th>
                    <th>Link chương trình</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                    if(count($advertise) > 0) {
                        $i = 1;
                        foreach($advertise as $itemAdver) {
                            $status = "Đang ẩn";
                            $styleStatus= "background: #616262";
                            if($itemAdver['status'] == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td><img width="120px" src="../uploads/'.$itemAdver['img_adver'].'"></td>
                                    <td>'.$itemAdver['name_program'].'</td>
                                    <td><a style="font-size: 15px; color: blue;" href = "'.$itemAdver['link_adver'].'">Link here</a></td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$itemAdver['id'].', '.$itemAdver['status'].', 7)">'.$status.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editAdverForm&id='.$itemAdver['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteAdver&id='.$itemAdver['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có quảng cáo nào</td>
                            </tr>';
                    }
            echo '</table>';
    }
?>
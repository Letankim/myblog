<?php
    function showSlogan($slogan) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Top slogan</th>
                    <th>Bottom slogan</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                    if(count($slogan) > 0) {
                        $i = 1;
                        foreach($slogan as $itemSlogan) {
                            $status = "Đang ẩn";
                            $styleStatus= "background: #616262";
                            if($itemSlogan['status'] == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td>'.$itemSlogan['topslogan'].'</td>
                                    <td>'.$itemSlogan['bottomslogan'].'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$itemSlogan['id'].', '.$itemSlogan['status'].', 6)">'.$status.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editSloganForm&id='.$itemSlogan['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteSlogan&id='.$itemSlogan['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có slogan nào</td>
                            </tr>';
                    }
            echo '</table>';
    }
?>
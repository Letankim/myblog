<?php
    function showNavigation($allNav) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Navigation</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                    if(count($allNav) > 0) {
                        $i = 1;
                        foreach($allNav as $itemNav) {
                            $status = "Ẩn";
                            $styleStatus= "background: #616262";
                            if($itemNav['status'] == 1) {
                                $status = "Hoạt động";
                                $styleStatus = "";
                            } 
                            echo '<tr>
                                    <td class = "stt">'.$i++.'</td>
                                    <td>'.$itemNav['name'].'</td>
                                    <td>
                                        <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$itemNav['id'].', '.$itemNav['status'].', 1)">'.$status.'</button>
                                    </td>
                                    <td class = "action">
                                        <a href="index.php?act=editNavForm&id='.$itemNav['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                        <a href="index.php?act=deleteNav&id='.$itemNav['id'].'" class = "delete"><i class="bx bx-recycle" ></i></a>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '<tr>
                                <td colspan="10">Chưa có navigation</td>
                            </tr>';
                    }
            echo '</table>';
    }
?>
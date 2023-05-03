<?php
    function showBanner($banners) {
        echo '<table>
                <tr>
                    <th>STT</th>
                    <th>Banner</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>';
                if(count($banners) > 0) {
                    $i = 1;
                    foreach($banners as $itemBanner) {
                        $status = "Đang ẩn";
                        $styleStatus = "background: #616262";
                        if($itemBanner['status'] == 1) {
                            $status = "Hoạt động";
                            $styleStatus="";
                        } 
                        echo '<tr>
                                <td class = "stt">'.$i++.'</td>
                                <td><img width="150px" src="../uploads/'.$itemBanner['img'].'"></td>
                                <td>
                                    <button style="'.$styleStatus.'" class = "btn_change-status" onClick="handleToggleStatus('.$itemBanner['id'].', '.$itemBanner['status'].', 2)">'.$status.'</button>
                                </td>
                                <td class = "action">
                                    <a href="index.php?act=editBannerForm&id='.$itemBanner['id'].'"><i class="bx bx-edit-alt" ></i></a>
                                    <a href="index.php?act=deleteBanner&id='.$itemBanner['id'].'" class = "delete" ><i class="bx bx-recycle" ></i></a>
                                </td>
                            </tr>';
                    }
                } else {
                    echo '<tr>
                            <td colspan="10">Chưa có Banner</td>
                        </tr>';
                }
            echo '</table>';
    }
?>
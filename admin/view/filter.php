<?php
    function formFilterByStatus() {
        echo '<div class="filter">
                <select name="fill" id="fill" onchange="filterByStatus(this)">
                    <option value="-1">Trạng thái</option>
                    <option value="0">Đang ẩn</option>
                    <option value="1">Hoạt động</option>
                </select>
            </div>';
    }
    // 
    // <option value="1">Hoạt động</option>
    function formFilterPostByNavigation($allNav) {
        echo '<div class="filter">
                <select name="fill" id="fill" onchange="filterPostByNavigation(this)">
                    <option value="-1">Navigation</option>';
                foreach($allNav as $itemNav) {
                    echo '<option value="'.$itemNav['id'].'">'.$itemNav['name'].'</option>';
                }
            echo '</select>
        </div>';
    }
?>
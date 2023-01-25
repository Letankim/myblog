<div class="main_app">
    <div class="header_app">
        <h2 class="title">Thống kê</h2>
    </div>
    <div class="container_main">
        <div class="dashboard">
            <ul class="list_dash">
                <li class="item_dash">
                    <i class='bx bx-navigation'></i>
                    <span class="number"><?=count($allNav)?></span>
                    <span class="nav_title">Navigation</span>
                </li>
                <li class="item_dash">
                    <i class='bx bxs-edit-alt' ></i>
                    <span class="number"><?=count($allPost)?></span>
                    <span class="nav_title">Bài đăng</span>
                </li>
                <li class="item_dash">
                    <i class='bx bxs-user-detail' ></i>
                    <span class="number"><?=count($allUser)?></span>
                    <span class="nav_title">Người dùng</span>
                </li>
                <li class="item_dash">
                    <i class='bx bx-image-add' ></i>
                    <span class="number"><?=count($allBanner)?></span>
                    <span class="nav_title">Banner</span>
                </li>
            </ul>
        </div>
    </div>
</div>
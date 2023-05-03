<?php
    function addAdvertisement($oneAdver) {
            echo '<div class="overlay_ad"></div>
                    <div class="box_advertisement">
                        <div class="box_btn_close">
                            <i class="bx bx-x close_ad"></i>
                        </div>
                        <a href="'.$oneAdver[0]['link_adver'].'" class="wrapper_advertisement">
                            <img src="./uploads/'.$oneAdver[0]['img_adver'].'" alt="" class="img_ad">
                        </a>
                    </div>';

    }
?>
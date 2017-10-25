<?php
use yii\helpers\Url;

?>
<div id="hotel_marker"></div>
<div id="container">
    <div id="bread_crumbs"></div>
    <div id="hotel_name_and_panoram">
        <img class="name_and_panoram_bg" src="/image/video.jpg" alt="">
        <div id="hotel_name_and_panoram_react"></div>
         <div class="panoram"> 
            <div class="module_panoram">
                <?php include('plugin/360/vr/examples/gallery/index.html') ?>
            </div>
             <div class="module_panoram_close">
                <img src="/image/icons/close.svg" alt="">
            </div> 
         </div>
    </div>

    <div id="hotel_about"></div>

    <div id="hotel_types"></div>

    <div id="hotel_map">
        <div id="map"></div>
        <ul class="hotel_map_buttons">
            <li id="whereEat" class="hotel_map_button_foot">Де поїсти</li>
            <li id="whereSleep" class="hotel_map_button_house">Де зупимитися</li>
        </ul>
    </div>

</div>
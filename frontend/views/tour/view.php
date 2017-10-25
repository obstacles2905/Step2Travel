<?php
use yii\helpers\Url;

?>

<div id="container">
<!--    <iframe src="upload/tour3d/tour{idTour}/index.html" scrolling="no" style="width: 100%; height: 400px;"></iframe>-->
        <div id="bread_crumbs">
            <ul>
                <li><a href="<?php echo Url::to(['/']); ?>">Головна </a> /</li>
                <li><a href="<?php echo Url::to(['map/index']); ?>"> Тури </a> /</li>
                <li><a href="#"> Дніпропетровські пороги - унікальне місце планети</a></li>
            </ul>
        </div>
        <div id="tour_name_and_panoram">
            <img class="name_and_panoram_bg" src="<?= Yii::$app->request->baseUrl ?>/image/video.jpg" alt="">
            <div id="tour_name_and_panoram_react"></div>
            <div class="panoram"> 
                <div class="module_panoram">
                    <?php include('plugin/360/vr/examples/gallery/index.html') ?>
                </div>
                <div class="module_panoram_close">
                    <img src="<?= Yii::$app->request->baseUrl ?>/image/icons/close.svg" alt="">
                </div> 
            </div> 
            
            
        </div>

        <div id="tour_about">
            <!-- <div class="information_about_place_title">
                Дніпропетровські пороги
            </div>
            <div class="information_about_place_text">
                <p>
                    Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках — Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні, адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в Україні після Києва, Харкова та Одеси.
                </p>
                <p>
                    Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках — Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні, адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в Україні після Києва, Харкова та Одеси.
                </p>
            </div> -->
        </div>

        <div id="tour_type">
            <!-- <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul> -->
        </div>

        <div id="tour_map">
            <div class="tour_map_bg"><img src="<?= Yii::$app->request->baseUrl ?>/image/map.jpg" alt=""></div>
            <!-- <div class="tour_map_miniature_box">
                <div class="tour_map_miniature">
                    <img src="/image/header_image.jpg" alt="">
                </div>
            </div> -->
            <div class="tour_map_and_about">
                <div class="tour_map_main_box">
                    <div class="tour_map_main_circle_otside">
                        <!-- <div class="tour_map_main_circle_inside"> -->
                             <div id="map" class="tour_map_style"></div> 
                        <!-- </div> -->
                    </div>
                            
                </div>

                <div class="tour_map_about_place_line">
                    <div class="tour_map_about_place_line_for_circle"></div>
                </div>

                <div class="tour_map_about_place_box">
                    <div class="tour_map_about_place_box_title">
                        <!-- Дніпропетровські пороги -->
                    </div>
                    <p>
                        <!-- Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках — Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні, адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в Україні після Києва, Харкова та Одеси. -->
                    </p>
                    <a href="" class="tour_map_about_place_box_title_button">Детальніше</a>
                </div>
            </div>

            
            

        </div>
        
        
    </div>
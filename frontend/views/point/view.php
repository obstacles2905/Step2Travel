<?php
use yii\helpers\Url;

?>

<div id="container">
    <div id="bread_crumbs">
        
    </div>
    <div id="sight_name_and_panoram">
        <img class="name_and_panoram_bg" src="/image/video.jpg" alt="">
        <div id="sight_name_and_panoram_react"></div>
         <div class="panoram"> 
            <div class="module_panoram">
                <?php include('plugin/360/vr/examples/gallery/index.html') ?>
            </div>
             <div class="module_panoram_close">
                <img src="/image/icons/close.svg" alt="">
            </div> 
         </div> 
        
        <!-- <div class="label_name_and_panoram_box">
            <div class="label_name_box">
                <div class="label_name_circle_substrate">
                    <div class="label_name_circle">
                        <div class="label_name_title">
                            Дніпропетровські пороги - унікальне місце планети
                        </div>
                        <div class="label_name_about sight_label_name_rate">
                            <ul>
                                <li><img src="/image/icons/Rate.svg" alt="">4,5</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button_panoram">
                <div class="label_panoram_circle_substrate">
                    <div class="label_panoram_circle">
                        <img src="/image/icons/Panorama.svg" alt="">
                    </div>
                </div>
            </div>
        </div> -->

    </div>

    <div id="sight_about">
        <!-- <div class="information_about_place_title">
            Дніпропетровські пороги
        </div>
        <div class="information_about_place_text">
            <p>
                Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках —
                Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні,
                адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в
                Україні після Києва, Харкова та Одеси.
            </p>
            <p>
                Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках —
                Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні,
                адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в
                Україні після Києва, Харкова та Одеси.
            </p>
        </div> -->
    </div>

    <div id="sight_types">
        <!-- <div class="tags">
            <ul>
                <li><a href="">Історичні міся</a></li>
                <li><a href="">Фортеці</a></li>
                <li><a href="">Мости</a></li>
                <li><a href="">Музеї</a></li>
            </ul>
        </div> -->
    </div>

    <div id="sight_map">
        <div id="map"></div>
        <ul class="sight_map_buttons">
                <li id="whereEat" class="sight_map_button_foot">Де поїсти</li>
                <li id="whereSleep" class="sight_map_button_house">Де зупимитися</li>
            </ul>
    </div>

    <!-- <div id="sight_share_rate">
        <div class="rate">
            <p>Додати рейтинг</p>
            <ul>
                <li>
                    <a href="">
                        <img class="star_empty" src="/image/icons/star_empty.svg" alt="">
                        <img class="star_full" src="/image/icons/star_full.svg" alt="">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class="star_empty" src="/image/icons/star_empty.svg" alt="">
                        <img class="star_full" src="/image/icons/star_full.svg" alt="">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class="star_empty" src="/image/icons/star_empty.svg" alt="">
                        <img class="star_full" src="/image/icons/star_full.svg" alt="">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class="star_empty" src="/image/icons/star_empty.svg" alt="">
                        <img class="star_full" src="/image/icons/star_full.svg" alt="">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class="star_empty" src="/image/icons/star_empty.svg" alt="">
                        <img class="star_full" src="/image/icons/star_full.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>

    </div> -->

</div>
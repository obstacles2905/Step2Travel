<?php
    //use yii\web\View;
    use frontend\assets\AppAsset;
    //use yii\web\AssetBundle;


    //$this->registerAssetBundle('frontend\assets\AppAsset');
    AppAsset::register($this);
    //$this->registerCssFile('css/main.css'); 
?>
<!--Main container-->
<div id="tours_page">
    <div id="container">
    <!--Container header-->
    <div id="container_header">
        
        <div class="container_header_image">    
            <img src="image/dnepr.jpg" alt="">
        </div>
        <div class="container_header_panoram">
            <img id="forPanorama" src="" alt="">
                <?php include('plugin/360/vr/examples/gallery/index.html') ?>
            </div>
        <div class="container_header_close_panoram"><img src="<?= Yii::$app->request->baseUrl ?>/image/icons/close.svg" alt=""></div>
        <div class="container_header_label">
            <div class="container_header_label_title">
               Віртуальні тури Україною
            </div>
            <div class="container_header_label_text">
               У сучасній Україні, так само як і вродовж<br>
               своєї попередної усторії, Дніпро лишається<br>
               одним із її найзвичайніших політичних,<br>
               промислових, фінансових та наукових міст<br>
            </div>
            <div class="container_header_circle_substrate">
                <div class="container_header_circle">
                    <img src="<?= Yii::$app->request->baseUrl ?>/image/icons/Panorama.svg" alt="">
                </div>
            </div>     
        </div>
    </div>
    <!--End container header-->

    <!--Container manual-->
    <div id="container_manual">
        <div class="block_for_circle_decoration_one">
            <div class="circle_decoration_one_outside">
                <div class="circle_decorationo_one_inside"></div>
            </div>
        </div>
        
        <div class="block_for_circle_decoration_two">
            <div class="circle_decoration_two_outside">
                <div class="circle_decoration_two_inside"></div>
            </div>
        </div>
        
        
        <div class="container_manual_title">
            Дніпро
        </div>

        <div class="container_manual_text">
            <p>
                Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках — Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні, адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в Україні після Києва, Харкова та Одеси.
            </p>
        </div>
        
        <div class="container_manual_block_circle">
            <div class="container_manual_line"><img src="image/dots.png" alt=""></div>
            <div class="container_manual_circle">
                <div class="container_manual_circle_data">
                    <img src="image/icons/Map.svg" alt="">
                    <p>Обирай віртуальний</p>
                </div>
                
            </div>

            <div class="container_manual_circle_down">
                <div class="container_manual_circle_data">
                    <img src="image/icons/Panorama.svg" alt="">
                    <p>Переглянь віртуальний тур</p>
                </div>
                
            </div>

            <div class="container_manual_circle">
                <div class="container_manual_circle_data">
                    <img src="image/icons/Tour.svg" alt="">
                    <p>Відправляйся у реальну мандрівку!</p>
                </div>
                
            </div>
        </div>

        <div class="block_for_circle_decoration_three">
            <div class="circle_decoration_three_outside">
                <div class="circle_decoration_three_inside"></div>
            </div>
        </div>

        <div class="block_for_circle_decoration_four">
            <div class="circle_decoration_four_outside">
                <div class="circle_decoration_four_inside"></div>
            </div>
        </div>
    </div>
    <!--Enf container manual-->

    <!--Container promo-->
    <div id="container_promo">
        <div class="block_for_circle_decoration_five">
            <div class="circle_decoration_five_outside">
                <div class="circle_decoration_five_inside"></div>
            </div>
        </div>

        

        <div class="container_promo_video_and_info">
            <div class="container_promo_video">
                <!-- <iframe src="https://www.youtube-nocookie.com/embed/rmEgLLuvEZY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe> -->
            </div>
            
            <div class="container_promo_info">
                <div class="container_promo_video_triangle_box">
                    <div class="container_promo_video_triangle"></div>
                </div>
                <div class="container_promo_info_title">
                    Подорожуй Україною
                </div>
                <p>
                    Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках — Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні, адміністративний центр Дніпропетровської області.
                </p>
                
            </div>

            <div class="container_promo_link_to_tour">
                <p>Переглянути панорамні тури</p>
                <ul>
                    <li><img class="arrow_2" src="image/icons/Arrow_2.svg" alt=""></li>
                    <li><img class="arrow_1" src="image/icons/Arrow_1.svg" alt=""></li>
                </ul>
            </div>
        </div>
        

        <div class="block_for_circle_decoration_high_full displacement_to_right displacement_to_bottom_185">
            <div class="circle_decoration_high_full transparency_50">
            </div>
        </div>

        <div class="block_for_circle_decoration_small displacement_to_left_5 displacement_to_bottom_195">
            <div class="circle_decoration_small transparency_20">
            </div>
        </div>

        
    </div>
    <!--End container promo-->

    <!--Container panorams tour-->
    <div id="container_panorams_tour">
        <div class="block">
                        <div class="container">
                            <div id="c0"  class="item"></div>
                            <div id="c1" name="t0" class="item"></div>
                            <div id="c2" name="t9" class="item"></div>
                            <div id="c3" name="t8" class="item"></div>
                            <div id="c4" class="item"></div>

                        </div>
                    </div>
        <div class="block">
                        <div class="container">
                            <div id="c5" name="t1"class="item"></div>
                            <div id="c6" class="item"></div>
                            <div id="cmain" name="tmain" class="item"></div>
                            <div id="c7" class="item"></div>
                            <div id="c8" name="t7" class="item"></div>
                        </div>
                    </div>
        <div class="block">
                        <div class="container">

                            <div id="c9" name="t2" class="item"></div>
                            <div id="c10" name="t3" class="item"></div>
                            <div id="c11" name="t4" class="item"></div>
                            <div id="c12" name="t5" class="item"></div>
                            <div id="c13" name="t6" class="item"></div>


                        </div>
                        <div id="for_button"></div>
                    </div>

        <!--<div class="block_for_circle_decoration_seven">
            <div class="circle_decoration_seven_outside">
                <div class="circle_decoration_seven_inside"></div>
            </div>

        </div>

        <div class="block_for_circle_decoration_eight">
            <div class="circle_decoration_eight_outside">
                <div class="circle_decoration_eight_inside"></div>
            </div>
        </div>
        <div class="container_panorams_tour_bg">
            <div class="container_panorams_tour_shadow_top"></div>  
            <img src="image/map_bg.png" alt="">
        </div>

        <div class="container_panorams_tour_circle_bottom">
            <p>Переглянути всі тури</p>
        </div>

        <div class="container_panorams_tour_circle_bottom_image">
            <div class="container_panorams_tour_circle_substrate_image"></div>
            <img src="image/header_image.jpg" alt="">
            <div class="container_panorams_tour_circle_bottom_lable">
                <p>Собакеун</p>
            </div>
            
        </div>-->
        
    </div>
    
    <!--End container panorams tour-->
    <div id="container_events">
        <div class="block_for_circle_decoration_high displacement_to_left turn_180">
            <div class="circle_decoration_high transparency_50">
            </div>
        </div>
        <div class="container_events_title">
            Дніпро
        </div>

        
        <div class="block_for_circle_decoration_small displacement_to_right">
            <div class="circle_decoration_high transparency_50">
            </div>
        </div>

        <div class="container_events_text">
            <p>
                Дніпро́ (до 1784 року — Новий Кодак, у 1784—1796 і 1802—1926 роках — Катеринослав, у 1796—1802 роках — Новоросійськ, у 1926—2016 роках — Дніпропетровськ[5][6]) — місто обласного значення в Україні, адміністративний центр Дніпропетровської області. Дніпро є четвертим містом за кількістю населення в Україні після Києва, Харкова та Одеси.
            </p>
        </div>
        
        <div class="container_events_circle_box" id="container_events_circle_box">
            <!--<div class="arrow_left">
                <img src="image/icons/Arrow.svg" alt="">
            </div>-->
            <!--<div class="container_events_line"></div>
            <ul>
                <div class="container_events_line"><img src="image/dots.png" alt=""></div>
                <li class="container_events_circle_first_block">
                    
                    <div class="container_events_circle_info">
                        <div class="container_events_circle_date">
                            29 червня
                        </div>

                        <div class="container_events_circle_data">
                            Прогулянка по ТРЦ Мінора
                        </div>
                        <div class="container_events_circle_button">
                            Детальніше
                        </div>
                    </div>
                    <div class="container_events_circle_midle"></div>
                    <div class="container_events_circle_image">
                        <img src="image/minora.jpg" alt="">
                    </div>
                </li>
                <li class="container_events_circle_second_block">
                    <div class="container_events_circle_info">
                        <div class="container_events_circle_date">
                            29 червня
                        </div>

                        <div class="container_events_circle_data">
                            Прогулянка по ТРЦ Мінора
                        </div>
                        <div class="container_events_circle_button">
                            Детальніше
                        </div>
                    </div>
                    <div class="container_events_circle_midle"></div>
                    <div class="container_events_circle_image">
                        <img src="image/minora.jpg" alt="">
                    </div>
                </li>
                <li class="container_events_circle_third_block">
                    <div class="container_events_circle_info">
                        <div class="container_events_circle_date">
                            29 червня
                        </div>

                        <div class="container_events_circle_data">
                            Прогулянка по ТРЦ Мінора
                        </div>
                        <div class="container_events_circle_button">
                            Детальніше
                        </div>
                    </div>
                    <div class="container_events_circle_midle"></div>
                    <div class="container_events_circle_image">
                        <img src="image/minora.jpg" alt="">
                    </div>
                </li>
            </ul>

            <!--<div class="arrow_right">
                <img src="image/icons/Arrow.svg" alt="">
            </div>-->
        </div>
        
    </div>
    
</div>
</div>
<!--End main containr-->

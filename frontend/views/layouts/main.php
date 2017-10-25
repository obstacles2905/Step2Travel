<?php
    use yii\helpers\Url;
    use frontend\assets\AppAsset;
    AppAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">-->
    <!--<link href="library/materialize/css/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="library/materialize/css/materialize.css">-->
    <!--<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/general_style.css">
    <link rel="stylesheet" href="css/main_page.css">
    <link rel="stylesheet" href="css/tours.css">
    <link rel="stylesheet" href="css/map.css">
    <link rel="stylesheet" href="css/tour.css">
    <link rel="stylesheet" href="css/events.css">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/cafe.css">
    <link rel="stylesheet" href="css/sight.css">
    <link rel="stylesheet" href="css/hotel.css">-->
<!--    <link rel="stylesheet" href="/css/index.css">-->
    <?php $this->head() ?>
    <title>Step 2 travel</title>
    <!--<link rel="stylesheet" href="css/carousel.css">-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARG0XHUc-OY_IDgr4X3KkxUROJs4jyCVA"></script>
</head>
<body>
<?php $this->beginBody(); ?>

<!-- ------------------------------------Header---------------------------------------- -->
<div id="menu">
    <div class="menu_desktop menu_mobile">
        <a href="<?php echo Url::to(['/']); ?>"><div class="menu_logo"></div></a>
        <div class="menu_left">
            <ul class="menu_list">
                <li><a href="<?php echo Url::to(['map/index']); ?>">Карта</a></li>
                <li><a href="<?php echo Url::to(['tour/index']); ?>">Тури</a></li>
                <li><a href="<?php echo Url::to(['event/index']); ?>">Події</a></li>
            </ul>
        </div>

        <div class="menu_right">
            <ul class="menu_list">
                <li class="icon_search">
                    <a href="#">
                        <img src="<?= Yii::$app->request->baseUrl ?>/image/icons/Search.svg" alt="">
                    </a>
                </li>
                <li class="icon_profile">
                    <a href="#">
                        <img src="<?= Yii::$app->request->baseUrl ?>/image/icons/Profile.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu_button_open">
            
        </div>
    </div>
    
</div>
<!-- ------------------------------------End header---------------------------------------- -->

<?= $content ?>

<div id="container_footer">
    <div class="container_footer_menu_top">
        <div class="container_footer_menu_top_logo">
            <h5>Дивна україна</h5>
        </div>
    </div>
    <div class="container_footer_widgets">
        <ul class="container_footer_widget_left">
            <li><a href="#">Про нас</a></li>
            <li><a href="#">Партнери</a></li>
        </ul>

        <ul class="container_footer_widget_right">
            <li><a href="<?php echo Url::to(['map/index']); ?>">Карта</a></li>
            <li><a href="<?php echo Url::to(['tour/index']); ?>">Тури</a></li>
            <li><a href="<?php echo Url::to(['event/index']); ?>">Події</a></li>
        </ul>
    </div>
    

    <div class="container_footer_menu_bottom">
        <ul class="container_footer_menu_bottom_left">
            <li>+3 056 999 99 99</li>
            <li>mail@gmail.com</li>
        </ul>

        <ul class="container_footer_menu_bottom_right">
            &#169 Дивна україна
        </ul>
    </div>

    <div class="container_footer_social_networks">
        <ul>
            <li><a href="#" class="google_plus"><img src="<?= Yii::$app->request->baseUrl ?>/image/icons/Google+.svg" alt=""></a></li>
            <li><a href="#"><img class="facebook" src="<?= Yii::$app->request->baseUrl ?>/image/icons/Facebook.svg" alt=""></a></li>
        </ul>
    </div>
</div>

<!--<script src="library/jQuery.js"></script>-->
<!--<script src="library/materialize/js/materialize.js"></script>-->
<!--<script src="/bundle.js"></script>-->

<?php $this->endBody();?>
</body>
<?php $this->endPage();?>
</html>

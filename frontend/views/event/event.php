<?php
use yii\helpers\Url;

?>

<div id="container">
    <div id="bread_crumbs">
          <ul>
            <li><a href="<?php echo Url::to(['/']); ?>">Головна </a> /</li>
            <li><a href="<?php echo Url::to(['event/index']); ?>"> Події </a> /</li>
            <li><a href="#"> Дніпропетровські пороги - унікальне місце планети</a></li>
        </ul>
    </div>
    <div id="event_name_and_panoram">

    </div>

    <div id="event_about">
       
    </div>

    <div id="event_types">

    </div>

    <div id="event_map">
        <div id="map"></div>
            <ul class="event_map_buttons">
                <li id="whereEat" class="event_map_button_foot">Де поїсти</li>
                <li id="whereSleep" class="event_map_button_house">Де зупимитися</li>
            </ul>
    </div>

    <div id="event_share">
        <div class="event_share_title">Поділитись</div>
        <ul>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
        </ul>
    </div>


</div>



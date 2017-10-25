<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (!\Yii::$app->user->can('viewAdmin')) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Main', 'url' => ['/maindescription/index']],
            ['label' => 'City', 'url' => ['/city/index']],
            ['label' => 'Tour',
                'items' => [
                    ['label' => 'Tour', 'url' => ['/tour/index']],
                    ['label' => 'Tour type', 'url' => ['/tourtype/index']],
                    ['label' => 'Tour category', 'url' => ['/tourcategory/index']],

                ]],
            ['label' => 'Event',
                'items' => [
                    ['label' => 'Event Category', 'url' => ['/eventcategory/index']],
                    ['label' => 'Event ', 'url' => ['/event/index']],

                ]],
            ['label' => 'Point',
                'items' =>
                    [
                        ['label' => 'Point Category', 'url' => ['/pointcategory/index']],
                        ['label' => 'Point', 'url' => ['/point/index']],

                    ]],
            ['label' => 'Cafe',
                'items' => [
                    ['label' => 'Cafe type', 'url' => ['/cafetype/index']],
                    ['label' => 'Cafe', 'url' => ['/cafe/index']]
                ]],
            ['label' => 'Hotel',
                'items' => [
                    ['label' => 'Hotel', 'url' => ['/hotel/index']],
                    ['label' => 'Hotel type', 'url' => ['/hoteltype/index']],
                ]
            ],

        ];
    }
    if (Yii::$app->user->isGuest) {
       // $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

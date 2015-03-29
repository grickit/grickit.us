<?php
    use yii\helpers\Html;
    use common\components\StaticURL;
    use common\assets\AppAsset;

    AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags(); ?>
    <title><?php echo 'Union Hotel: '.Html::encode($this->title); ?></title>
    <?php $this->registerCSSFile(StaticURL::make('css','union.css'),['depends' => ['yii\bootstrap\BootstrapAsset']]); ?>
    <?php $this->head(); ?>
</head>
<body>

<?php $this->beginBody() ?>
    <header class="header">
        <nav class="container">
            <a href="/" class="brand"><img src="<?php echo StaticURL::make('images/union','logo_union.jpg'); ?>"></a>

            <ul class="navbar">
                <li><a href="/menu">Menu</a></li>
                <li><a href="/rooms">Bed &amp; Breakfast</a></li>
                <li><a href="/directions">Directions</a></li>
                <li><a href="/beer">Beer/Wine</a></li>
                <li><a href="/activities">Activities</a></li>
                <?php if(!Yii::$app->user->isGuest) { echo '<li><a href="/site/logout" data-method="post">Logout ('.Yii::$app->user->identity->username.')</a></li>'; } ?>
            </ul>
        </nav>
    </header>

    <div class="page">
        <div class="container">
            <?php echo $content; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Derek Hoagland <?php echo date('Y'); ?></p>
            <p class="pull-right">UNION HOTEL PROPOSAL<br>FOR DEMO USE ONLY</p>
        </div>
    </footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>

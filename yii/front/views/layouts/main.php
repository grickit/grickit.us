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
    <title><?php echo 'Grickit: '.Html::encode($this->title); ?></title>
    <?php $this->registerCSSFile(StaticURL::make('css','front.css')); ?>
    <?php $this->head(); ?>
</head>
<body>

<?php $this->beginBody() ?>
    <header class="header">
        <nav class="container">
            <a href="/" class="brand">grickit.us</a>

            <ul class="navbar">
                <li><a href="/article/view/about">About</a></li>
                <li><a href="/things">Things</a></li>
                <li><a href="/articles">Articles</a></li>
                <?php if(!Yii::$app->user->isGuest) { echo '<li><a href="/site/logout" data-method="post">Logout ('.Yii::$app->user->identity->username.')</a></li>'; } ?>
            </ul>
        </nav>
    </header>

    <div class="page">
        <div class="container">
            <div class="alert alert-warning" role="alert"><strong>Heads up!</strong> This site is missing hella content, yo.</div>
            <?php echo $content; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Derek Hoagland <?php echo date('Y'); ?></p>
            <p class="pull-right"><?php echo Yii::powered(); ?></p>
        </div>
    </footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>

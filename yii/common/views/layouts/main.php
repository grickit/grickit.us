<?php
use yii\helpers\Html;
use common\components\StaticURL;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

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
    <?php $this->head(); ?>
    <link rel="stylesheet" href="<?php echo StaticURL::make('css','main.css'); ?>">
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            $navtabs = array(
              ['label' => 'About', 'url' => ['/site/about']],
              ['label' => 'Things', 'url' => ['/thing/index']],
              ['label' => 'Articles', 'url' => ['/article/index']]
            );
            if(!Yii::$app->user->isGuest) {
              $navtabs[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
            }

            NavBar::begin([
                'brandLabel' => 'grickit.us',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $navtabs
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <div class="alert alert-warning" role="alert"><strong>Heads up!</strong> This site is still very much a work in progress.</div>
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

<?php
    use yii\helpers\Html;
    use common\components\StaticURL;
    use union\models\category;

    $this->title = 'Menu';
?>

<div class="menu index">
    <div class="content">
        <h1>Menu</h1>
        <?php
            foreach($dataProvider->getModels() as $category) {
                $category = new category($category);
                echo $this->render('_category',['model' => $category]);
            }
        ?>

        <div class="clear"></div>

        <div class="slideshow scale-container">
            <img class="scale active" src="<?php echo StaticURL::make('images/union','dining_1.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union','dining_2.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union','dining_3.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union','dining_5.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union','dining_5.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union','dining_6.jpg'); ?>">
        </div>
    </div>

    <div class="crud">
        <?php if (!\Yii::$app->user->isGuest) { echo Html::a('Create Category', ['category/create'], ['class' => 'btn btn-success']); } ?>
    </div>
</div>

<?php $this->registerJSFile(StaticURL::make('javascript','slideshow.js'),['depends' => ['yii\web\JqueryAsset']]); ?>
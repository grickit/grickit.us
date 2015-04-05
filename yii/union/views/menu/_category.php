<?php
  use yii\helpers\Html;
  use common\components\StaticURL;
?>

<div class="category tile" style="background-image: url('<?php echo StaticURL::make('images/union/categories',$model->nameSafe.'.jpg'); ?>');">
    <?php
        if (!\Yii::$app->user->isGuest) {
            echo Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/category/update', 'name' => $model->nameSafe], ['class' => 'icon edit']);
        }
    ?>

  <a class="category tile" href="<?php echo Yii::$app->urlManager->createURL("menu/".$model->nameSafe); ?>">
    <span class="category title"><?php echo $model->name; ?></span>
    <span class="priceGlobal"><?php if($model->priceGlobal) { echo " all available for only ".$model->formattedPrice."!"; } ?></span>
    <span class="notes"><?php echo $model->formattedNotes; ?></span>
  </a>

</div>

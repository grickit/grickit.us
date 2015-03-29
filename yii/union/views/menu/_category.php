<?php
  use yii\helpers\Html;
?>

<div class="category tile">

  <a class="category tile" href="<?php echo Yii::$app->urlManager->createURL("menu/".$model->nameSafe); ?>">
    <span class="category title"><?php echo $model->name; ?></span>
    <span class="priceGlobal"><?php if($model->priceGlobal) { echo " all available for ".$model->formattedPrice; } ?></span>
    <span class="notes"><?php echo $model->notes; ?></span>
  </a>

</div>

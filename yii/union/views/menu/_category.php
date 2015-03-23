<?php
  use yii\helpers\Html;
?>

<div class="category tile">

  <?php echo Html::a($model->name, Yii::$app->urlManager->createURL("menu/".$model->nameSafe), ['class'=> 'title link']); ?>
  <span class="summary"><?php echo $model->notes; ?></span></span>

</div>

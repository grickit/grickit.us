<?php
  use yii\helpers\Html;
?>

<div class="thing tile" style="background-image: url('/images/thing/icon/<?php echo $model->nameSafe; ?>.png');">
  <?php echo Html::a($model->name,Yii::$app->urlManager->createURL("thing/view/".$model->nameSafe)); ?>

</div>
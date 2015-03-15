<?php
  use yii\helpers\Html;
?>

<?php echo Html::a($tag->name,Yii::$app->urlManager->createURL("article/tagged/".$tag->nameSafe),array('class' => 'tag')); ?>
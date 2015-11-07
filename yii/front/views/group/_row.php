<?php
  use yii\helpers\Html;
  use common\components\StaticURL;
?>

<div class="group row">

  <div class="title"><?php echo Html::a($model->name,Yii::$app->urlManager->createURL("group/view/".$model->nameSafe),array('class' => 'link')); ?></div>

</div>
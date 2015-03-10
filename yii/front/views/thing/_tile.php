<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use common\components\StaticURL;
?>

<div class="thing tile">

  <?php echo Html::a('<span class="blurb"><span class="title">'.$model->name.'</span></span>',Yii::$app->urlManager->createURL("thing/view/".$model->nameSafe),array('class' => 'link', 'style' => "background-image: url('".StaticURL::make('images/thing/icon',$model->nameSafe.'.png')."');")); ?>   
  
  <?php echo $this->render('_like',['model' => $model, 'like' => $like]); ?>

</div>
<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use common\components\StaticURL;
?>

<div class="article tile">

  <?php echo Html::a('<span class="blurb"><span class="title">'.$model->name.'</span><span class="summary">Gambot is a modular, fully asynchronous, IRC bot framework. Extensions can be written in any language thanks to an API.</span></span>',Yii::$app->urlManager->createURL("article/view/".$model->nameSafe),array('class' => 'link', 'style' => "background-image: url('".StaticURL::make('images/article/icon',$model->nameSafe.'.png')."');")); ?>   
  
  <?php echo $this->render('_like',['model' => $model, 'like' => $like]); ?>

</div>
<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use common\components\StaticURL;
?>

<div class="article tile">

  <?php echo Html::a('<span class="blurb"><span class="title">'.$model->name.'</span><span class="summary">'.$model->summary.'</span></span>',Yii::$app->urlManager->createURL("article/view/".$model->nameSafe),array('class' => 'link', 'style' => "background-image: url('".StaticURL::make('images/article',$model->nameSafe.'.png')."');")); ?>   
  
  <?php echo $this->render('_like',['model' => $model, 'like' => $model->like]); ?>

</div>

<?php echo $this->render('_tags',['model' => $model]); ?>
<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use common\components\StaticURL;
?>
  <div class="thing tile">
    <?php echo Html::a('<span>'.$model->name.'</span>',Yii::$app->urlManager->createURL("thing/view/".$model->nameSafe),array('class' => 'thing tile', 'style' => "background-image: url('".StaticURL::make('images/thing/icon',$model->nameSafe.'.png')."');")); ?>   
    <?php
      $form = ActiveForm::begin([
        'method' => 'post',
        'action' => Yii::$app->urlManager->createURL("thing/view/".$model->nameSafe),
        'options' => array('class' => 'thing likes')
      ]);
    ?>
    <input type="hidden" name="<?php echo ($like ? 'unlike' : 'like'); ?>" value="<?php echo $model->id; ?>">
    <button type="submit" class="btn btn-success<?php echo ($like ? ' active' : ''); ?>" title="I like <?php echo $model->name; ?>!">
      <span class="badge"><?php echo $model->voteCount; ?> &hearts;</span>
    </button>
    <?php ActiveForm::end(); ?>
  </div>
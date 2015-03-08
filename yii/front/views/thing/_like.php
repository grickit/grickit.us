<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>  
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
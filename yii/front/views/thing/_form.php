<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="thing form">

    <?php
      $form = ActiveForm::begin();

      echo $form->errorSummary($model);
    ?>

    <div class="form-group">
      <?php
        echo $form->field($model,'name')->textInput(['maxlength' => 100]);
        echo $form->field($model,'content')->textArea(['maxlength' => 10000, 'rows' => 10]);
        echo $form->field($model,'linkURL')->textInput(['maxlength' => 300]);
        echo $form->field($model,'activeStatus')->checkBox(array('value' => 1, 'uncheckValue' => 0));
        echo $form->field($model,'publishedStatus')->checkBox(array('value' => 1, 'uncheckValue' => 0));
      ?>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
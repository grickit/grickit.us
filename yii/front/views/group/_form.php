<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="group form">

    <?php
      $form = ActiveForm::begin();

      echo $form->errorSummary($model);
    ?>

    <div class="form-group">
      <?php
        echo $form->field($model,'name')->textInput(['maxlength' => 100]);
      ?>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
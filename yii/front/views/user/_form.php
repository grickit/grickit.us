<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="user form">

    <?php
      $form = ActiveForm::begin();

      echo $form->errorSummary($model);
    ?>

    <div class="form-group">
      <?php
        echo $form->field($model,'username')->textInput(['maxlength' => 100]);
        echo $form->field($model,'name')->textInput(['maxlength' => 100]);
        echo $form->field($model,'email')->textInput(['maxlength' => 255]);
        echo $form->field($model,'updatePassword')->passwordInput();
        echo $form->field($model,'confirmPassword')->passwordInput();
        echo $form->field($model,'activeStatus')->checkBox(array('value' => 1, 'uncheckValue' => 0));
        echo $form->field($model,'adminStatus')->checkBox(array('value' => 1, 'uncheckValue' => 0));
      ?>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
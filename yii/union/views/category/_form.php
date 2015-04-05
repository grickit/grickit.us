<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="category form">

    <?php
      $form = ActiveForm::begin();

      echo $form->errorSummary($model);
    ?>

    <div class="form-group">
      <?php
        echo $form->field($model,'name')->textInput(['maxlength' => 100]);
        echo $form->field($model,'priceGlobal')->textInput(['maxlength' => 5]);
        echo $form->field($model,'order')->textInput(['maxlength' => 2]);
        echo $form->field($model,'notes')->textArea(['maxlength' => 1000, 'rows' => 5]);
        echo $form->field($model,'content')->textArea(['maxlength' => 5000, 'rows' => 10]);
        echo $form->field($model,'type')->dropDownList(array('food','alcohol','special'));
        echo $form->field($model,'publishedStatus')->checkBox(array('value' => 1, 'uncheckValue' => 0));
      ?>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
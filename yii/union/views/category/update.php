<?php
  use yii\helpers\Html;

  $this->title = 'Update ' . $model->name;
?>

<div class="category update">
  <div class="content">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form',['model' => $model]); ?>

  </div>
</div>
<?php
  use yii\helpers\Html;

  $this->title = 'Create Group';
?>

<div class="group create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form',['model' => $model]); ?>

</div>
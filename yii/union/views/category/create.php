<?php
  use yii\helpers\Html;

  $this->title = 'Create Category';
?>

<div class="category create">
  <div class="content">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form',['model' => $model]); ?>

    </div>
</div>
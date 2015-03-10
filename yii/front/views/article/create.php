<?php
  use yii\helpers\Html;

  $this->title = 'Create Article';
?>

<div class="article create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form',['model' => $model]); ?>

</div>
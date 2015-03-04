<?php
  use yii\helpers\Html;

  $this->title = 'Create Thing';
  $this->params['breadcrumbs'][] = ['label' => 'Things', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;
?>

<div class="thing create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form',['model' => $model]); ?>

</div>
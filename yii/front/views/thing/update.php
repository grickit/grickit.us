<?php
  use yii\helpers\Html;

  $this->title = 'Update ' . $model->name;
  $this->params['breadcrumbs'][] = ['label' => 'Things', 'url' => ['index']];
  $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'name' => $model->name]];
  $this->params['breadcrumbs'][] = 'Update';
?>
<div class="thing update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form',['model' => $model]); ?>

</div>
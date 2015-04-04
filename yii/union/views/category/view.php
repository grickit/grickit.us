<?php
  use yii\helpers\Html;

  $this->title = $model->name.' Menu';
?>

<div class="category view">
    <div class="content">

      <h1 class="title"><?php echo $model->name; ?></h1>
      <div class="priceGlobal"><?php if($model->priceGlobal) { echo "All available for ".$model->formattedPrice; } ?></div>
      <div class="notes"><?php echo $model->formattedNotes; ?></div>
      <div class="description"><?php echo $model->content; ?></div>

  </div>

    <div class="crud">
        <?php
            if (!\Yii::$app->user->isGuest) {
                echo Html::a('Update', ['update', 'name' => $model->nameSafe], ['class' => 'btn btn-primary']);
                echo ' ';
                echo Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
            }
        ?>
    </div>

</div>

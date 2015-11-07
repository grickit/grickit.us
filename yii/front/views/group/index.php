<?php
    use yii\helpers\Html;
    use common\models\group;

    $this->title = 'Groups';
?>

<div class="group index centered">
    <h1><?php echo $this->title; ?></h1>

    <?php
      foreach($dataProvider->getModels() as $group) {
        echo $this->render('_row',['model' => $group]);
      }
    ?>

    <div class="clear"></div>

    <div class="crud">
        <?php if (!\Yii::$app->user->isGuest) { echo Html::a('Create Group', ['create'], ['class' => 'btn btn-success']); } ?>
    </div>
</div>
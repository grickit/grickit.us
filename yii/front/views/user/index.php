<?php
    use yii\helpers\Html;
    use common\models\user;

    $this->title = 'Users';
?>

<div class="user index centered">
    <h1><?php echo $this->title; ?></h1>

    <?php
      foreach($dataProvider->getModels() as $user) {
        echo $this->render('_row',['model' => $user]);
      }
    ?>

    <div class="clear"></div>

    <div class="crud">
        <?php if (!\Yii::$app->user->isGuest) { echo Html::a('Create User', ['create'], ['class' => 'btn btn-success']); } ?>
    </div>
</div>
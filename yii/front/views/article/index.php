<?php
    use yii\helpers\Html;
    use front\models\article;

    $this->title = 'Articles';
?>

<div class="post index centered">
    <?php
      foreach($dataProvider->getModels() as $article) {
        $article = new Article($article);
        echo $this->render('_tile',['model' => $article]);
      }

    ?>

    <div class="clear"></div>

    <div class="crud">
        <?php if (!\Yii::$app->user->isGuest) { echo Html::a('Create Article', ['create'], ['class' => 'btn btn-success']); } ?>
    </div>
</div>
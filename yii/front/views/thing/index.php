<?php
    use yii\helpers\Html;
    use front\models\thing;

    $this->title = 'Things';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="thing index">
    <?php
      foreach($dataProvider->getModels() as $thing) {
        $thing = new Thing($thing);
        $like = $thing->findLike();
        echo $this->render('_tile',['model' => $thing, 'like' => $like]);
      }

    ?>
    <div class="clear"></div>

    <div class="crud">
        <?php
            if (!\Yii::$app->user->isGuest) {
                echo Html::a('Add Thing', ['create'], ['class' => 'btn btn-success']);
            }
        ?>
    </div>
</div>
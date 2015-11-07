<?php
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
    use common\components\StaticURL;

    $this->title = $model->name;
?>
<div class="user">
    <div class="document">

        <div class="banner" style="background-image: url('<?php echo StaticURL::make('images/group/banner',$model->nameSafe.'.png'); ?>');">
            <div class="title">
                <?php echo Html::encode($this->title); ?>
            </div>
        </div>

        <div class="content">
            <p>
                <?php
                    foreach($model->users as $index => $user) { echo "{$user->name}<br>"; }
                ?>
            </p>

            <p class="time">Last updated: <strong><?php echo $model->updateDate; ?> UTC</strong></p>
        </div>

    </div>

    <div class="crud">
        <?php
            if (!\Yii::$app->user->isGuest) {
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            }
        ?>
    </div>

</div>
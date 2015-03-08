<?php
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
    use common\components\StaticURL;

    $this->title = $model->name;
?>
<div class="thing">
    <div class="article">

        <div class="banner" style="background-image: url('<?php echo StaticURL::make('images/thing/banner',$model->nameSafe.'.png'); ?>');">
            <div class="title">
                <h1><?php echo Html::encode($this->title); ?></h1>
            </div>
            <?php echo $this->render('_like',['model' => $model, 'like' => $like]); ?>
        </div>

        <div class="content">
            <p><?php echo ($model->activeStatus ? '<span class="label label-success">Project is active</span>' : '<span class="label label-default">Project is inactive</span>'); ?></p>
            <p class="updated">This page last updated: <strong><?php echo $model->updateDate; ?> UTC</strong></p>
            <?php echo HtmlPurifier::process($model->description); ?>
            <p class="stinger"><?php echo Html::a('Project homepage', $model->linkURL, array('target' => '_blank')); ?></p>
        </div>

    </div>

    <div class="crud">
        <?php
            if (!\Yii::$app->user->isGuest) {
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
                echo ' ';
                echo Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]);
            }
        ?>
    </div>

</div>
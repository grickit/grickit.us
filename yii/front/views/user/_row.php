<?php
  use yii\helpers\Html;
  use common\components\StaticURL;
?>

<div class="user row">

  <div class="avatar">
    <img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($model->email))); ?>?d=retro">
  </div>

  <div class="title"><?php echo Html::a($model->name,Yii::$app->urlManager->createURL("user/view/".$model->nameSafe),array('class' => 'link')); ?></div>

  <div class="subtitle">@<?php echo $model->username; ?></div>

  <div class="status">
    <?php echo ($model->adminStatus ? '<span class="label label-warning">Account is administrator</span>' : ''); ?>
    <?php echo ($model->activeStatus ? '<span class="label label-success">Account is active</span>' : '<span class="label label-default">Account is inactive</span>'); ?>
  </div>
  
  <div class="group list">
    Groups:
    <?php
      $delimiter = '';
      foreach($model->groups as $index => $group) {
        echo $delimiter.$group->name;
        $delimiter = ', ';
      }
    ?>
  </div>
</div>
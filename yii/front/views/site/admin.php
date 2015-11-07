<?php
    use yii\helpers\Html;

    $this->title = 'Administration';
?>
<div class="site admin">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <li><a href="/users">Users</a></li>
        <li><a href="/groups">Groups</a></li>
    </ul>
</div>

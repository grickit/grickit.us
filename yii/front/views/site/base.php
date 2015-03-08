<?php
    use yii\helpers\Html;
    use common\components\StaticURL;

    $this->title = 'Arbitrary Base Converter';
?>

<div class="site base">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <div id="fromText-group" class="form-group">
        <?php
            echo Html::label('Source string','fromText',array('class' => 'control-label'));
            echo Html::textArea('fromText','9001',array('id' => 'fromText', 'class' => 'form-control'));
        ?>
    </div>

    <div id="fromBase-group" class="form-group">
        <?php
            echo Html::label('Convert from base','fromBase',array('class' => 'control-label'));
            echo Html::textInput('fromBase','10',array('id' => 'fromBase', 'class' => 'form-control'));
        ?>
    </div>

    <div id="toBase-group" class="form-group">
        <?php
            echo Html::label('Convert to base','toBase',array('class' => 'control-label'));
            echo Html::textInput('toBase','62',array('id' => 'toBase', 'class' => 'form-control'));
        ?>
    </div>

    <div id="toText-group" class="form-group">
        <?php
            echo Html::label('Result','toText',array('class' => 'control-label'));
            echo Html::textArea('toText','',array('id' => 'toText', 'class' => 'form-control', 'disabled' => 'disabled'));
        ?>
    </div>

    <div class="form-group">
        <?php echo Html::button('Convert',array('id' => 'convert', 'class' => 'btn btn-success')); ?>
    </div>

    <h3>Advanced Options</h3>
    <div id="fromCharset-group" class="form-group">
        <?php
            echo Html::label('Source charset','fromCharset',array('class' => 'control-label'));
            echo Html::textInput('fromCharset','0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/',array('id' => 'fromCharset', 'class' => 'form-control'));
        ?>
    </div>

    <div class="form-group">
        <?php echo Html::button('Reset',array('id' => 'resetFromCharset', 'class' => 'btn btn-warning')); ?>
    </div>

    <div id="toCharset-group" class="form-group">
        <?php
            echo Html::label('Result charset','toCharset',array('class' => 'control-label'));
            echo Html::textInput('toCharset','0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/',array('id' => 'toCharset', 'class' => 'form-control'));
        ?>
    </div>

    <div class="form-group">
        <?php echo Html::button('Reset',array('id' => 'resetToCharset', 'class' => 'btn btn-warning')); ?>
    </div>
</div>

<?php $this->registerJsFile(StaticURL::make('javascript','base.js'),['depends' => [\yii\web\JqueryAsset::className()]]); ?>

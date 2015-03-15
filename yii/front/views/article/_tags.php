<div class="tags">
Tagged: 
<?php
    $delim = '';
    foreach($model->tags as $tag) {
        echo $delim.$this->render('_tag',['model' => $model, 'tag' => $tag]);
        $delim = ',';
    }
?>
</div>
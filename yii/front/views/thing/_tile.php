<?php
  use yii\helpers\Html;

   echo Html::a('<span>'.$model->name.'</span>',Yii::$app->urlManager->createURL("thing/view/".$model->nameSafe),array('class' => 'thing tile', 'style' => "background-image: url('/images/thing/icon/".$model->nameSafe."');"));
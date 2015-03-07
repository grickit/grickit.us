<?php
  use yii\helpers\Html;
  use common\components\StaticURL;

   echo Html::a('<span>'.$model->name.'</span>',Yii::$app->urlManager->createURL("thing/view/".$model->nameSafe),array('class' => 'thing tile', 'style' => "background-image: url('".StaticURL::make('images/thing/icon',$model->nameSafe.'.png')."');"));
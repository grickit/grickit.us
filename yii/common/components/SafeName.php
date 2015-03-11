<?php
  namespace common\components;

  use Yii;
  use yii\base\Component;
  use yii\base\InvalidConfigException;

  class SafeName extends Component {

    public function make($name) {
      $name = preg_replace("/[^a-zA-Z0-9 ]/",'',$name);
      $name = preg_replace("/ /",'_',$name);
      echo $name; die();
      return $name;
    }
  }
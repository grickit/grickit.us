<?php
  namespace common\components;

  use Yii;
  use yii\base\Component;
  use yii\base\InvalidConfigException;

  class SafeName extends Component {

    public function make($name) {
      return substr( strtolower( preg_replace("/ +/",'_', preg_replace("/[^a-zA-Z0-9 ]/",'',$name) ) ), 0, 100);
    }
  }
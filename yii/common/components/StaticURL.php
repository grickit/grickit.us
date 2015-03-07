<?php
  namespace common\components;

  use Yii;
  use yii\base\Component;
  use yii\base\InvalidConfigException;

  class StaticURL extends Component {

    public function make($path,$file) {
      return "http://static.".$_SERVER['MACHINE']."/${path}/".filemtime("/var/www/grickit.us/static/${path}/${file}")."_${file}";
    }
  }
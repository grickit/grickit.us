<?php
  namespace common\components;

  use Yii;
  use yii\base\Component;
  use yii\base\InvalidConfigException;

  class StaticURL extends Component {

    public function make($path,$file) {
      $localpath = "/var/www/grickit.us/static/${path}/";
      $localfile = "${localpath}${file}";

      $mtime = (file_exists($localfile) ? filemtime($localfile) : 0);

      $webpath = "http://static.".$_SERVER['MACHINE']."/${path}/";
      $webfile = "${webpath}${file}";

      $cachefile = "${webpath}${mtime}_${file}";
      return $cachefile;
    }
  }
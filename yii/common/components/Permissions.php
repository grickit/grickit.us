<?php
  namespace common\components;

  use Yii;
  use yii\base\Component;
  use yii\base\InvalidConfigException;

  class Permissions extends Component {

    public const ADMINISTRATOR = 1;
    public const MODERATOR = 1;
    public const USER_CREATE = 2;
    public const USER_UPDATE = 3;

    // Permissions should have a name and a scope
    // ADMINISTRATOR+GLOBAL
    // MODERATOR+GLOBAL
    // ADMINISTRATOR+SITE
    // USER_CREATE+SITE
    // ARTICLE_CREATE+BLOCKED

  }
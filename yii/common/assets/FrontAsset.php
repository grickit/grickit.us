<?php
    namespace common\assets;

    use yii\web\AssetBundle;
    use common\components\StaticURL;

    class FrontAsset extends AssetBundle {
        $frontcsspath = 'css/'.filemtime('/var/www/grickit.us/static/css/front.css').'_front.css';

        public $sourcePath = null;
        public $basePath = '@webroot';
        public $baseUrl = '@web';
        public $css = [
            $frontcsspath
        ];
        public $js = [
        ];
        public $depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapAsset',
        ];
    }
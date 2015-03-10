<?php
    use yii\helpers\Html;
    use common\components\StaticURL;

    $this->title = 'About';
?>

<div class="site about">
  <div class="document">

    <div class="banner" style="background-image: url('<?php echo StaticURL::make('images/site/banner','about.png'); ?>');">
        <div class="title">
            <h1><?php echo Html::encode($this->title); ?></h1>
        </div>
    </div>

    <div class="content">
        <p class="time">Last updated: <strong><?php echo date('Y-m-d H:i:s',filemtime(__FILE__)) ?> UTC</strong></p>
        <p>Succinct version: I'm a feminist dork from the internet. I have way too many hobbies and projects and interests. This website serves to quasi-organize them.</p>
        <p>
          <ul>
            <li>Name: Derek Hoagland</li>
            <li>Email: thegrickit [at] gmail [dot] com</li>
            <li>Twitter: <a href="https://twitter.com/Grickit">here</a></li>
            <li>Youtube: <a href="https://www.youtube.com/user/AWildGrickit">here</a></li>
            <li>Location: A boring and backwards part of central Pennsylvania</li>
          </ul>
        </p>
        <p>Gambit is the coolest X-Men character and if you disagree, let's grab some food and talk this out.</p>
    </div>

  </div>
</div>

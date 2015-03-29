<?php
    use common\components\StaticURL;
    $this->title = 'Rooms';
?>
<div class="site rooms">
  <div class="content">
    <h1>Bed &amp; Breakfast</h1>
    <p>All rooms include television, safe, and a complimentary breakfast.<p>
    <p>King Suite $189 a night, King $149 a night, Queen $129 a night.</p>

    <div style="max-width: 700px; margin-left: auto; margin-right: auto;">
      <script type="text/javascript" src="http://www.booking.com/general.html?tmpl=bookit;aid=330843;lang=en-us;hotel_id=1003018;cc1=us;hotel_page=the-union"></script>
    </div>

    <div class="slideshow">
      <img class="scale active" src="<?php echo StaticURL::make('images/union','room_1.jpg'); ?>">
      <img class="scale" src="<?php echo StaticURL::make('images/union','room_2.jpg'); ?>">
      <img class="scale" src="<?php echo StaticURL::make('images/union','room_3.jpg'); ?>">
      <img class="scale" src="<?php echo StaticURL::make('images/union','conference_1.jpg'); ?>">
      <img class="scale" src="<?php echo StaticURL::make('images/union','bathroom_1.jpg'); ?>">
      <img class="scale" src="<?php echo StaticURL::make('images/union','bathroom_2.jpg'); ?>">
    </div>

  </div>
</div>

<?php $this->registerJSFile(StaticURL::make('javascript','slideshow.js'),['depends' => ['yii\web\JqueryAsset']]); ?>
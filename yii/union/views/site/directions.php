<?php
    use common\components\StaticURL;
    $this->title = 'Directions';
?>
<div class="site directions">
    <div class="content">
      <h1>Directions</h1>

        <div class="scale-container">
          <img class="scale-half" src="<?php echo StaticURL::make('images/union','building_front.jpg'); ?>">
          <img class="scale-half" src="<?php echo StaticURL::make('images/union','building_side.jpg'); ?>">
        </div>

        <div class="map">
          <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=128%20E%20Main%20St%2C%20Everett%2C%20PA%2015537%2C%20United%20States&key=AIzaSyDW1Tn3NOrSJIN21yBxlrv5mpns_jtezag"></iframe>
          <br>
          <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=128+East+Main+Street,+Everett+PA&amp;sll=40.011855,-78.371208&amp;sspn=0.010272,0.021136&amp;t=m&amp;g=128+East+Main+Street,+Everett+PA&amp;ie=UTF8&amp;hq=&amp;hnear=128+E+Main+St,+Everett,+Pennsylvania+15537&amp;ll=40.01506,-78.384447&amp;spn=0.032868,0.059996&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
        </div>

    </div>
</div>

<?php $this->registerJSFile(StaticURL::make('javascript','slideshow.js'),['depends' => ['yii\web\JqueryAsset']]); ?>
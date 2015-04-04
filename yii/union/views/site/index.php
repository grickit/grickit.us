<?php
    use common\components\StaticURL;
    $this->title = 'Home';
?>
<div class="site index">

    <h1>The Everett Union Hotel</h1>
    <div class="blurb">
        <div class="opening">Opens at 11:00 am daily!</div>
        <div class="address">128 East Main Street Everett, PA 15537</div>
        <div class="phone">Phone: (814)-348-1210</div>
        <div class="fax">Fax: (814)-348-1221</div>
    </div>

    <div class="content">

        <div class="social">
          <a href="https://twitter.com/TheUnionEverett"><img src="<?php echo StaticURL::make('images/union','twitter.png'); ?>" alt="Follow @TheUnionEverett on Twitter!" title="Follow @TheUnionEverett on Twitter!"></a>
          <a href="https://www.facebook.com/pages/The-Union-Hotel-Everett-PA/207917256598"><img src="<?php echo StaticURL::make('images/union','facebook.png'); ?>" alt="Like The-Union-Hotel-Everett-PA on Facebook!" title="Like The-Union-Hotel-Everett-PA on Facebook1"></a>
          <a href="http://instagram.com/everettunionhotel?ref=badge"><img src="<?php echo StaticURL::make('images/union','instagram.png'); ?>" alt="Follow EverettUnionHotel on Instagram!" title="Follow EverettUnionHotel on Instagram!"></a>
          <br>
          Follow us on Twitter and like us on Facebook! See our photos on Instagram.
        </div>

        <div class="slideshow scale-container">
            <img class="scale active" src="<?php echo StaticURL::make('images/union/slideshow_food','food_1.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union/slideshow_food','food_2.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union/slideshow_food','food_3.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union/slideshow_food','food_4.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union/slideshow_food','food_5.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union/slideshow_food','food_6.jpg'); ?>">
            <img class="scale" src="<?php echo StaticURL::make('images/union/slideshow_food','food_7.jpg'); ?>">
        </div>

        <p>We are preparing all our food ourselves, and people can taste the difference.</p>

        <p>We bake bread in the morning and afternoon. We grind our own beef for our burgers and meatballs. We cure our own brisket for corned beef. We grind our own pork and mix it with 10 different spices to make our sausage.</p>

        <p>Our pasta is as fresh as it comes. We actually make our fettuccini and linguini pasta to order. When the pasta hits your table it is less than 10 minutes old. But it doesn't stop there. We make our own soups, desserts, fresh-cut fries and sauces daily. We batter our own fish, pickles and shrimp. We bread our own chicken, mozzarella cheese, mac n cheese balls and ravioli. We even smoke our wings before we fry them to get an extra layer of flavor. We make all 4 of our house rubs.</p>

        <p>The best part is... You can enjoy all of this great food from any seat in the house. You can sit upstairs and order wings and cheeseburgers, or you can have pasta or a steak in the Bullshead Tavern.</p>

        <p>We are reinventing casual upscale dining. Come enjoy a relaxed atmosphere in the Bambino House of Pasta Room. Dress up for date night and get table cloth service in Top Hat Steakhouse Room. Or, kick back and unwind in the Bullshead Tavern.</p>

    </div>
</div>

<?php $this->registerJSFile(StaticURL::make('javascript','slideshow.js'),['depends' => ['yii\web\JqueryAsset']]); ?>
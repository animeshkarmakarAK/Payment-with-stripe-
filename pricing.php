<?php 

require_once('config.php');


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>pricing page</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>

<style type="text/css">
.container{
margin-top: 100px;
}
.card {
width: 300px;
}
.card:hover{
transition: width 2s linear 1s;
transition-duration: 3s;
transition-delay: 2s;
transition-timing-function: linear;
transform: scale(1.05);
}
.product-id{
font-size: 22px;
}
.currency {
font-size: 21px;
position: relative;
top: -13px;
margin-right: -11px;
}
</style>

<div class="container">
  <?php
   $colNum = 1; 
     foreach ($products as $productId => $attributes) {
       if($colNum == 1)
        echo '<div class="row">';

      echo '

              <div class="col-md-4">
              <div class="card">
                <div class="card-header text-center">
                  <h2 class="price"><span class="currency">$</span> '.($attributes['price']/100).' </h2>
                </div>
                <div class="card-body text-center">
                  <div class="card-title">
                    <h1 class= "product-id">'.($attributes['title']).'</h1>
                  </div>
                  <div class = "list-group">
                  ';

                  foreach ($attributes['features'] as $features) {
                    echo '<li class="list-group-item">'.$features.'</li>';
                  }
                  echo '
                 <br>
                <form action = "stripeIPN.php?id='.$productId.'" method="POST">
                  <script
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                  data-key="'.$stripeDetails['publishableKey'].'"
                  data-amount="'.$attributes['price'].'"
                  data-name="'.$attributes['title'].'"
                  data-description="Example charge"
                  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                  data-locale="auto">
                  </script>
                </form>

                  </div>
                </div>
              </div>
            </div>
      ';

      if($colNum == 3){
        echo '</div>';
        $colNum = 0;
      }else $colNum++;

     }
   ?>

  </body>
</html>

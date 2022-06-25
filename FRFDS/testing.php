<!DOCTYPE html>
<html>
<head>
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>
</head>
<body>

<h2>Star Rating</h2>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<?php
$rating=4;
for ($i=0; $i<$rating; $i++){ ?>
  <span class="fa fa-star checked"></span>
<?php }

if ($rating < 5){
  $start=5-$rating;?>
  <span class="fa fa-star"></span>
<?php
}
?>
<?php
if ($rating < 5){
  $star=5-$rating;
  for ($i=0; $i<$star; $i++)
?>
    <i class="fa-solid fa-star"></i>
<?php

}
?>
</body>
</html>

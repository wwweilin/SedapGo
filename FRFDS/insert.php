<?php
session_start();
@include "pdo.php";

if(isset($_POST['add_food'])){
  $f_name = $_POST['f_name'];
  $f_price = $_POST['f_price'];
  $f_image = $_FILES['f_image']['name'];
  $f_image_tmp_name = $_FILES['f_image']['tmp_name'];
  $f_image_folder = 'img/'. $f_image;
  $f_rating = $_POST['f_rating'];

  $insert_stmt = $pdo->prepare("INSERT INTO food (food_name, unit_price, image, rating)
  VALUES (:name, :price, :image, :rating)");
  $insert_stmt->execute(array(
              ':name' => $f_name,
              ':price' => $f_price,
              ':image' => $f_image,
              ':rating' => $f_rating));
  if ($insert_stmt) {
    move_uploaded_file($f_image_tmp_name, $f_image_folder);
    $_SESSION['message'] = "Food item added successfully.";
  }else{
    $_SESSION['message'] = "Food item is not added successfully.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Food Item</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles.css">

</head>
<body>
  <?php
  if(isset($_SESSION['message'])){
      echo '<div class="message"><span>' . $_SESSION['message']. '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
      unset($_SESSION['message']);
   }


  ?>
  <?php include "header.php";?>

  <div class="container">

  <section>

  <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new food item</h3>
   <input type="text" name="f_name" placeholder="enter the food name" class="box" required>
   <input type="number" name="f_price" step="0.01" min="0" placeholder="enter the food unit price" class="box" required>
   <input type="file" name="f_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="number" name="f_rating" step="0.01" min="0" max="5" placeholder="enter the food rating" class="box" required>
   <input type="submit" value="add new food item" name="add_food" class="btn">
  </form>

</section>
</div>
  <!-- custom js file link  -->
  <script src="script.js"></script>

</body>
</html>

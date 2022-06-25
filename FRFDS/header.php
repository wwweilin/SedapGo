<?php require_once "pdo.php";?>

<header class="header">

   <div class="flex">

      <img src="img/logo.png" class="logo" alt="SedapGo"/>

      <nav class="navbar">
         <a href="index.php">View Products</a>
      </nav>

      <?php
      $stmt = $pdo->prepare("SELECT * FROM cart");
      $stmt->execute();
      $row_count = $stmt->rowCount();

      ?>

      <a href="insert.php" class="cart">Add Products<span></a>

    

   </div>

</header>

<?php require_once "pdo.php";?>

<header class="header">

   <div class="flex">

      <img src="img/logo.png" class="logo" alt="SedapGo"/>

      <nav class="navbar">
         <a href="index.php">view products</a>
      </nav>

      <?php
      $stmt = $pdo->prepare("SELECT * FROM cart");
      $stmt->execute();
      $row_count = $stmt->rowCount();

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>

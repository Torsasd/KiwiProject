<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Elements</title>
  <link rel="stylesheet" href="stylesfaq.css"> </head>
  <body>
    <header>
    <nav class="nav">
        <ul>
          <li><a href="inex.html">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="aanvraag.php">aanvraag doen</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    <div class="logo">
      <img src="cropped-logo.png" alt="Logo"> 
    </div>
  </header>
  <main>
    <?php
    try {
     $db = new PDO("mysql:host=localhost;dbname=school", "root", "");

     $statement = $db->prepare("SELECT * FROM faq");
     $statement->execute();

      $results = $statement->fetchAll();
      echo "<table class='faqtable'>";
      foreach ($results as $data) {
        echo "<tr>";
        echo $data["post"] . "<br>";
        echo "</tr>";
      }
      echo "</table>";
    } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
    ?>
  </main>
  


</body>

</html>



<?php


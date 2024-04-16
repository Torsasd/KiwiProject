



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
  </main>
  


</body>

</html>










<?php




    try{
        $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
        $nieuwsbericht = $db->prepare("SELECT * FROM `nieuws`");
        $nieuwsbericht->execute();


        $result = $nieuwsbericht->fetchAll();


        echo "<table>";

        foreach($result as $data) {
            echo "<tr>";
            echo $data["nieuwsbericht"] . "<br>";
            echo "</tr>"; 

        }
        echo "</table>";



    } catch (PDOexpetion $e) {
        echo "connection failed" . $e->getMessage();
    }





?>
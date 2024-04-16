<!DOCTYPE html>
<html>
<head>
  <title>Repair Request</title>
  <link rel="stylesheet" href="styleaanvraag.css">
</head>
<body>
  <header>
    <nav class="nav">
      <ul>
        <li><a href="inex.html">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <div class="logo">
      <img src="cropped-logo.png" alt="Company Logo">
    </div>
  </header>
  <main>
  <div class="background-image"></div>
  <div class="inputsaanvraag">
    <form method="post" target="aanvraag.php">
      <select name="device_type" id="cars">
        <option></option>
        <option value="telefoon">Telefoon</option>
        <option value="pc">PC</option>
        <option value="appel pc/mac">Apple PC/Mac</option>
        <option value="laptop">Laptop</option>
        <option value="other">Other</option>
      </select>
      <input type="comment" class="dropbox" name="probleem" placeholder="Probleem">
      <input type="text" class="" name="telefoon_nummer" placeholder="Phone Number">
      <input type="text" class="" name="email" placeholder="Email">
      <input type="text" class="" name="computernaam" placeholder="Computer Name">
      <input type="submit" class="knop1" value="Submit">
    </form>
  </div>
  </main>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $probleem = $_POST["probleem"];
    $telefoon_nummer = $_POST["telefoon_nummer"];
    $email = $_POST["email"];
    $computernaam = $_POST["computernaam"];
    $device_type = $_POST["device_type"];

    try {

        // Check if the submitted values are not empty
        if (!empty($device_type) && !empty($computernaam) && !empty($email) && !empty($telefoon_nummer) && !empty($probleem)) {
            $db  = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $send = $db->prepare("INSERT INTO reparatie_aanvraag (device_type, ID, computer_naam, probleem, contact_ID) VALUES (:device_type, NULL, :computernaam, :probleem, (SELECT MAX(ID) FROM contact_info));");  
            $send2 = $db->prepare("INSERT INTO contact_info (telefoon_nummer, ID, email) values (:telefoon_nummer, NULL, :email)");

            $send2->bindParam(':email', $email);
            $send2->bindParam(':telefoon_nummer', $telefoon_nummer);
            $send2->execute();

            $send->bindParam(':device_type', $device_type);
            $send->bindParam(':computernaam', $computernaam);
            $send->bindParam(':probleem', $probleem);
            $send->execute();


            // Unset the variables after successful submission
            unset($probleem, $telefoon_nummer, $email, $device_type, $computernaam);
            header("location: succes.html");
        }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

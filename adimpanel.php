<?php

//select query for the adminpanel passwords
$db  = new PDO("mysql:host=localhost;dbname=school", "root", "");
$query = $db->prepare("SELECT * FROM adminpanel");
$query->execute();
$result = $query->fetchAll();


//joins for the aanvraag
$join = $db->prepare("SELECT reparatie_aanvraag.*, contact_info.* FROM reparatie_aanvraag INNER JOIN contact_info ON reparatie_aanvraag.contact_ID = contact_info.ID;");
$join->execute();
$result1 = $join->fetchAll();

echo "<table class='table1'>";
foreach($result as $data) { 
    echo "<tr>";
    echo "<td>" . $data["User_name"] . "</td>";
    echo "<td>" . $data["ID"] . "</td>";
    echo "</tr>";       
}
echo "</table>";


echo "<table class='table1'>";
foreach($result1 as $data) { 
    echo "<tr>";
    echo "<td>" . $data["computer_naam"] . "</td>";
    echo "<td>" . $data["Password"] . "</td>";
    echo "<td>" . $data["computer_naam"] . "</td>";
    echo "<td>" . $data["Password"] . "</td>";
    echo "</tr>";       
}
echo "</table>";






// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $useradd = $_POST["useradd"];
    $passwordadd = $_POST["passwordadd"];

    try {

        // Check if the submitted values are not empty
        if (!empty($useradd) && !empty($passwordadd)) {
            $send = $db->prepare("INSERT INTO `adminpanel` (`User_name`, `Password`, `ID`) VALUES (:useradd, :passwordadd, NULL);");
            $send->bindParam(':useradd', $useradd);
            $send->bindParam(':passwordadd', $passwordadd);
            $send->execute();

            // Unset the variables after successful submission
            unset($useradd, $passwordadd);
        }

    

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" class="adduser">
        <p>add user</p>
        <input type="text" name="useradd">
        <input type="password" name="passwordadd">
        <input type="submit">
    </form>
</body>
</html>

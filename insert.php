<?php
require_once 'dbconnectie.php';
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $class = $_POST["class"];

  if ($name == '' || $class == '') {
    $alertMessage = "Geen leerling gegevens toegevoegd";
  } else {
    $leerlingen = $db->prepare("SELECT * FROM leerlingen");
    $leerlingen->execute();
    $result = $leerlingen->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as &$data) {
      $studentName = $data["name"];
      $studentClass = $data["class"];
    }
    if ($name == $studentName) {
      $alertMessage = "Leerling bestaat al!";
    } else {
      $submitStudent = $db->prepare("INSERT INTO leerlingen (name, class) VALUES (:name, :class)");
      $submitStudent->bindParam("name", $name);
      $submitStudent->bindParam("class", $class);
      if ($submitStudent->execute()) {
        $alertMessage = "$name in klas $class is toegevoegd";
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School</title>
</head>
<body>
  <form action="" method="post">
    <label for="name">Naam</label>
    <input type="text" name="name"><br>
    <label for="class">Klas</label>
    <input type="text" name="class"><br>
    <button type="submit" name="submit">Toevoegen</button>
  </form>
  <div class="alert"><?php if(isset($alertMessage)) { echo $alertMessage; } else { echo ''; } ?></div>
  <a href="index.php">Terug naar home</a>
</body>
</html>
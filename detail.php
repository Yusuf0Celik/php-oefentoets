<?php
require_once 'dbconnectie.php';

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$students = $db->prepare("SELECT * FROM leerlingen WHERE id = :id");
$students->bindParam("id", $id);
$students->execute();
$studentsResult = $students->fetch(PDO::FETCH_ASSOC);

$tests = $db->prepare("SELECT * FROM test WHERE student_id = :id");
$tests->bindParam("id", $id);
$tests->execute();
$testsResult = $tests->fetchAll(PDO::FETCH_ASSOC);

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
  <h1><?php echo $studentsResult["name"]; ?></h1>
  <?php
  $i = 0;
  foreach ($testsResult as &$data) {
    $subject = $data["subject"];
    $mark = $data["mark"];

    echo $subject . ' ' . $mark . '<br>';
    $i = $i + $mark;
  }
  echo $i / count($testsResult);
  ?>
  <a href="index.php">Leerling toevoegen</a>
</body>
</html>
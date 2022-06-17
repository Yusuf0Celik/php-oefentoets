<?php
require_once 'dbconnectie.php';

$students = $db->prepare("SELECT * FROM leerlingen");
$students->execute();
$studentsResult = $students->fetchAll(PDO::FETCH_ASSOC);

$tests = $db->prepare("SELECT * FROM test");
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
  <table border="1">
      <thead>
        <tr>
          <td>Naam</td>
          <td>Gemiddelde</td>
        </tr>
      </thead>
      <tbody>
      <?php
      for ($a=0; $a < count($studentsResult); $a++) {
        $studentName = $studentsResult[$a]["name"];
        echo
        "
        <?
        <tr>
          <td>
            $studentName
          </td>
          <td>
            ERROR
          </td>
        </tr>
        ";
      }
      ?>
  </tbody>
  </table>

  <div class="total-students">
    Aantal leerlingen is 
    <?php
    echo count($studentsResult);
    ?>
  </div>
  <a href="insert.php">Leerling toevoegen</a>
</body>
</html>
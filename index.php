<?php
require_once 'dbconnectie.php';

$students = $db->prepare("SELECT * FROM leerlingen");
$students->execute();
$result = $students->fetchAll(PDO::FETCH_ASSOC);

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
        <td>Klas</td>
        <td>Cijfers</td>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($result as &$data) {
        $studentName = $data["name"];
        $studentClass = $data["class"];
        $studentId = $data['id'];
        echo
        "
        <?
        <tr>
          <td>
            $studentName
          </td>
          <td>
            $studentClass
          </td>
          <td>
            <a href='detail.php?id=$studentId'>Cijfers</a>
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
    echo count($result);
    ?>
  </div>
  <a href="insert.php">Leerling toevoegen</a>
</body>
</html>
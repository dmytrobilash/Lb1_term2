<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>ЛБ1</title>
</head>
<h2>Вывод базы данных занятий преподавателя</h2>

<?php
include "connection.php";
$auditorium = $_GET['auditorium'];
$sqlSelect = $dbh->prepare("SELECT * from $db.lesson where $db.lesson.auditorium = :auditorium");
$sqlSelect->execute(array('auditorium' => $auditorium));
//$sqlSelect->bindParam(1, $groups, PDO::PARAM_STR, 10);
//$sqlSelect->execute();
echo "<table border ='1'>";
echo "<tr><th>Auditorium</th><th>Day</th><th>Number</th><th>Disciple</th><th>Type</th></tr>";
while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
    echo "<tr><td>$cell[3]</td><td>$cell[1]</td><td>$cell[2]</td><td>$cell[4]</td><td>$cell[5]</td></tr>";
}
//foreach($dbh->query($sqlSelect) as $cell)
//{   
  //  echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td>$cell[6]</td><td>$cell[7]</td><td>$cell[8]</td><td>$cell[9]</td></tr>";
//}
echo "</table>";
?>
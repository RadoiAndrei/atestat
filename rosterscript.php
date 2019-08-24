<?php
$idClasa = isset($_GET['idClasa']) ? $_GET['idClasa'] : NULL;
$con=mysqli_connect("localhost","Radoi","admin","mydb");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,'SELECT * FROM elevi WHERE Clase_idClasa="'. $idClasa .'" ORDER BY numeElev');
echo "<table id=\"roster\" class=\"sortable\">
<tr>
<th style=\"text-align: center;\">Nume elev</th>
<th style=\"text-align: center;\">Localitatea</th>
<th style=\"text-align: center;\">Ziua de nastere</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo '<tr class="clickable-row" data-href="profile.php?idElev=' . $row['idElev'] .'">';
echo "<td style=\"text-align: center;\">" . $row['numeElev'] . "</td>";
echo "<td style=\"text-align: center;\">" . $row['orasElev'] . "</td>";

$time = strtotime($row['birthdayElev']);
$day = date('j', $time);
$month_number = date('n', $time);
$year = date('Y', $time);

$romanian_months = [
'Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'
];
$month = $romanian_months[$month_number - 1];
echo "<td style=\"text-align: center;\">" . $day." ".$month." ".$year . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
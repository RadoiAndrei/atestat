<?php

//Get nume elev
function getNumeElev(){
    $idElev = $_GET["idElev"];
    $con = mysqli_connect("localhost","Radoi","admin","mydb");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

$numeElev = NULL;
$result = mysqli_query($con,"SELECT numeElev FROM elevi WHERE idElev='$idElev'");
if(!$result){
}
else
while($row = mysqli_fetch_array($result))
    $numeElev = $row['numeElev'];
echo $numeElev;
}

//Get clasa elev
function getClasaElev(){
    $idElev = $_GET["idElev"];
    $con = mysqli_connect("localhost","Radoi","admin","mydb");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

$idClasa = NULL;
$result = mysqli_query($con,"SELECT clase_idClasa FROM elevi WHERE idElev='$idElev'");
if(!$result){
}
else
while($row = mysqli_fetch_array($result))
    $idClasa = $row['clase_idClasa'];
echo $idClasa;
}

function averageGrades($materie){
    $idElev = $_GET["idElev"];
    $con = mysqli_connect("localhost","Radoi","admin","mydb");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Get teza
$teza = NULL;
$result = mysqli_query($con,"SELECT teza FROM note WHERE cursuri_idCurs='$materie' AND elevi_idElev='$idElev'");
if(!$result){
}
else
while($row = mysqli_fetch_array($result))
    $teza = $row['teza'];

//Get grades from database
$result = mysqli_query($con,"SELECT nota FROM note WHERE elevi_idElev=$idElev AND cursuri_idCurs='$materie'");
$media = NULL;
$sumanote = 0;
$contor = 0;
while($row = mysqli_fetch_array($result))
{
    if($row['nota'] != NULL){
    $sumanote += $row['nota'];
    $contor++;
    }
}
    if($contor != 0)
    if($teza == NULL)
    $media = round($sumanote/$contor);
    else
    $media = round(($sumanote/$contor*3 + $teza)/4);
    return $media;

//Close connection
mysqli_close($con);
}

function calculatewholeaverage(){
    $wholeaverage = 0;
    $contor = 0;
    $con = mysqli_connect("localhost","Radoi","admin","mydb");

    // Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Get course ID
$result = mysqli_query($con,"SELECT idCurs FROM cursuri");
while($row = mysqli_fetch_array($result)){
    $materie = $row['idCurs'];
    if($materie != 'PUR')
    if(averageGrades($materie) != NULL){
    $wholeaverage += averageGrades($materie);
    $contor++;
    }}
if($contor != 0)
echo "<div class=\"mediatotala\">Media totala</div>" . round($wholeaverage/$contor, 2) . "<br><br>";
else
echo "<div class=\"mediatotala\">Media totala</div><br>";
//Close connection
mysqli_close($con);
}

function getnotapurtare(){
    $idElev = $_GET["idElev"];
    $con = mysqli_connect("localhost","Radoi","admin","mydb");

    // Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Gather nota purtare
$purtare = NULL;
$result = mysqli_query($con,"SELECT nota FROM note WHERE cursuri_idCurs='PUR' AND elevi_idElev='$idElev'");
while($row = mysqli_fetch_array($result))
    $purtare = $row['nota'];
    echo "<div class=\"purtare\">Nota purtare</div>" . $purtare;

//Close connection
mysqli_close($con);
}

function takeanddisplay_note($materie){
$idElev = $_GET["idElev"];
$con = mysqli_connect("localhost","Radoi","admin","mydb");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Get course name
$result = mysqli_query($con,"SELECT numeCurs FROM cursuri WHERE idCurs='$materie'");
echo "<div class=\"panelnote\">";
while($row = mysqli_fetch_array($result))
    echo $row['numeCurs'];
echo "<br/>";

//Get teza
$teza = NULL;
$result = mysqli_query($con,"SELECT teza FROM note WHERE cursuri_idCurs='$materie' AND elevi_idElev='$idElev'");
if(!$result){
}
else
while($row = mysqli_fetch_array($result))
    $teza = $row['teza'];

//Get grades from database
$result = mysqli_query($con,"SELECT nota FROM note WHERE elevi_idElev=$idElev AND cursuri_idCurs='$materie'");
echo "<div class=\"stilnote\">Note";

//Echo teza
if($teza != NULL)
echo " " . "<div class=\"teza\">" . $teza . "</div>";

//Continue get grades
$contor = 0;
$sumanote = 0;
while($row = mysqli_fetch_array($result))
{
    if($row['nota'] != NULL){
    echo " ";
    echo $row['nota'];
    $sumanote += $row['nota'];
    $contor++;
    }
}

//Calculate average grades
    if($contor != 0)
    if($teza == NULL)
    echo "<div class=\"media\">Media " . round($sumanote/$contor, 2) . "</div>";
    else
    echo "<div class=\"media\">Media " . round(($sumanote/$contor*3+$teza)/4, 2) . "</div>";
echo "</div></div>";

//Close connection
mysqli_close($con);
}

function getElevInfo(){
$idElev = $_GET["idElev"];
$con = mysqli_connect("localhost","Radoi","admin","mydb");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Gather info
$nume = NULL;
$oras = NULL;
$sex = NULL;
$tlf = NULL;
$birthday = NULL;
$result = mysqli_query($con,"SELECT * FROM elevi WHERE idElev='$idElev'");
while($row = mysqli_fetch_array($result)){
    $nume = $row['numeElev'];
    $oras = $row['orasElev'];
    $sex = $row['sexElev'];
    $tlf = $row['tlfElev'];
    $formatTlf = substr($tlf, 0, 4) .' '. substr($tlf, 4, 3) .' '. substr($tlf, 7, 3);

    //Birthday
    $time = strtotime($row['birthdayElev']);
    $day = date('j', $time);
    $month_number = date('n', $time);
    $year = date('Y', $time);
    
    $romanian_months = [
    'Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'
    ];
    $month = $romanian_months[$month_number - 1];
    $birthday = $day . " " . $month . " " . $year;
}

//Close connection
mysqli_close($con);

//Display info
echo "<div class=\"nume\">" . $nume . "</div>";
if($sex == 'Baiat')
echo "<div class=\"sexm\">";
else
echo "<div class=\"sexf\">";
echo $sex . "</div>
<div class=\"panelinfoelev\"><div class=\"InfoTitle\">Localitate</div>" . $oras . "<br><br> <div class=\"InfoTitle\">Nr. de telefon</div>" . $formatTlf . "<br><br><div class=\"InfoTitle\">Zi de nastere</div>" . $birthday . "</div>";
}

function getabsente($materie){
    $idElev = $_GET["idElev"];
    $con = mysqli_connect("localhost","Radoi","admin","mydb");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Get absente
$result = mysqli_query($con,"SELECT dataAbsenta, motivat FROM absente WHERE cursuri_idCurs='$materie' AND elevi_idElev='$idElev' ORDER BY dataAbsenta");
    $dataAbsenta = NULL;
    if($result->num_rows > 0){
echo "<div class=\"absenteWrapper\"><div class=\"materieabsente\">" . $materie ."</div>";
echo "<div class=\"fixnoteinline\">";
while($row = mysqli_fetch_array($result)){
    if($row['motivat'] == "DA"){
        $dataAbsenta = date_create($row['dataAbsenta']);
        echo ' <span class="motivat">' . date_format($dataAbsenta,"d/m"). '</span>';
    }else{
        $dataAbsenta = date_create($row['dataAbsenta']);
        echo " " . date_format($dataAbsenta,"d/m");
    }
}
echo "</div></div>";
}
}
?>
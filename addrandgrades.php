<?php
function addrandgrades($idElev)
{
    $con = mysqli_connect("localhost", "Radoi", "admin", "mydb");

// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT idCurs FROM cursuri");
    while ($row = mysqli_fetch_array($result)) {
        $materie = $row['idCurs'];
        //Purtare
        if ($materie == 'PUR') {
            mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, nota)
    VALUES ('$idElev', '$materie', '10')");} else
//RO/MAT
        if ($materie == 'RO' || $materie == 'MAT') {
            for ($i = 1; $i <= 5; $i++) {
                $nota = rand(2, 10);
                mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, nota)
VALUES ('$idElev', '$materie', '$nota')");}
            $teza = rand(4, 10);
            mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, teza)
    VALUES ('$idElev', '$materie', '$teza')");
        } //if ro/mat
        else
        //others
        {
            for ($i = 1; $i <= 3; $i++) {
                $nota = rand(4, 10);
                mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, nota)
VALUES ('$idElev', '$materie', '$nota')");
            }
        }

    } //while
    //teza info
    $teza = rand(4, 10);
    mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, teza)
        VALUES ('$idElev', 'INF', '$teza')");

//teza bio/chimie/fizica/info
    $matTeza = rand(1, 3);
    switch ($matTeza) {
        case 1:$teza = rand(5, 10);
            mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, teza)
VALUES ('$idElev', 'BIO', '$teza')");
            break;

        case 2:$teza = rand(5, 10);
            mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, teza)
VALUES ('$idElev', 'CHI', '$teza')");
            break;

        case 3:$teza = rand(5, 10);
            mysqli_query($con, "INSERT INTO note (elevi_idElev, cursuri_idCurs, teza)
VALUES ('$idElev', 'FIZ', '$teza')");
            break;
    }

//Close connection
    mysqli_close($con);
}

$iteration = 1;
for ($j = 1; $j <= 20; $j++) {
    addrandgrades($j);
    echo 'Succes ' . $iteration . ' ! ';
    $iteration++;
}

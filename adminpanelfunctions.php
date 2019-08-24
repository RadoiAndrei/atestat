<?php
//Server config
$servername = "localhost";
$username = "Radoi";
$password = "admin";
$dbname = "mydb";

//$GET_Variables
$actiune = isset($_POST['actiune']) ? $_POST['actiune'] : null;
$idElev = isset($_POST['idElev']) ? $_POST['idElev'] : null;
$numeElev = isset($_POST['numeElev']) ? $_POST['numeElev'] : null;
$orasElev = isset($_POST['orasElev']) ? $_POST['orasElev'] : null;
$sexElev = isset($_POST['sexElev']) ? $_POST['sexElev'] : null;
$tlfElev = isset($_POST['tlfElev']) ? $_POST['tlfElev'] : null;
if (!empty($_POST['birthdayElev'])) {
    $birthdayElev = date_create($_POST['birthdayElev']);
} else {
    $birthdayElev = null;
}

if (!empty($_POST['dataAbsenta'])) {
    $dataAbsenta = date_create($_POST['dataAbsenta']);
} else {
    $dataAbsenta = null;
}

$notaPurtare = isset($_POST['notaPurtare']) ? $_POST['notaPurtare'] : null;
$teza = isset($_POST['teza']) ? $_POST['teza'] : null;
$idCurs = isset($_POST['idCurs']) ? $_POST['idCurs'] : null;
$nota = isset($_POST['nota']) ? $_POST['nota'] : null;
$idClasa = isset($_POST['idClasa']) ? strtoupper($_POST['idClasa']) : null;
$motivat = isset($_POST['motivat']) ? $_POST['motivat'] : null;
$descriereStire = isset($_POST['descriereStire']) ? $_POST['descriereStire'] : null;
$titluStire = isset($_POST['titluStire']) ? $_POST['titluStire'] : null;
$thumbnailStire = isset($_POST['thumbnailStire']) ? $_POST['thumbnailStire'] : null;
$sursaStire = isset($_POST['sursaStire']) ? $_POST['sursaStire'] : null;
$idStire = isset($_POST['idStire']) ? $_POST['idStire'] : null;

switch ($actiune) {
    //CASE 0
    case 'addClasa':addClasa();
        break;
    //CASE 1
    case 'addElev':addElev();
        break;
    //CASE 2
    case 'addNota':addNota();
        break;
    //CASE 3
    case 'addAbsenta':addAbsenta();
        break;
    //CASE 4
    case 'addTeza':addTeza();
        break;
    //CASE 4.1
    case 'addStire':addStire();
        break;
    //CASE 4.5
    case 'deleteClasa':deleteClasa();
        break;
    //CASE 5
    case 'deleteElev':deleteElev();
        break;
    //CASE 6
    case 'deleteNota':deleteNota();
        break;
    //CASE 7
    case 'deleteAbsenta':deleteAbsenta();
        break;
    //CASE 8
    case 'deleteTeza':deleteTeza();
        break;
    //CASE 8.1
    case 'deleteStire':deleteStire();
        break;
    //CASE 9
    case 'modifyElev':modifyElev();
        break;
    //CASE 10
    case 'modifyTeza':modifyTeza();
        break;
    //CASE 11
    case 'modifyPurtare':modifyPurtare();
        break;
}

//--------------Adauga-----------------

function addClasa()
{
    if ($GLOBALS['idClasa'] != null) {
// Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'INSERT INTO Clase (idClasa)
VALUES ("' . $GLOBALS['idClasa'] . '")';

        if (mysqli_query($conn, $sql)) {
            echo "Clasa noua adaugata !";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus toate campurile necesare !';
    }

}

//Adauga Elevi(numeElev, orasElev, sexElev, tlfElev, birthdayElev)
function addElev()
{
//Check $Variables
    if ($GLOBALS['numeElev'] != null && $GLOBALS['orasElev'] != null && $GLOBALS['sexElev'] != null && $GLOBALS['birthdayElev'] != null) {
// Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'INSERT INTO elevi (Clase_idClasa, numeElev, orasElev, sexElev, tlfElev, birthdayElev)
VALUES ("' . $GLOBALS['idClasa'] . '", "' . $GLOBALS['numeElev'] . '", "' . $GLOBALS['orasElev'] . '", "' . $GLOBALS['sexElev'] . '", "' . $GLOBALS['tlfElev'] . '", "' . date_format($GLOBALS['birthdayElev'], "Y/m/d") . '")';

        if (mysqli_query($conn, $sql)) {
            echo "Elev nou adaugat !";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus toate campurile necesare !';
    }

}

//Adauga nota
function addNota()
{
    if ($GLOBALS['nota'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'INSERT INTO note (elevi_idElev, cursuri_idCurs, nota)
VALUES ("' . $GLOBALS['idElev'] . '", "' . $GLOBALS['idCurs'] . '", "' . $GLOBALS['nota'] . '")';

        if (mysqli_query($conn, $sql)) {
            echo "Nota noua adaugata !";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus nota !';
    }

}

//Adauga absenta
function addAbsenta()
{
//Check $dataAbsenta
    if ($GLOBALS['dataAbsenta'] != null) {
// Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'INSERT INTO absente (elevi_idElev, cursuri_idCurs, dataAbsenta, motivat)
VALUES ("' . $GLOBALS['idElev'] . '", "' . $GLOBALS['idCurs'] . '", "' . date_format($GLOBALS['dataAbsenta'], 'Y-m-d') . '", "' . $GLOBALS['motivat'] . '")';

        if (mysqli_query($conn, $sql)) {
            echo "Absenta noua adaugata !";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus o data !';
    }
}

//Adauga teza
function addTeza()
{
    if ($GLOBALS['teza'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($conn, 'SELECT teza FROM note WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND teza IS NOT  NULL');
        $rownum = mysqli_num_rows($result);
        if ($rownum == 0) {
            $sql = 'INSERT INTO note (elevi_idElev, cursuri_idCurs, teza)
VALUES ("' . $GLOBALS['idElev'] . '", "' . $GLOBALS['idCurs'] . '", "' . $GLOBALS['teza'] . '")';

            if (mysqli_query($conn, $sql)) {
                echo "Teza noua adaugata !";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo 'Deja exista o teza, folositi "Modifica teza" !';
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus teza !';
    }
}

//Adauga stire
function addStire()
{
    if ($GLOBALS['titluStire'] != null && $GLOBALS['descriereStire'] != null && $GLOBALS['thumbnailStire'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
            $sql = 'INSERT INTO stiri (titluStire, descriereStire, thumbnailStire, sursaStire)
            VALUES ("' . addslashes($GLOBALS['titluStire']) . '", "' . addslashes($GLOBALS['descriereStire']) . '", "' . $GLOBALS['thumbnailStire'] . '", "' . $GLOBALS['sursaStire'] . '")';

            if (mysqli_query($conn, $sql)) {
                echo "Stire noua adaugata !";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }else {
            echo 'Nu ati introdus toate campurile necesare !';
        }
    }

//--------------Sterge-----------------

//Sterge clasa
function deleteClasa()
{
    // Create connection
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT idElev FROM elevi WHERE clase_idClasa=" . $GLOBALS['idClasa'];

    $result = mysqli_query($conn, 'SELECT idElev FROM elevi WHERE clase_idClasa="' . $GLOBALS['idClasa'] . '"');

    while ($row = mysqli_fetch_array($result)) {
        $idElev = $row['idElev'];

        $sql = "DELETE FROM note WHERE elevi_idElev=" . $idElev;

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $sql = "DELETE FROM absente WHERE elevi_idElev=" . $idElev;

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $sql = "DELETE FROM elevi WHERE idElev=" . $idElev;

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

// sql to delete a record
    $sql = 'DELETE FROM clase WHERE idClasa="' . $GLOBALS['idClasa'] . '"';

    if (mysqli_query($conn, $sql)) {
        echo "Clasa a fost sters !";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//Sterge elev
function deleteElev()
{
    // Create connection
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM note WHERE elevi_idElev=" . $GLOBALS['idElev'];

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    $sql = "DELETE FROM absente WHERE elevi_idElev=" . $GLOBALS['idElev'];

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

// sql to delete a record
    $sql = "DELETE FROM elevi WHERE idElev=" . $GLOBALS['idElev'];

    if (mysqli_query($conn, $sql)) {
        echo "Elevul a fost sters !";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

//Sterge nota
function deleteNota()
{
    if ($GLOBALS['nota'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = mysqli_query($conn, 'SELECT nota FROM note WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND nota="' . $GLOBALS['nota'] . '"');
        $rownum = mysqli_num_rows($result);
        if ($rownum != 0) {
// sql to delete a record
            $sql = 'DELETE FROM note WHERE idNota IN (SELECT * FROM (SELECT idNota FROM note WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND nota="' . $GLOBALS['nota'] . '" LIMIT 1) as t)';

            if (mysqli_query($conn, $sql)) {
                echo "Nota a fost stearsa !";
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }
        } else {
            echo 'Elevul nu are nicio nota de ' . $GLOBALS['nota'] . ' !';
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus nota !';
    }

}

//Sterge absenta
function deleteAbsenta()
{
    //Check $dataAbsenta
    if ($GLOBALS['dataAbsenta'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = mysqli_query($conn, 'SELECT dataAbsenta FROM absente WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND dataAbsenta="' . date_format($GLOBALS['dataAbsenta'], "Y/m/d") . '" AND motivat="' . $GLOBALS['motivat'] . '"');
        $rownum = mysqli_num_rows($result);
        if ($rownum != 0) {
// sql to delete a record
            $sql = 'DELETE FROM absente WHERE idAbsenta IN (SELECT * FROM (SELECT idAbsenta FROM absente WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND dataAbsenta="' . date_format($GLOBALS['dataAbsenta'], "Y/m/d") . '" LIMIT 1) as t)';

            if (mysqli_query($conn, $sql)) {
                echo "Absenta a fost stearsa !";
            } else {
                echo "Error deleting record: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else if ($GLOBALS['motivat'] == "DA") {
            echo 'Elevul nu are nicio absenta motivata pe data de ' . date_format($GLOBALS['dataAbsenta'], "d/m") . ' !';
        } else {
            echo 'Elevul nu are nicio absenta nemotivata pe data de ' . date_format($GLOBALS['dataAbsenta'], "d/m") . ' !';
        }

    } else {
        echo 'Nu ati introdus o data !';
    }
}

//Sterge teza
function deleteTeza()
{
    // Create connection
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, 'SELECT teza FROM note WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND teza IS NOT NULL');
    $rownum = mysqli_num_rows($result);
    if ($rownum != 0) {
// sql to delete a record
        $sql = 'DELETE FROM note WHERE elevi_idElev="' . $GLOBALS['idElev'] . '" AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND teza IS NOT NULL';

        if (mysqli_query($conn, $sql)) {
            echo "Teza a fost stearsa !";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        $result = mysqli_query($conn, 'SELECT numeCurs FROM cursuri WHERE idCurs="' . $GLOBALS['idCurs'] . '"');
        while ($row = mysqli_fetch_array($result)) {
            $numeCurs = $row['numeCurs'];
        }

        echo 'Elevul nu are teza la ' . $numeCurs . ' !';
    }
    mysqli_close($conn);
}

//Sterge stire
function deleteStire()
{
    // Create connection
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// sql to delete a record
        $sql = 'DELETE FROM stiri WHERE idStire=' . $GLOBALS['idStire'];

        if (mysqli_query($conn, $sql)) {
            echo "Stirea a fost stearsa !";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    mysqli_close($conn);
}

//--------------Modifica-----------------

//Modifica elev
function modifyElev()
{
    if ($GLOBALS['numeElev'] != null && $GLOBALS['orasElev'] != null && $GLOBALS['sexElev'] != null && $GLOBALS['birthdayElev'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'UPDATE elevi SET clase_idClasa="' . $GLOBALS['idClasa'] . '", numeElev="' . $GLOBALS['numeElev'] . '", orasElev="' . $GLOBALS['orasElev'] . '", sexElev="' . $GLOBALS['sexElev'] . '", tlfElev="' . $GLOBALS['tlfElev'] . '", birthdayElev="' . date_format($GLOBALS['birthdayElev'], 'Y-m-d') . '" WHERE idElev=' . $GLOBALS['idElev'];

        if (mysqli_query($conn, $sql)) {
            echo "Elevul a fost modificat !";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus toate campurile necesare !';
    }

}

//Modifica teza
function modifyTeza()
{
    if ($GLOBALS['teza'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'UPDATE note SET teza="' . $GLOBALS['teza'] . '" WHERE elevi_idElev="' . $GLOBALS['idElev'] . '"AND cursuri_idCurs="' . $GLOBALS['idCurs'] . '" AND teza IS NOT NULL';

        if (mysqli_query($conn, $sql)) {
            echo "Teza a fost modificata !";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus teza !';
    }

}

//Modifica nota purtare
function modifyPurtare()
{
    if ($GLOBALS['notaPurtare'] != null) {
        // Create connection
        $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = 'UPDATE note SET nota="' . $GLOBALS['notaPurtare'] . '" WHERE elevi_idElev="' . $GLOBALS['idElev'] . '"AND cursuri_idCurs="PUR"';

        if (mysqli_query($conn, $sql)) {
            echo "Nota purtare a fost modificata !";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Nu ati introdus nota !';
    }

}
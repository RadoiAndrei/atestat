<?php
    $actiune = isset($_POST['actiune']) ? $_POST['actiune'] : NULL;

if (!empty($_POST) and isset($_POST['actiune']))
{
    switch($actiune){
    //CASE 0
        case 'addClasa':
        echo '<div class=dbFormText>Adauga clasa</div><div class="databaseform">
        <form method="post">
        <input type="text" name="idClasa" placeholder="Nume clasa (Ex: 12B)"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
    //CASE 1
        case 'addElev': echo '<div class=dbFormText>Adauga elev</div><div class="databaseform">
        <form method="post">
        <select name="idClasa">';
        //Get clase
        $con = mysqli_connect("localhost","Radoi","admin","mydb");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,'SELECT * FROM clase');

        while($row = mysqli_fetch_array($result))
        {
        echo '<option value="' . $row['idClasa'] . '">' . $row['idClasa'] . '</option>';
        }
        mysqli_close($con);
        
        echo '</select>
        <input type="text" name="numeElev" placeholder="Nume elev"/>
        <input type="text" name="orasElev" placeholder="Localitate"/>
        <select name="sexElev">
        <option selected="selected" value="Baiat">Baiat</option>
        <option value="Fata">Fata</option>
        </select>
        <input type="text" name="tlfElev" placeholder="Nr. de telefon"/>
        <input type="text" name="birthdayElev" placeholder="Nastere(DD-MM-YYYY)"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        ;break;
        //CASE 2
        case 'addNota': echo '<div class=dbFormText>Adauga nota</div><div class="databaseform">
        <form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <input type="text" name="nota" placeholder="Nota"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
        //CASE 3
        case 'addAbsenta':  echo '<div class=dbFormText>Adauga absenta</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <select name="motivat">
        <option value="NU">Nemotivata</option>
        <option value="DA">Motivata</option>
        </select>
        <input type="text" name="dataAbsenta" placeholder="Data (DD-MM-YYYY)"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
        //CASE 4
        case 'addTeza': echo '<div class=dbFormText>Adauga teza</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <input type="text" name="teza" placeholder="Teza"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;

        //CASE 4.1
        case 'addStire': echo '<div class=dbFormText>Adauga stire</div><div class="databaseform"><form action="" method="post">
        <input type="text" name="titluStire" placeholder="Titlu"/>
        <input type="text" name="sursaStire" placeholder="Sursa"/>
        <input type="text" name="thumbnailStire" placeholder="Imagine"/>
        <input type="text" name="descriereStire" placeholder="Descriere"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;

        //CASE 4.5
        case 'deleteClasa':
        echo '<div class=dbFormText>Sterge clasa</div><div class="databaseform">
        <form method="post">
        <select name="idClasa">';
        //Get clase
        $con = mysqli_connect("localhost","Radoi","admin","mydb");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,'SELECT * FROM clase');

        while($row = mysqli_fetch_array($result))
        {
        echo '<option value="' . $row['idClasa'] . '">' . $row['idClasa'] . '</option>';
        }
        mysqli_close($con);
        
        echo '</select>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;

        //CASE 5
        case 'deleteElev':  echo '<div class=dbFormText>Sterge elev</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
        //CASE 6
        case 'deleteNota': echo '<div class=dbFormText>Sterge nota</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <input type="text" name="nota" placeholder="Nota"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
        //CASE 7
        case 'deleteAbsenta': echo '<div class=dbFormText>Sterge absenta</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <input type="text" name="dataAbsenta" placeholder="Data (DD-MM-YYYY)"/>
        <select name="motivat">
        <option value="NU">Nemotivata</option>
        <option value="DA">Motivata</option>
        </select>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';

        break;
        //CASE 8
        case 'deleteTeza':  echo '<div class=dbFormText>Sterge teza</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;

        //CASE 8.1
        case 'deleteStire':
        echo '<div class=dbFormText>Sterge stire</div><div class="databaseform">
        <form method="post">
        <select name="idStire">';
        //Get clase
        $con = mysqli_connect("localhost","Radoi","admin","mydb");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,'SELECT idStire,titluStire FROM stiri');

        while($row = mysqli_fetch_array($result))
        {
        echo '<option value="' . $row['idStire'] . '">' . $row['titluStire'] . '</option>';
        }
        mysqli_close($con);
        
        echo '</select>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;

        //CASE 9
        case 'modifyElev': echo '<div class=dbFormText>Modifica elev</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
            $con=mysqli_connect("localhost","Radoi","admin","mydb");
            //Create dropdown options  nume
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
    
            $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
            while($row = mysqli_fetch_array($result)){
                echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
            }
            echo '</select>
            <select name="idClasa">';
            //Get clase
            $con = mysqli_connect("localhost","Radoi","admin","mydb");
            // Check connection
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
    
            $result = mysqli_query($con,'SELECT * FROM clase');
    
            while($row = mysqli_fetch_array($result))
            {
            echo '<option value="' . $row['idClasa'] . '">' . $row['idClasa'] . '</option>';
            }
            mysqli_close($con);
            
        echo '</select>
        <input type="text" name="numeElev" placeholder="Nume elev"/>
        <input type="text" name="orasElev" placeholder="Localitate"/>
        <select name="sexElev">
        <option value="Baiat">Baiat</option>
        <option value="Fata">Fata</option></select>
        <input type="text" name="tlfElev" placeholder="Nr. de telefon"/>
        <input type="text" name="birthdayElev" placeholder="Nastere(DD-MM-YYYY)"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
        //CASE 10
        case 'modifyTeza': echo '<div class=dbFormText>Modifica teza</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
        <select name="idCurs">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  idCurs
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM cursuri");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idCurs'] . '>' . $row['numeCurs'] . '</option>';
        }
        echo '</select>
        <input type="text" name="teza" placeholder="Teza"/>
        <button type="button" onclick="dbQuerryAction()">Trimite</button>
        </form></div>';
        break;
        //CASE 11
        case 'modifyPurtare':  echo '<div class=dbFormText>Modifica nota purtare</div><div class="databaseform"><form action="" method="post">
        <select name="idElev">';
        $con=mysqli_connect("localhost","Radoi","admin","mydb");

        //Create dropdown options  nume
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT idElev, numeElev, clase_idClasa FROM elevi ORDER BY clase_idClasa, numeElev");
        while($row = mysqli_fetch_array($result)){
            echo '<option value=' . $row['idElev'] . '>' . $row['clase_idClasa'] . ' - ' . $row['numeElev'] . '</option>';
        }
        echo '</select>
            <input type="text" name="notaPurtare" placeholder="Nota purtare"/>
            <button type="button" onclick="dbQuerryAction()">Trimite</button>
            </form></div>';
        break;
    }
}
?>
<?php
$servername = "localhost";
$username = "Radoi";
$password = "admin";
$dbname = "mydb";
$x = 1;

/* News Style

<p class="titluNews"></p>
<div class="descriere">
    <p></p>
</div>
<button onclick="readMore(x)" id="readMore">Mai mult</button>
<a href="" target="_blank"><span class="sursa">Sursa</span></a>
*/

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM stiri ORDER BY idStire DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="stire">';
        echo'<div class="thumbnail" style="--background: url(\'' . $row['thumbnailStire'] . '\')"></div>';
        echo '<p class="titluNews">' . $row["titluStire"] . '</p>';
        echo '<div class="descriere">
                <p>' . $row['descriereStire'] . '</p>
                <div class="textFade"></div>
            </div>';
        echo '<button onclick="readMore(' . $x .')" class="readMore">Mai mult</button>
            <a href="' . $row['sursaStire'] . '" target="_blank"><span class="sursa">Sursa</span></a>';
            echo '</div>';
        $x++;
    }
}else {
    echo '<p class="titluNews">Nu exista stiri.</p>';
}

mysqli_close($conn);
?>
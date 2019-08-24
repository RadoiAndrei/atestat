<style id="fixNavbar" type="text/css"></style>
<div id="topnav">
    <button class="adminPanelRedirect" onClick="window.location='adminlogin.php';">Panou administrator</button>
    <div class="basicWrapper">
    <a href="main.php">Acasa</a>
        <?php
        $con=mysqli_connect("localhost","Radoi","admin","mydb");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $result = mysqli_query($con,'SELECT * FROM clase');
        
        while($row = mysqli_fetch_array($result))
        {
        echo '<a class="clasa" href=roster.php?idClasa='. $row['idClasa'] . '>'. $row['idClasa'] .'</a>';
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </div>
</div>
<style type="text/css">
/* Style the navbar */
#topnav {
  overflow: hidden;
  background-color: #242424;
  width: 100%;
  position: fixed;
  top: 0;
  z-index: 1;
  border-bottom: #ececec;
  border-bottom-style: solid;
  border-bottom-width: 3px;
  box-shadow: 0px 1px 10px black;
}

/* Navbar links */
#topnav a {
  float: left;
  display: block;
  color: rgb(255, 255, 255);
  text-align: center;
  padding-top: 15px;
  padding-left: 25px;
  padding-right: 25px;
  padding-bottom: 22px;
  text-decoration: none;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 20px;
  font-weight: 400;
  transition-duration: 0.5s;
}

/* Navbar links on mouse-over */
#topnav a:hover {
  background-color: #ececec;
  color: black;
}

/* Style the redirect button */
.adminPanelRedirect {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    float: right;
    padding: 4px 0px 6px;
    width: 250px;
    margin: 16px 16px 16px;
    border-radius: 3px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
    transition-duration: 0.3s
}

#topnav .adminPanelRedirect:hover {
    background: #81c965;
    color: #ffffff;
}

#topnav a::selection, .adminPanelRedirect::selection{
    background-color: black;
    color: white;
}

@media only screen and (max-width: 768px) {
    .adminPanelRedirect{
        width: 100%;
        margin: 10px 0px 5px;
    }

    #topnav a {
        font-size: 12px;
        padding: 10px 25px;
    }
    
    .basicWrapper{
        position: relative;
        margin: 0 auto;
    }

}
</style>
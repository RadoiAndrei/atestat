<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LTTV - Admin Panel</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="contentwrapper" id="contentwrapper">
        <?php
        $session = NULL;
        $error = NULL;
        if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'TVAdmin')
            if($password == 'admin')
            $session = 1;
            else
            $error = '<div id="loginResponse">Parola incorecta !</div>';
        else
        $error = '<div id="loginResponse">Nume de utilizator incorect !</div>';
        }
        if($session == 1){
            include 'adminpanel.html';
        }
        else{
        echo '<div class="adminloginpanel">
        <form class="adminloginform" action="" method="post">
          <input type="text" name="username" autocomplete="off" placeholder="Nume de utilizator"/>
          <input type="password" name="password" placeholder="Parola"/>
          <input class="submit" type="submit" name="submit" value="Conectare"/>
        </form>' . $error . '</div>';
        }
        ?>
    </div>
    <?php include('footer.php') ?>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
    var docWidth = document.documentElement.offsetWidth;

    if(docWidth < 769)
    {
    $(document).ready(function() {
          $(".adminloginpanel input").focus(function() {
              $('#topnav').hide('slow');
            });

        
         $('.adminloginpanel input').blur(function(){
            if( !$(this).val() ) {
                $('#topnav').show('slow');
            }
        });
    });
    }
</script>
    </body>
</html>

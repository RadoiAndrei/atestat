<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clasa 12B - Catalog</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <!--Bara de navigare-->
    <?php include('navbar.php') ?>
    <div class="contentwrapper">
    <!--PHP Script ca sa imi genereze un tabel cu detaliile elevilor + Internal CSS-->
    <style type="text/css">
    #roster{
    margin: auto;
    width: 70%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    border-collapse: collapse;
    border-style: solid;
    border-width: 3px;
    border-color: #4e4e4e;
    box-shadow: 3px 3px 5px rgb(29, 29, 29);
}

#roster td, th{
    border: 1px solid #000000;
    padding: 8px;
}

#roster th{
    width: calc(1/3*100%);
}

#roster tr:nth-child(even){
    background-color: rgba(224,224,224,0.92);
}

#roster tr{
    transition-duration: 0.3s;
}

#roster tr:nth-child(odd){
    background-color: rgba(255, 255, 255, 0.92);
}

#roster tr:hover{
    background-color: rgba(150, 216, 185, 0.92);
}

#roster th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #191919;
    color: white;
}

#profiletext {
    color: #272727;
    text-align: center;
}

@media only screen and (max-width: 768px) {
    #roster{
        width: 90%;
    }
}
</style>
    <?php include('rosterscript.php') ?>
    <script>
    const urlParams = new URLSearchParams(window.location.search);
    var idClasa = urlParams.get('idClasa');
    document.title = idClasa !== null ? "LTTV - Catalog " + idClasa.toUpperCase() : "LTTV - Catalog";
    </script>
</div>
<!--Sfarsitul PHP-ului care genereaza tabel-ul-->
<?php include('footer.php') ?>
<script src="sorttable.js"></script>
<script src="http://code.jquery.com/jquery-3.3.1.js"></script>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
</body>
</html>
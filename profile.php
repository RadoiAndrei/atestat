<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('profilepanel.php') ?>
    <title>Clasa <?php getClasaElev();echo ' - '; getNumeElev(); ?></title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <?php include('navbar.php') ?>
    <div class="contentwrapper">
        <div class="profilepanel">
            <div class="infoelev">
                <?php getElevInfo() ?>
                <div class="specials"><?php calculatewholeaverage();getnotapurtare(); ?></div>
            </div>
            <div class="note">
            <?php $materie = 'RO'; takeanddisplay_note($materie); 
             $materie = 'EN'; takeanddisplay_note($materie); 
             $materie = 'FR'; takeanddisplay_note($materie); 
             $materie = 'MAT'; takeanddisplay_note($materie); 
             $materie = 'FIZ'; takeanddisplay_note($materie); 
             $materie = 'CHI'; takeanddisplay_note($materie); 
             $materie = 'BIO'; takeanddisplay_note($materie); 
             $materie = 'IST'; takeanddisplay_note($materie); 
             $materie = 'GEO'; takeanddisplay_note($materie); 
             $materie = 'SSU'; takeanddisplay_note($materie); 
             $materie = 'REL'; takeanddisplay_note($materie); 
             $materie = 'EDM'; takeanddisplay_note($materie); 
             $materie = 'EDP'; takeanddisplay_note($materie); 
             $materie = 'EDF'; takeanddisplay_note($materie); 
             $materie = 'INF'; takeanddisplay_note($materie); 
             $materie = 'TIC'; takeanddisplay_note($materie); 
             $materie = 'EDA'; takeanddisplay_note($materie); ?>
            </div>
            <div class="infoelev">
            <div id="absente">
                <div id="textAbsente">Absente</div>
                <?php $materie = 'RO'; getabsente($materie); 
                $materie = 'EN'; getabsente($materie); 
                $materie = 'FR'; getabsente($materie); 
                $materie = 'MAT'; getabsente($materie); 
                $materie = 'FIZ'; getabsente($materie); 
                $materie = 'CHI'; getabsente($materie); 
                $materie = 'BIO'; getabsente($materie); 
                $materie = 'IST'; getabsente($materie); 
                $materie = 'GEO'; getabsente($materie); 
                $materie = 'SSU'; getabsente($materie); 
                $materie = 'REL'; getabsente($materie); 
                $materie = 'EDM'; getabsente($materie); 
                $materie = 'EDP'; getabsente($materie); 
                $materie = 'EDF'; getabsente($materie); 
                $materie = 'INF'; getabsente($materie); 
                $materie = 'TIC'; getabsente($materie); 
                $materie = 'EDA'; getabsente($materie); ?>
            </div>
        </div>
        </div>
    </div>
        <?php include('footer.php') ?>
        <script>
        if (document.querySelector('.absenteWrapper') == null){
            var absente = document.getElementById("absente");
            absente.parentNode.removeChild(absente);
        }
        </script>
</body>
</html>
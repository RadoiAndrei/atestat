<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LTTV - Acasa</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <div class="contentwrapper">
        <?php
        include('navbar.php');
        ?>
        <div class="background">
                <div class="thumbnail" style="--background: url('resources/homepage.jpg')">
                </div>
                <p class="numeLiceu">Liceul Teoretic "Tudor Vladimirescu"</p>
            <div class="descriere">
                    <p>
                        Liceul poarta numele eroului Tudor Vladimirescu, conducatorul Revolutiei Romane de la 1821.   Dupa un secol de domnii fanariote, revolutia a realizat ruptura cu vechiul model de societate marcand un moment important in formarea natiunii romane prin obtinerea elementelor definitorii ale acesteia: stabilitate, unitate, independenta.                            In contextul intern si extern de atunci, evenimentele au adus alaturi miscarea condusa de Tudor si Eteria , coordonatoarea luptei pentru independenta a poporului grec.    Initiat partial in planurile Eteriei, Tudor si-a propus sa inlesneasca drumul Eteriei spre teritoriul Greciei ocupate de Imperiul Otoman.                                                                                               Tabara lui Tudor din Bucuresti, a fost asezata pe locul in care cu 56 de ani in urma s-a cladit liceul nostru.  Ca personalitate, Tudor se defineste ca un om al timpurilor moderne. A dorit cu ardoare sa castige “drepturile tarii” si s-o aseze pe alte baze, iar pentru aceasta nu a ezitat sa-si puna in joc bunul cel mai de pret : viata.
                    </p>
                    <div class="textFade"></div>
            </div>
            <div class="butoaneDescriere">
                <button onclick="readMore(0);" class="readMore">Mai mult</button>
                <a href="https://liceultv.wordpress.com/2010/03/13/despre-liceul-teoretic-tudor-vladimirescubucuresti/" target="_blank"><span class="sursa">Sursa</span></a>
            </div>
            <p class="news">Stiri</p>
            <?php include('mainNews.php') ?>
        </div>
    </div>
    <?php include('footer.php') ?>
    <script>
        function readMore(x){
            var descriere = document.getElementsByClassName("descriere")
            var buton = document.getElementsByClassName("readMore")
            var fade = document.getElementsByClassName("textFade")
            if(buton[x].innerHTML == "Mai mult"){
            descriere[x].style.overflow = "visible"
            descriere[x].style.maxHeight = "unset"
            buton[x].innerHTML = "Mai putin"
            fade[x].style.display = "none"
            }else{
                var descriere = document.getElementsByClassName("descriere")
                descriere[x].style.overflow = "hidden"
                descriere[x].style.maxHeight = "6.5em"
                buton[x].innerHTML = "Mai mult"
                fade[x].style.display = "unset"
            }
        }
    </script>
    </body>
</html>
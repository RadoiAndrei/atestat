<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style type="text/css">

#footer{
    width: 100%;
    padding-top: 12px;
    padding-bottom: 5px;
    background-color: #242424;
    position: relative;
    text-align: center;
    color: #ffffff;
    border-top: #ececec;
    border-top-style: solid;
    border-top-width: 3px;
    box-shadow: 0px -1px 10px black;
}

.me{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    width: 95%;
    margin-left: 2.5%;
    font-size: 30px;
    font-weight: 900;
    text-shadow: 2px 2px 3px black;
}

.tiptoolText{
    color: #FF0047;
    opacity: 0;
    position: absolute;
    bottom: 19px;
    left: 0;
    right: 0;
    margin-left: auto;
    margin-right: auto;
    transition-duration: 0.3s;
}

.tiptoolText::selection{
    background: none;
}

.othersName{
    transition-duration: 0.3s;
}

.othersName:hover{
background: black;
color: #00B3D4;
}

.myName::selection{
    background-color: black;
    color: #00B3D4;
}

.othersName:hover + .tiptoolText{
    opacity: 1;
}

.others{
    width: 90%;
    margin-left: 5%;
    margin-top: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 13px;
}

.me::selection{
    background-color: unset;
    color: black;
    text-shadow: 1.5px 1.5px 3px #FF0032,
    -1.5px -1.5px 3px #00D7FF;
}

.others::selection, .copyrights::selection{
    background-color: black;
    color: #FF0047;
}

.othersName::selection{
    background-color: black;
    color: #00B3D4;
}

.copyrights{
    text-align: left;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 12px;
    margin-left: 10px;
    margin-top: 5px;
}

.hrefNoUnderline{
    text-decoration: none;
}

.fab, .far, .fas{
    padding: 8px;
    font-size: 20px;
    width: 26px;
    text-align: center;
    border-radius: 2px;
    margin: 5px 3px;
    opacity: 0.6;
    transition-duration: 0.3s;
    box-shadow: 2px 2px 10px black;
  }

  .fab:hover, .far:hover, .fas:hover {
      opacity: 1;
  }

  .fa-envelope{
      color: #F93935;
      background-image: linear-gradient(to bottom right, white, gray);
  }

  .fa-facebook-f{
    background-image: linear-gradient(to bottom right, #3B5998, #1E3564);
    color: white;
}

.fa-instagram {
    background-image: linear-gradient(to bottom right, rgb(177, 43, 211), rgb(255, 174, 0));
    color: white;
  }

.fa-snapchat-ghost {
    background: white;
    color: #fffc00;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
  }

  .fa-copyright{
    width: 14px;
    opacity: 0.8 !important;
    font-size: 15px;
    padding: unset;
    margin: unset;
    margin-top: 7px;
    color: white;
    padding: none;
    opacity: 0.8;
  }
</style>
<div id="footer">
<div class="me">Created by Radoi Andrei</div>
<div class="others">Special thanks to <span class="othersName">Satadru Chique</span><span class="tiptoolText"> CTO and Lead Dev at Marsilian Technologies SRL</span> and <span class="othersName">Mircea Constantin</span><span class="tiptoolText"> Former Legal Adviser at "Daniela Slobodeanu" Law Office</span> for helping me</div>
<div class="copyrights"><i class="far fa-copyright"></i> 2019, <span class="myName">Radoi Andrei</span>, All Rights Reserved</div>
<style id=fixSocialMedia type="text/css">
#socialMediaIcons{position: absolute; bottom: 10px; right: 10px;}
</style>
<div id="socialMediaIcons">
    <a href="mailto:radoiandrei37@gmail.com" target="_blank" class="hrefNoUnderline">
        <i class="fas fa-envelope"></i>
    </a>
    <a href="https://www.facebook.com/11441859I1814159" target="_blank" class="hrefNoUnderline">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://www.instagram.com/kvzmv/" target="_blank" class="hrefNoUnderline">
        <i class="fab fa-instagram"></i>
    </a>
    <a href="snapchat.html?username=radoi_andrei" target="_blank" class="hrefNoUnderline">
        <i class="fab fa-snapchat-ghost"></i>
    </a>
</div>
</div>
<script>
function getWidth(){
  return Math.max(
    document.body.scrollWidth,
    document.documentElement.scrollWidth,
    document.body.offsetWidth,
    document.documentElement.offsetWidth,
    document.documentElement.clientWidth
  );
}

var footerHeight = document.getElementById("footer").offsetHeight;
var navbarHeight = document.getElementById("topnav").offsetHeight + 40;
    var fixStyle = document.getElementById("fixNavbar");
        var text = ".contentwrapper{margin-top:" + navbarHeight + "px; margin-bottom: 75px; min-height: calc(100vh - 75px - " + footerHeight + "px - " + navbarHeight + "px);}";
    fixStyle.innerHTML = text;

var fixSocialMedia = document.getElementById("fixSocialMedia");
if(getWidth() < 860){
    fixSocialMedia.innerHTML = "#socialMediaIcons{position: absolute; bottom: calc(" + footerHeight + "px + 10px); right: 10px;}"
}else{
    fixSocialMedia.innerHTML = "#socialMediaIcons{position: absolute; bottom: 10px; right: 10px;}"
}

window.onresize = function(event) {
    var footerHeight = document.getElementById("footer").offsetHeight;
    var navbarHeight = document.getElementById("topnav").offsetHeight + 40;
    var fixStyle = document.getElementById("fixNavbar");
        var text = ".contentwrapper{margin-top:" + navbarHeight + "px; margin-bottom: 75px; min-height: calc(100vh - 75px - " + footerHeight + "px - " + navbarHeight + "px);}";
    fixStyle.innerHTML = text;

var fixSocialMedia = document.getElementById("fixSocialMedia");
if(getWidth() < 860){
    fixSocialMedia.innerHTML = "#socialMediaIcons{position: absolute; bottom: calc(" + footerHeight + "px + 10px); right: 10px;}"
}else{
    fixSocialMedia.innerHTML = "#socialMediaIcons{position: absolute; bottom: 10px; right: 10px;}"
}
}
</script>

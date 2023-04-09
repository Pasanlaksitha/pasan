<?php
 $ip = $_SERVER['REMOTE_ADDR'];
 $agent = $_SERVER['HTTP_USER_AGENT'];
 
   
  $db_host = "sql106.epizy.com";
  $db_user = "epiz_28699394";
  $db_pass = "Iks3c92e6Nn9";
  $db_name = "epiz_28699394_visitor_tracking";
  $link = mysql_connect("$db_host", "$db_user", "$db_pass");
  mysql_select_db("$db_name", $link);

  
  //ip geo loaction grab data
  $apiurl = 'https://freegeoip.app/json/'.$ip;
  $ch = curl_init($apiurl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $apiResponse = curl_exec($ch);
  curl_close($ch);
  $ipData = json_decode($apiResponse, true);

  if(!empty($ipData)){ 
    $country_code = $ipData['country_code']; 
    $country_name = $ipData['country_name']; 
    $region_code = $ipData['region_code']; 
    $region_name = $ipData['region_name']; 
    $city = $ipData['city']; 
    $zip_code = $ipData['zip_code']; 
    $latitude = $ipData['latitude']; 
    $longitude = $ipData['longitude']; 
    $time_zone = $ipData['time_zone']; 
}else{ 
    echo 'Data is not found!'; 
} 

// end of ip grab


  if($link)
  {
    $referer = $_SERVER['HTTP_REFERER'];
    $requestUri = $_SERVER['REQUEST_URI'];
   
    $qstring = mysql_query("INSERT INTO visitor_tracking (address, agent, referer, requestUri, latitude, longitude, country_name, region_name, city, zip_code, time_zone) VALUES (\"" . $ip . "\", \"" .$agent. "\", \"" . $referer . "\", \"" . $requestUri . "\" ,\"" . $latitude . "\", \"" . $longitude . "\", \"" . $country_name . "\", \"" . $region_name . "\", \"" . $city . "\", \"" . $zip_code . "\", \"" . $time_zone . "\")", $link);
  }
  else
  {
    echo 'Unable connect.';
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="portfolio, personal portfolio, about me, pasanlaksitha,pasan,web developer,web designer,digital creator, " />
    <meta name="author" content="Pasan Laksitha" link-url="https://www.instagram.com/pasan.laksitha/" />
    <meta name="description" content="about me of Pasan Laksitha" />

     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-197857846-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-197857846-1');
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:700' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet'>
    <link href="./css/about.css" rel="stylesheet">
    <link href="./css/cursor.css" rel="stylesheet">
    <link href="./css/inktext.css" rel="stylesheet">
    <link href="./img/actuallogo.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="cursor"></div>

<div class="wrapper">
    <canvas id="stars"></canvas>
    <canvas id="yahia"></canvas>
    <div class="container">
        <div class="template color-yellow" data-template="home">
            <main>
                <h1><span>A
            <mark>18 years</mark> old</span><span>
  <div class="morphing">
  <div class="word">Digital Creator</div>
  <div class="word">Programmer</div>
  <div class="word">Web Developer</div>
  <div class="word">Pentester</div>
  <div class="word">Photographer</div>
  <div class="word">Editor</div>
  <div class="word">Athlete</div>

</div>
                </span>
                </h1>
                <div class="p"><span><a href="http://www.pasan.ga">I am a student from Sri Lanka,  My interests range from
                    programming to</a></span><span>Robotics. I am also interested in Digital Creations and 3D Designing.</span></div>

                <div class="links">
                    <a class="link color-yellow" href="https://www.pasan.ml/"
                        title="View my bucket list">Home</a>
                    <a class="link color-green" href="mailto:tellme@pasan.ga" target="_blank"
                       title="Mail">Tell me with a smile</a>
                 
                </div>
            </main>
            <footer>
                <div class="links">
                    <a class="link small alt" href="https://www.facebook.com/pasanlaksitha" target="_blank"     title="Facebook (@pasanlaksitha)">Facebook</a>
                    <a class="link small alt" href="https://twitter.com/PasanLaksitha" target="_blank"          title="Twitter (@PasanLaksitha)">Twitter</a>
                    <a class="link small alt" href="https://codepen.io/pasanlaksitha" target="_blank"           title="Codepen (@pasanlaksitha)">Codepen</a>
                    <a class="link small alt" href="https://github.com/Pasanlaksitha" target="_blank"           title="GitHub (@Pasanlaksitha)">GitHub</a></div>
                    <a class="link small alt" href="https://www.instagram.com/pasan.creation/" target="_blank"  title="Instagram (@Pasan.Creation)">Instagram</a></div>
            </footer>
        </div>
        <div class="loading" id="identity" title="Pasan Laksitha identity">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <a class="loading" href="https://pasan.ga/" id="signature" target="_blank" title="Go to home"></a>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.3/mobile-detect.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r72/three.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='jquery.mCustomScrollbar.concat.min.js'></script>
<script src="./js/about.js"></script>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "e228894176af4d4e9a3241d951e7624f"}'></script><!-- End Cloudflare Web Analytics -->
</body>
</html>

<?php
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];


$db_host = "sql106.epizy.com";
$db_user = "epiz_28699394";
$db_pass = "Iks3c92e6Nn9";
$db_name = "epiz_28699394_pop_game";
$link = mysql_connect("$db_host", "$db_user", "$db_pass");
mysql_select_db("$db_name", $link);


//ip geo loaction grab data
$apiurl = 'https://freegeoip.app/json/' . $ip;
$ch = curl_init($apiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$apiResponse = curl_exec($ch);
curl_close($ch);
$ipData = json_decode($apiResponse, true);

if (!empty($ipData)) {
    $country_code = $ipData['country_code'];
    $country_name = $ipData['country_name'];
    $region_code = $ipData['region_code'];
    $region_name = $ipData['region_name'];
    $city = $ipData['city'];
    $zip_code = $ipData['zip_code'];
    $latitude = $ipData['latitude'];
    $longitude = $ipData['longitude'];
    $time_zone = $ipData['time_zone'];
} else {
    echo 'Data is not found!';
}

// end of ip grab


if ($link) {
    $referer = $_SERVER['HTTP_REFERER'];
    $requestUri = $_SERVER['REQUEST_URI'];

    $qstring = mysql_query("INSERT INTO visitor_tracking (address, agent, referer, requestUri, latitude, longitude, country_name, region_name, city, zip_code, time_zone) VALUES (\"" . $ip . "\", \"" . $agent . "\", \"" . $referer . "\", \"" . $requestUri . "\" ,\"" . $latitude . "\", \"" . $longitude . "\", \"" . $country_name . "\", \"" . $region_name . "\", \"" . $city . "\", \"" . $zip_code . "\", \"" . $time_zone . "\")", $link);
} 


else {
    echo 'Unable connect.';
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        startTime = new Date();
    </script>

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

    <!-- partial:index.partial.html -->
    <title>POP-Game</title>
    <meta charset="UTF-8">

    <meta property="og:title" content="POP-Game" />
    <meta property="og:site_name" content="Pop-Bubbles">
    <meta property="og:description" content="get some adrenaline, increase your brain speed and accuracy." />
    <meta property="og:image" itemprop="image" content="/img/favi-150x150.png">
    <meta property="og:type" content="Gaming" />

    <link rel="apple-touch-icon" sizes="57x57" href="/img/favi-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/img/favi-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/favi-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/favi-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/favi-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/favi-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/favi-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/favi-150x150.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/favi-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/favi-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favi-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/favi-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favi-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-transulcent" />
    <meta charset="UTF-8">
    <meta content="http://www.pasan.ml/game" name="identifier-url" />
    <meta content="POP-Game" name="title" />
    <meta content="Here POP-Bubbles game now available on my portfolio let see how many you can pop and your brain accuracy" name="description" />
    <meta content="POP Game" name="abstract" />
    <meta content="portfolio, personal portfolio, about me, pasanlaksitha, pasan, web developer, web designer, digital creator, pasanlaksitha, Kulathunga, pasan laksitha, programmer, hackthebox, codepen, pasanga, pasan.ga, pasan.ml, pasanlaksithakulathunga, twitter, instagram, royal college, colombo, pop-game, pop, game, brain, barain level, accuracy,brain accuracy,fast thinking, game developer, game developing" name="keywords" />
    <meta content="pasan laksitha" name="author" />
    <meta content="5" name="revisit-after" />
    <meta content="EN" name="language" />
    <meta content="© 2021 Pasan Laksitha" name="copyright" />
    <meta content="All" name="robots" />

    <link rel="stylesheet" href="./pop-game.css">
    <link rel="shortcut icon" type="image/png" href="/img/favi-150x150.png" />




</head>

 <!--end head start body -->

    <body>
        <canvas></canvas>



<!-- partial -->

<script src="./pop-game.js"></script>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "e228894176af4d4e9a3241d951e7624f"}'></script>
</body>

</html>
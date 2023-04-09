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
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
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

    <meta charset="UTF-8">
    <title>Pasan Laksitha</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="./css/loader.css" rel="stylesheet">
    <link href="./css/cursor.css" rel="stylesheet">
    <link href="./css/css-blur-card.css" rel="stylesheet">
    <link href="./img/actuallogo.png" rel="shortcut icon" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap');
        @import url(https://fonts.googleapis.com/css?family=Raleway);

        html,
        body {

            font-family: 'Montserrat', Raleway;
            background-color: black;
            height: 100%;
            overflow: hidden;
        }

        h1 {
            position: absolute;
            top: 30%;
            left: 0;
            width: 100%;
            font-family: 'Montserrat', Raleway;
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 3em;
            line-height: 1em;
        }

        h1 span {
            display: inline-block;
            border-top: 2px solid #ffffff;
            border-bottom: 2px solid #ffffff;
            padding: .5em 0;
        }

        div {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        div img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        div > img:nth-of-type(even) {
            animation: kenburn 30s linear infinite forwards;
            transform-origin: center center;
        }

        div > img:nth-of-type(odd) {
            animation: kenburns 30s linear infinite forwards;
            transform-origin: center center;
        }

        div > img:nth-of-type(1) {
            animation-delay: 0s;
        }

        div > img:nth-of-type(2) {
            animation-delay: 15s;
        }

        @keyframes kenburn {
            0% {
                opacity: 0;
                filter: alpha(opacity=0);
                transform: scale(1);
            }
            5% {
                opacity: 1;
                filter: alpha(opacity=100);
            }
            50% {
                opacity: 1;
                filter: alpha(opacity=100);
                transform: scale(1.5);
            }
            60% {
                opacity: 0;
                filter: alpha(opacity=0);
                transform: scale(1.5);
            }
        }

        @keyframes kenburns {
            0% {
                opacity: 0;
                filter: alpha(opacity=0);
                transform: scale(1.5);
            }
            5% {
                opacity: 1;
                filter: alpha(opacity=100);
            }
            50% {
                opacity: 1;
                filter: alpha(opacity=100);
                transform: scale(1);
            }
            60% {
                opacity: 0;
                filter: alpha(opacity=0);
                transform: scale(1);
            }
        }


        .glitch {
            color: rgba(248, 248, 248, 0.99);
            font-size: 48px;
            position: relative;
            width: 380px;
            margin: auto;

        }

        @keyframes noise-anim {
            0% {
                clip: rect(38px, 9999px, 36px, 0);
            }
            5% {
                clip: rect(31px, 9999px, 81px, 0);
            }
            10% {
                clip: rect(66px, 9999px, 91px, 0);
            }
            15% {
                clip: rect(92px, 9999px, 100px, 0);
            }
            20% {
                clip: rect(53px, 9999px, 93px, 0);
            }
            25% {
                clip: rect(90px, 9999px, 83px, 0);
            }
            30% {
                clip: rect(70px, 9999px, 63px, 0);
            }
            35% {
                clip: rect(13px, 9999px, 89px, 0);
            }
            40% {
                clip: rect(99px, 9999px, 81px, 0);
            }
            45% {
                clip: rect(46px, 9999px, 67px, 0);
            }
            50% {
                clip: rect(98px, 9999px, 87px, 0);
            }
            55% {
                clip: rect(45px, 9999px, 46px, 0);
            }
            60% {
                clip: rect(62px, 9999px, 42px, 0);
            }
            65% {
                clip: rect(96px, 9999px, 64px, 0);
            }
            70% {
                clip: rect(42px, 9999px, 86px, 0);
            }
            75% {
                clip: rect(49px, 9999px, 34px, 0);
            }
            80% {
                clip: rect(93px, 9999px, 22px, 0);
            }
            85% {
                clip: rect(10px, 9999px, 57px, 0);
            }
            90% {
                clip: rect(80px, 9999px, 93px, 0);
            }
            95% {
                clip: rect(66px, 9999px, 75px, 0);
            }
            100% {
                clip: rect(95px, 9999px, 31px, 0);
            }
        }

        .glitch:after {
            content: attr(data-text);
            position: absolute;
            left: 2px;
            text-shadow: -2px 0 red;
            top: 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.96);
            overflow: hidden;
            clip: rect(0, 900px, 0, 0);
            animation: noise-anim 2s infinite linear alternate-reverse;
        }

        @keyframes noise-anim-2 {
            0% {
                clip: rect(22px, 9999px, 55px, 0);
            }
            5% {
                clip: rect(4px, 9999px, 87px, 0);
            }
            10% {
                clip: rect(54px, 9999px, 97px, 0);
            }
            15% {
                clip: rect(15px, 9999px, 23px, 0);
            }
            20% {
                clip: rect(85px, 9999px, 63px, 0);
            }
            25% {
                clip: rect(5px, 9999px, 91px, 0);
            }
            30% {
                clip: rect(68px, 9999px, 35px, 0);
            }
            35% {
                clip: rect(10px, 9999px, 52px, 0);
            }
            40% {
                clip: rect(34px, 9999px, 57px, 0);
            }
            45% {
                clip: rect(46px, 9999px, 79px, 0);
            }
            50% {
                clip: rect(100px, 9999px, 17px, 0);
            }
            55% {
                clip: rect(62px, 9999px, 78px, 0);
            }
            60% {
                clip: rect(40px, 9999px, 20px, 0);
            }
            65% {
                clip: rect(5px, 9999px, 37px, 0);
            }
            70% {
                clip: rect(14px, 9999px, 80px, 0);
            }
            75% {
                clip: rect(26px, 9999px, 90px, 0);
            }
            80% {
                clip: rect(96px, 9999px, 13px, 0);
            }
            85% {
                clip: rect(49px, 9999px, 25px, 0);
            }
            90% {
                clip: rect(33px, 9999px, 48px, 0);
            }
            95% {
                clip: rect(5px, 9999px, 83px, 0);
            }
            100% {
                clip: rect(59px, 9999px, 88px, 0);
            }
        }

        .glitch:before {
            content: attr(data-text);
            position: absolute;
            left: -2px;
            text-shadow: 2px 0 blue;
            top: 0;
            color: rgba(7, 7, 7, 0.96);
            background: rgba(252, 252, 252, 0.09);
            overflow: hidden;
            clip: rect(0, 900px, 0, 0);
            animation: noise-anim-2 3s infinite linear alternate-reverse;
        }

        .cursor {
            color: #DEDEDE;
            display: block;
            width: 20px;
            height: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%);
            border-radius: 50%;
            background: transparent;
            pointer-events: none;
            z-index: 111;
            border: 1px solid #ffffff;
            transition: all 0.2s ease-out;
            animation: moveCursor1 .5s infinite alternate;
        }


    </style>

</head>
<body>
<div class="cursor"></div>

<div>
    <img src="https://images.unsplash.com/photo-1591994843349-f415893b3a6b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"/>
    <img src="https://images.unsplash.com/photo-1519162584292-56dfc9eb5db4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80"/>
    <img src="https://images.unsplash.com/photo-1518546305927-5a555bb7020d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=749&q=80"/>
    <img src="https://images.unsplash.com/photo-1559028006-448665bd7c7f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=667&q=80"/>

</div>


<h1><span><h1>
    <h3>
        <center>
            <div class="glitch" data-text="ComingSoon">ComingSoon</div>
        </center>
    </h3>
</h1></span></h1>


<script src="./js/loader.js"></script>
<script>
    const cursor = document.querySelector(".cursor");
    document.addEventListener("mousemove", (e) => {
        cursor.style.left = e.pageX + "px";
        cursor.style.top = e.pageY + "px";
    });
</script>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "e228894176af4d4e9a3241d951e7624f"}'></script><!-- End Cloudflare Web Analytics -->
</body>
</html>


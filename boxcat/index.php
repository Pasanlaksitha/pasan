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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>BoxCat-Computer Puzzel</title>
  <link rel="stylesheet" href="./boxcat.css">

</head>
<body>
<!-- partial:index.partial.html -->
<canvas id="canvas1"></canvas>

<footer>Let's Start the Computer Puzzel <a href = "mailto: challenge@pasan.ga">meet me @ end</a> @2020.
</footer>
<!-- partial -->
  <script  src="./boxcat.js"></script>

</body>
</html>

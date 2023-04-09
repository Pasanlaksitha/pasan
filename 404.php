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
    <title>404</title>
    <script src="./js/G-tag.js"></script>
    <link href="./css/404.css" rel="stylesheet">

</head>
<body>

<div class="fade"></div>
<section class="error">
    <div class="crawl">
        <div class="title">

            <!--        audio play starwars-->


            <h1>Trackද?,මල්ලි වැරදි තැන්කට ආවේ</h1>
        </div>
        <p> එහෙම නැත්තං මල්ලි මේ රෙද්දේ Internet අවුලක් වෙන්න ඇති අල්ලලා දාපං මේ ලංකාව නේ ! </p>
        <p>නැතන් මල්ලිට යන පාර වැරදිලා වැරදි පාරක අවිල්ලා තියෙන්නේ , කියන්න බැන් රටේ Internet ටිකත් විකුණලා වෙන්න
            පුලුවන් චිනේ ට කොමත් රටින් යන්න ලැස්තිවෙයන් මල්ලි රට දැනටමත් කෙල වෙලා තියෙන්නේ අපි කම්මුත්තුයි

            web site හැදුවා කියලා වැඩක් නැ බන් මෙවා කරාට කාට බලන්න ද, අපෙන් පස්සේ එන පොඩි උන් ට හුලං තමා දැන් ඉතින් දන්න
            වැඩ ටිකක් දාලා කරගන්න පුළුවන් විදියට රට පනින්න ලෑස්ති වෙමු රට ඔක්කොම වික් විකුණලා සර් කාරයා ඒක නිසා මාත්
            කඩ්ඩ ඉගෙන ගන්නවා රට පනින්න මෙතන ඉදල වැඩක් නෑ බත් පලයන් homepage එකට නැත්නම් වැඩක් බලාගෙනින් </p>
        <p>When communicating via HTTP, a server is required to respond to a request, such as a web browser request for
            a web page, with a numeric response code and an optional, mandatory, or disallowed (based upon the status
            code) message. In the code 404, the first digit indicates a client error, such as a mistyped Uniform
            Resource Locator (URL). The following two digits indicate the specific error encountered. HTTP's use of
            three-digit codes is similar to the use of such codes in earlier protocols such as FTP and NNTP.

            At the HTTP level, a 404 response code is followed by a human-readable "reason phrase". The HTTP
            specification suggests the phrase "Not Found" and many web servers by default issue an HTML page that
            includes both the 404 code and the "Not Found" phrase.

            A 404 error is often returned when pages have been moved or deleted. In the first case, it is better to
            employ URL mapping or URL redirection by returning a 301 Moved Permanently response, which can be configured
            in most server configuration files, or through URL rewriting; in the second case, a 410 Gone should be
            returned. Because these two options require special server configuration, most websites do not make use of
            them.

            404 errors should not be confused with DNS errors, which appear when the given URL refers to a server name
            that does not exist. A 404 error indicates that the server itself was found, but that the server was not
            able to retrieve the requested page.</p>
        <p>Web servers can typically be configured to display a customised 404 error page, including a more natural
            description, the parent site's branding, and sometimes a site map, a search form or 404 page widget. The
            protocol level phrase, which is hidden from the user, is rarely customized.

            Internet Explorer, however, will not display custom pages unless they are larger than 512 bytes, opting
            instead to display a "friendly" error page.[2] Google Chrome included similar functionality, where the 404
            is replaced with alternative suggestions generated by Google algorithms, if the page is under 512 bytes in
            size.[citation needed]

            Another problem is that if the page does not provide a favicon, and a separate custom 404 page exists, extra
            traffic and longer loading times will be generated on every page view.

            Many organizations use 404 error pages as an opportunity to inject humor into what may otherwise be a
            serious website. For example, Metro UK shows a polar bear on a skateboard, and the web development agency
            Left Logic has a simple drawing program.

            While many websites send additional information in a 404 error message—such as a link to the homepage of a
            website or a search box—some also endeavor to find the correct web page the user wanted. Extensions are
            available for some popular content management systems (CMSs) to do this.

            In Europe, the NotFound project, created by multiple European organizations including Missing Children
            Europe and Child Focus, encourages site operators to add a snippet of code to serve customised 404 error
            pages.</p>

        <p>The HTTP 404, 404 Not Found and 404 (pronounced "four oh four") error message is a Hypertext Transfer
            Protocol (HTTP) standard response code, in computer network communications, to indicate that the client was
            able to communicate with a given server, but the server could not find what was requested.

            The web site hosting server will typically generate a "404 Not Found" web page when a user attempts to
            follow a broken or dead link; hence the 404 error is one of the most recognizable errors encountered on the
            World Wide Web.</p>
        <p>When communicating via HTTP, a server is required to respond to a request, such as a web browser request for
            a web page, with a numeric response code and an optional, mandatory, or disallowed (based upon the status
            code) message. In the code 404, the first digit indicates a client error, such as a mistyped Uniform
            Resource Locator (URL). The following two digits indicate the specific error encountered. HTTP's use of
            three-digit codes is similar to the use of such codes in earlier protocols such as FTP and NNTP.

            At the HTTP level, a 404 response code is followed by a human-readable "reason phrase". The HTTP
            specification suggests the phrase "Not Found" and many web servers by default issue an HTML page that
            includes both the 404 code and the "Not Found" phrase.

            A 404 error is often returned when pages have been moved or deleted. In the first case, it is better to
            employ URL mapping or URL redirection by returning a 301 Moved Permanently response, which can be configured
            in most server configuration files, or through URL rewriting; in the second case, a 410 Gone should be
            returned. Because these two options require special server configuration, most websites do not make use of
            them.

            404 errors should not be confused with DNS errors, which appear when the given URL refers to a server name
            that does not exist. A 404 error indicates that the server itself was found, but that the server was not
            able to retrieve the requested page.</p>
        <p>Web servers can typically be configured to display a customised 404 error page, including a more natural
            description, the parent site's branding, and sometimes a site map, a search form or 404 page widget. The
            protocol level phrase, which is hidden from the user, is rarely customized.

            Internet Explorer, however, will not display custom pages unless they are larger than 512 bytes, opting
            instead to display a "friendly" error page.[2] Google Chrome included similar functionality, where the 404
            is replaced with alternative suggestions generated by Google algorithms, if the page is under 512 bytes in
            size.[citation needed]

            Another problem is that if the page does not provide a favicon, and a separate custom 404 page exists, extra
            traffic and longer loading times will be generated on every page view.

            Many organizations use 404 error pages as an opportunity to inject humor into what may otherwise be a
            serious website. For example, Metro UK shows a polar bear on a skateboard, and the web development agency
            Left Logic has a simple drawing program.

            While many websites send additional information in a 404 error message—such as a link to the homepage of a
            website or a search box—some also endeavor to find the correct web page the user wanted. Extensions are
            available for some popular content management systems (CMSs) to do this.

            In Europe, the NotFound project, created by multiple European organizations including Missing Children
            Europe and Child Focus, encourages site operators to add a snippet of code to serve customised 404 error
            pages.</p>

</section>
</div>
<!-- Cloudflare Web Analytics --><script defer src='https://static.cloudflareinsights.com/beacon.min.js' data-cf-beacon='{"token": "e228894176af4d4e9a3241d951e7624f"}'></script><!-- End Cloudflare Web Analytics -->

</body>
</html>

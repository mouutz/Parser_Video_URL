<?php

include('simple_html_dom.php');

 
$vidID = 'pq1iaxsjujpwipwhf6qzn58y6h'; // id video -> https://www.myvi.tv/embed/pq1iaxsjujpwipwhf6qzn58y6h

$source = file_get_contents("https://www.myvi.tv/embed/".$vidID);

preg_match_all('/https.*u0026tp/', $source, $output_array);

$text = $output_array[0][0];

$json = urldecode($text);

$url = substr($json, 0, strpos($json, "\u0026"));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$a = curl_exec($ch);

$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); 
$realUrl = $url; 


echo $realUrl
?>

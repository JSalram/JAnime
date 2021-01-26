<?php

$url = $_GET["url"];
$html = file_get_contents($url);

if (strpos($url, "animeflv")) {
    $vid = substr($html, strpos($html, "GoCDN"));
} else {
    $vid = substr($html, strpos($html, "<iframe"));
}
$vid = substr($vid, strpos($vid, "https"));
$vid = substr($vid, 0, strpos($vid, '"'));

echo $vid;

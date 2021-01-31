<?php

$url = $_GET["url"];
$html = file_get_contents($url);

if (strpos($url, "animeflv")) {
    $vid = substr($html, strpos($html, "\"Stape\""));
    $vid = substr($vid, strpos($vid, "code"));
} else {
    $vid = substr($html, strpos($html, "<iframe"));
}

$vid = substr($vid, strpos($vid, "https"));

if (strpos($url, "onepiecemovil")) {
    $vid = substr($vid, 0, strpos($vid, '\''));
} else {
    $vid = substr($vid, 0, strpos($vid, '"'));
}
$vid = str_replace("\\", "", $vid);

echo $vid;

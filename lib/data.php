<?php

require_once 'fn.php';
set_time_limit(20);

session_start();

if (isset($_POST['data'])) {
    $receivedData = $_POST['data'];
    $listPath = explode(',', $receivedData);
    $baseUrl= $_SESSION['baseUrl'];

    $url= $listPath[0];
    $url_path = parse_url($url,PHP_URL_PATH);
	$xmlUrls = array_map(function ($elm) use($baseUrl) {
        $tmp = parse_url($elm,PHP_URL_PATH);
         return $baseUrl.'/'.$tmp;
    }, $listPath);
}



?>
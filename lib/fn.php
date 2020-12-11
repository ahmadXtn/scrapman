<?php

function prettyPrint($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


function page_title($url)
{
    $fp = file_get_contents($url);
    if (!$fp)
        return null;

    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if (!$res)
        return null;

    // Clean up title: remove EOL's and excessive whitespace.
    $title = preg_replace('/\s+/', ' ', $title_matches[1]);
    $title = trim($title);
    return $title;
}



function curl_get_contents($url) {
    // Initiate the curl session
$ch = curl_init();
   // Set the URL
curl_setopt($ch, CURLOPT_URL, $url);
  // Removes the headers from the output
curl_setopt($ch, CURLOPT_HEADER, 0);
  // Return the output instead of displaying it directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 // Execute the curl session
$output = curl_exec($ch);
 // Close the curl session
curl_close($ch);
 // Return the output as a variable
return $output;
}
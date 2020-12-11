<?php
require_once 'simple_html_dom.php';
require_once 'fn.php';

session_start();



if (isset($_POST['url'])) {
    $_SESSION['url'] = $_POST['url'];
}

$url = $_SESSION['url'];
$path_parts = pathinfo($url);
//BaseUrl
$dirName=$path_parts['dirname'];
$_SESSION['baseUrl'] = $dirName;

//echo $url;
//echo "<br>";
//echo $dirName;






$htmlDoc = file_get_html($url);

// depend 1 or 2
$html = $htmlDoc->find('nav > ol', 1);
$children = $html->children(1);
if ($children === null) {
    $html = $htmlDoc->find('nav > ol', 2);
}

$parsedUrl = parse_url($url);
//prettyPrint($parsedUrl); 
$_SESSION['bookID']=$bookId = explode('/', $parsedUrl['path'])[7];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .form-container{
        display: none;
    }
    
    </style>
</head>

<body>
    <div class="form-container">
        <form id="form" action="handler.php" method="post">
            <label for="data">Data</label>
            <input type="text" id="data" name="data">
        </form>
    </div>

    <button type="submit" id="send">Download</button>
    <br>
    <?= $html ?>
    <script src="js/script.js"></script>
</body>

</html>
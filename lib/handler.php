<?php



require   '../vendor/autoload.php';
require_once 'data.php';
require_once 'fn.php';
set_time_limit(36000);

use Knp\Snappy\Pdf;

$bookId =$_SESSION['bookID'];
$title=page_title($xmlUrls[0]);
$title=str_replace('/',' ',$title);



$rootPath = $_SERVER['DOCUMENT_ROOT'];


$bookDirectory = $rootPath . DIRECTORY_SEPARATOR . "download_v2" . DIRECTORY_SEPARATOR .$bookId. DIRECTORY_SEPARATOR. "$title". DIRECTORY_SEPARATOR;

if (!is_dir($bookDirectory)) {
    // dir doesn't exist, make it
    mkdir($bookDirectory, 0777, true);
} else {
    echo "already exist";
    header("Location: http://".$_SERVER['HTTP_HOST']."/bibilio_v2");

    exit();
}






$snappy = new Pdf('C://"Program Files"/wkhtmltopdf/bin/wkhtmltopdf.exe');

/*
/*
try {
    header('Content-Type: application/pdf');
    header("Content-Disposition: attachment; filename=$title.pdf");
    echo $snappy->getOutput($slice, array(
        'orientation' => 'portrait',
        'enable-javascript' => true,
        'javascript-delay' => 2500,
        'no-stop-slow-scripts' => true,
        'no-background' => false,
        'lowquality' => false,
        'page-height' => 130 * 3,
        'page-width'  => 95 * 3,
        'encoding' => 'utf-8',
        'images' => true,
        'cookie' => array(),
        'dpi' => 300,
        'enable-external-links' => true,
        'enable-internal-links' => true
    ));
} catch (Exception $ex) {
    echo $ex;
}


*/

//file_put_contents("z.pdf", $snappy->getOutput($slice));


foreach ($xmlUrls as $index=>$url){
    $out=$snappy->getOutput($url);
    file_put_contents($bookDirectory.$index.'.pdf', $out);
}
header("Location: http://".$_SERVER['HTTP_HOST']."/bibilio_v2");

?>

/*

 array(
        'orientation' => 'portrait',
        'enable-javascript' => true,
        'javascript-delay' => 2500,
        'no-stop-slow-scripts' => true,
        'no-background' => false,
        'lowquality' => false,
        'page-height' => 130 * 3,
        'page-width'  => 95 * 3,
        'encoding' => 'utf-8',
        'images' => true,
        'cookie' => array(),
        'dpi' => 300,
        'enable-external-links' => true,
        'enable-internal-links' => true
    )
*/
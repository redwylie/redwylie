<?php
header("Access-Control-Allow-Origin: *");
require_once('vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');

$twig = new Twig_Environment($loader, array(
  'cache' => false,
  'auto_reload' => true,
));

$photo = null;
$photoId = $_GET['photo'];

$file = file_get_contents('./images.json', true);

//var_dump($file);
//var_dump($photoId);

$json = $file;

$obj = json_decode($json);

//print $obj->{'images'};

foreach ($obj->{'images'} as &$image) {
    if ($image->_id == $photoId) {
        $photo = $image;
        break;
    };
}

//var_dump($photo);

$template = $twig->loadTemplate('photo.html');
echo $template->render(array(
		'photo' => $photo,
		'id' => $id,
		'title' => 'Red Wylie Photography - ' .$photoId,
	));

?>
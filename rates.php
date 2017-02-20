<?php

require_once('vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');

$twig = new Twig_Environment($loader, array(
  'cache' => false,
  'auto_reload' => true,
));

$template = $twig->loadTemplate('rates.html');
echo $template->render(array( 
		'title' => 'Photo session rates',
		'description' => 'What to expect and how to prepare for your headshot or portrait session'
	));

?>
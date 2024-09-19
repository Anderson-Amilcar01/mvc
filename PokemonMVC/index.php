<?php 
define('BASE_PATH',__DIR__.'/app/');

require_once BASE_PATH.'config/config.php';
require_once BASE_PATH.'services/PokemonAPIService.php';
require_once BASE_PATH.'controllers/PokemonControllers.php';

$config= require BASE_PATH.'config/config.php';

$apiService= new PokemonAPIService($config['api_url']);
$model=new PokemonModel($apiService);
$controller=new PokemonController($model);

$page=isset($_GET['page'])?(int)$_GET['page']:1;
$controller->index($page);
?>
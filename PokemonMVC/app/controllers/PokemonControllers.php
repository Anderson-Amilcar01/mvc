<?php 
require_once BASE_PATH .'models/PokemonModels.php';

class PokemonController{
    private $model;

    public function __construct(PokemonModel $model){
        $this->model=$model;
    }
    public function index($page=1){
        $config=require BASE_PATH .'config/config.php';
        $itemsPerpage=$config['items_per_page'];
        $PokemonList=$this->model->getPokemonList(page:$page,itemsPerPage:$itemsPerpage);
        include BASE_PATH.'views/layaut.php';
    }
}
?>
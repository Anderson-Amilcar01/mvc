<?php 
require_once BASE_PATH .'models/PokemonModels.php';

class PokemonController{
    private $model;

    public function __construct(PokemonModel $model){
        $this->model=$model;
    }
    public function index($page = 1) {
        $config = require BASE_PATH . 'config/config.php';
        $itemsPerPage = $config['items_per_page'];
    
        // Obtener la lista de Pokémon desde el modelo
        $pokemonList = $this->model->getPokemonList($page, $itemsPerPage);
    
        // Asegúrate de que la variable $pokemonList se pase a la vista
        include BASE_PATH . 'views/layout.php';
    }
    
}
?>
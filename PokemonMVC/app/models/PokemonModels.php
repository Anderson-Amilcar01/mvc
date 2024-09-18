<?php
 require_once __DIR__ .'/../services/PokemonAPIService.php';

 class PokemonModel{
    private $apiService;
    public function __construct(PokemonAPIService $apiService){
        $this->apiService=$apiService;

    }
    public function getPokemonList($page,$itemsPerPage){
        $offset=($page-1) *$itemsPerPage;
        $pokemonList=$this->apiService->getPokemonList(offset:$offset,limit:$itemsPerPage);

        foreach($pokemonList['results']as &$pokemon){
            $details=$this->apiService->getPokemonDetails(name:$pokemon['name']);
            $pokemon['image']=$details['sprites']['front_default'];
            $pokemon['types']= array_column(array:$details['types'],column_key:'type',index_key:'name');
        }
        return $pokemonList;
    }
 }
?>
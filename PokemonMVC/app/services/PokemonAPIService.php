<?php 
class PokemonAPIService{
    private $api_url;
    public function __construct($api_url){
        $this->api_url=$api_url;
    }
    public function getPokemonList($offset,$limit){
        $url=$this->api_url."pokemon?offset={$offset}&limit={$limit}";
        $response=file_get_contents(filename:$url);
        return json_decode(json:$response,associative:true);
    }
    public function getPokemonDetails($name){
        $url=$this->api_url."pokemon/{$name}";
        $response=file_get_contents(filename:$url);
        return json_decode(json:$response,associative:true);
    }
}
?>
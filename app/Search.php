<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    private $hash;
    private $apiUri = 'http://gateway.marvel.com:80/v1/public/';
    private $type;
    private $param;
    private $userInput;

    function __construct($type, $param, $userInput){
        parent::__construct();
        $ts = time();
        $this->hash = '&ts='.$ts.'&apikey='.env('MARVEL_PUBLIC_KEY').'&hash='.md5($ts.env('MARVEL_PRIVATE_KEY').env('MARVEL_PUBLIC_KEY'));
        $this->type = $type;
        $this->param = $param;
        $this->userInput = $userInput;
    }

    public function returnResults(){
        $query = json_decode(file_get_contents($this->apiUri.$this->type.'?'.$this->param.$this->userInput.$this->hash), true);

        $results = [];
        foreach ($query['data']['results'] as $result){
            array_push($results, $result['name']);
        }

        return $results;
    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Searches extends Controller
{
    public function returnCharacters(Request $request){

        $ts = time();
        $hash = md5($ts.'6b803322f0097915e32d3ed4896ad1ef13584b5c'.'d5daf9856bfa747da717ef13cfc37c88');
        $json = json_decode(file_get_contents('http://gateway.marvel.com:80/v1/public/characters?ts='.$ts.'&nameStartsWith=the&apikey=d5daf9856bfa747da717ef13cfc37c88&hash='.$hash), true);

        $results = [];
        foreach ($json['data']['results'] as $result){
            array_push($results, $result['name']);
        }
        return response()->json($results);
    }
}

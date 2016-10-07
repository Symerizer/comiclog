<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;
use App\Http\Requests;

class Searches extends Controller
{
    public function returnCharacters(Request $request){

        $query = new Search('characters', 'nameStartsWith=', 'the');

        return $query->returnResults();
    }
}

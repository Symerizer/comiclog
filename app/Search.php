<?php

namespace App;
use App\Favourite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Search extends Model
{
    private $hash;
    private $apiUri = 'https://gateway.marvel.com:443/v1/public/';
    private $type;
    private $param;
    private $userInput;
    private $charLimit = 2;

    function __construct($type, $param, $userInput){
        parent::__construct();
        $ts = time();
        $this->hash = '&ts='.$ts.'&apikey='.env('MARVEL_PUBLIC_KEY').'&hash='.md5($ts.env('MARVEL_PRIVATE_KEY').env('MARVEL_PUBLIC_KEY'));
        $this->type = $type;
        $this->param = $param;
        $this->userInput = urlencode($userInput);
    }

    public function returnResults(){
        $userInputLength = strlen($this->userInput);
        if($userInputLength < $this->charLimit){
            return ["Query must be more than " .$this->charLimit." characters."];
        }
        $query = json_decode(file_get_contents($this->apiUri.$this->type.'?limit=10&'.$this->param.$this->userInput.$this->hash), true);

        $results = array_fill_keys(['stats', 'data'], []);
        $queryData = $query['data'];
        $results['stats'] = array('offset' => $queryData["offset"], 'limit' => $queryData['limit'], 'total' => $queryData['total']);

        //Get user favourites

        $userFavourites = Favourite::where("user_id", Auth::id())->get();
        debug($userFavourites);
        foreach ($queryData['results'] as $result) {
            foreach($userFavourites as $favourite){
                if($favourite->char_id == $result['id']){
                    array_push($results['data'], ["name" => $result['name'], "id" => $result['id'], "isFavourite" => true]);
                    break;
                }
                else{
                debug($favourite->char_id, $result['id']);
                array_push($results['data'], ["name" => $result['name'], "id" => $result['id'], "isFavourite" => false]);
                    break;
                }
            }
        }

        return $results;
    }




}

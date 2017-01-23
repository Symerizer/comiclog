<?php

namespace App;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function isFavourite($charsId){
        $userFavourites = Favourite::where("user_id", Auth::id())->get();
        debug($userFavourites);
    }
}

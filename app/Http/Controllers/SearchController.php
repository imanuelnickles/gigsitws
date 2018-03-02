<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\User_location;
use App\Models\Province;
use App\Models\City;
use App\Models\Listener;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Recommended_album;
use App\Models\Playlist;
use App\Models\Playlist_detail;
use App\Models\User_music_activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Controllers\Input;
use Carbon\Carbon;

class SearchController extends Controller
{
    /*Search*/
     public function searchData(){
        $artist=Artist::all();
        $albums=Album::where('status',1)->get();
        $song=Song::all();
        return response()->json(compact('artist','albums','song'));
    }

    public function searchQuery($query){
        $artist=Artist::where('artist_name', 'LIKE', '%'.$query.'%' )->get();
        $albums=Album::where('album_title', 'LIKE', '%'.$query.'%' )->where('status',1)->get();
        $song=Song::where('song_title', 'LIKE', '%'.$query.'%' )->with(['album' => function($query){
            return $query->with('artist');
        }])->get();
        return response()->json(compact('artist','albums','song'));
    }

    

}
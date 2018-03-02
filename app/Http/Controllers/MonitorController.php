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
use App\Models\Slider_ads;
use App\Models\Recommended_album;
use App\Models\User_music_activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Controllers\Input;
use Carbon\Carbon;

class MonitorController extends Controller
{
    
    //Monitor
    public function monitorProvince($id){
        /*$monitor=Song::where('album_id',$id)->with(['activity' => function($query){
            return $query->with(['listener' => function($query1){

            return $query1->with(['location' => function($query2){

            return $query2->with('city','province');

            }]);

            }]);
            }])->get();*/
$monitor=Album::where('album_id',$id)->where('status',1)->with(['songId' => function($query){
            return $query->with(['activity' => function($query1){

            return $query1->with(['listener' => function($query2){

            return $query2->with(['location' => function($query3){

            return $query3->with('city','province');

            }]);

            }]);

            }]);
            }])->get()->first();
        //$monitor=User_music_activity::all();
        return response()->json(compact('monitor'));
    }


    /*For admin monitoring*/
    public function monitorArtist(){
        $content=Artist::where('status',1)->get();
        return response()->json(compact('content'));
    }

    public function monitorArtistAlbum($id){
        $content=Artist::where('artist_id',$id)->where('status',1)->with('album')->get()->first();
        return response()->json(compact('content'));
    }


}
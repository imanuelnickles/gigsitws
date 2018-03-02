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
use App\Models\Slider_ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Controllers\Input;
use Carbon\Carbon;

class ExploreController extends Controller
{

    /*EXPLORE DATA*/
    public function recommendedAlbum(){
        $content=Recommended_album::with(['album' => function($query){
            return $query->with('artist');
        }])->get();
        return response()->json(compact('content'));
    }

    public function newRelease(){
        $content=Album::where('status',1)->orderBy('release_date', 'desc')->with('artist')->get();
        return response()->json(compact('content'));
    }

    public function hotArtist(){
        $content=Artist::where('status',1)->orderBy('join_date', 'desc')->get();
        return response()->json(compact('content'));
    }

   public function topChart(){
        //$content=User_music_activity::all();
         $content = DB::select("select t.song_id,COUNT(t.song_id) AS top_song ,m.song_title,a.album_title,a.album_picture,u.artist_name
            from trlisteneractivity as t INNER JOIN mssong m ON t.song_id=m.song_id
            INNER JOIN msalbum as a ON a.album_id=m.album_id
            INNER JOIN msartist as u ON u.artist_id=a.artist_id
          group by song_id order by top_song DESC ");
        return response()->json(compact('content'));

    }

    public function sliderAds(){
        $content=Slider_ads::all();
        return response()->json(compact('content'));
    }

}
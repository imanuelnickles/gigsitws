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

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Controllers\Input;

class ArtistManageController extends Controller
{
    public function artistAlbums($id){
        //Query-ing
        $album=Artist::where('user_id',$id)->with('album')->first();

        //Returning as JSON
        return response()->json(compact('album'));
    }

    public function albumDetail($albumId)
    {
        $album=Album::where('album_id',$albumId)->with('songId')->get()->first();
        return response()->json(compact('album'));
    }


    public function albumUpdate(Request $request)
    {
        $dataCounter=$request->get('manageSongCounter');
        $album=Album::where('album_id',$request->get('albumId'))->first();
        $album->album_title=$request->get('albumTitle');
        $album->save();
        
        for ($i=0; $i < $dataCounter ; $i++) { 

            $id=$request->get('songId'.$i);
            $song=Song::where('song_id',$id)->first();
            $title=$request->get('songTitle'.$i);

            if(strcmp($song->song_title,$title)!=0){
                $song->song_title=$title;
                $song->save();
                
            }
        }
    }

    public function songDelete($id){

        $getId=Song::where('song_id',$id)->get()->first(); 
        $decreaseContent=Album::where('album_id',$getId->album_id)->get()->first();
        $decreaseContent->album_content-=1;
        $decreaseContent->save();

        $deleteSong=Song::where('song_id',$id)->delete();


    }

    public function albumDelete($id){
        $song=Song::where('album_id',$id)->delete();
        $album=Album::where('album_id',$id)->delete();
    }
}
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

class PlaylistController extends Controller
{

    /*Playlist*/
    public function playlistData($id){
        $listener=Listener::where('user_id',$id)->get()->first();
        $playlist=Playlist::where('listener_id',$listener->listener_id)->get()->all();
        return response()->json(compact('playlist'));
    }
    public function playlistCreate(Request $request){
        $userId=$request->get('userId');
        $name=$request->get('playlistName');
        $listener=Listener::where('user_id',$userId)->get()->first();
        Playlist::create([
            'playlist_name' => $name,
            'playlist_content' => 0,
            'listener_id' =>$listener->listener_id
            ]);
    }

    public function playlistEdit(Request  $request){
        $this->validate($request, [
            'playlist_edit_id'     => 'required',
            'playlist_new_name' =>'required',
                        
        ]);
        $id=$request->get('playlist_edit_id');

        $name=$request->get('playlist_new_name');
        $playlist=Playlist::where('playlist_id', $id)->first();

        $playlist->playlist_name=$name;
        $playlist->save();

    }

    public function playlistAdd($playlist_id,$song_id){
        Playlist_detail::create([
            'playlist_id' => $playlist_id,
            'song_id' =>$song_id
            ]);
        $playlist=Playlist::where('playlist_id',$playlist_id)->first();
        $playlist->playlist_content=($playlist->playlist_content)+1;
        $playlist->save();
    }

    public function playlistDelete($id){
            $playlist_detail=Playlist_detail::where('playlist_id',$id)->delete();
            $playlist=Playlist::where('playlist_id',$id)->delete();
            
        
    }

    public function playlistDetail($id){
        $playlist=Playlist::where('playlist_id',$id )->with(['playlistDetail' => function($query){
            return $query->with(['song' => function($query1){
                return $query1->with(['album'=>function($query2){
                        return $query2->with('artist');
                    }]);
                }]);
            }])->get();

        

        return response()->json(compact('playlist'));
    }

     public function playlistDetailDelete($id){
        
        $playlist_detail=Playlist_detail::where('playlist_detail_id',$id)->first();
        $playlist=Playlist::where('playlist_id',$playlist_detail->playlist_id)->first();
        $playlist->playlist_content=($playlist->playlist_content)-1;
        $playlist->save();
        $playlist_detail->delete();
    }

}
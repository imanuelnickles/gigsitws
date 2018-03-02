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

class ContentController extends Controller
{
    //Get Artist Data
    public function Artist(){
        $content=Artist::where('status',1)->get();
        return response()->json(compact('content'));
    }
    //Get Artist Album's
    public function ArtistAlbum($id){
        $content=Album::where('artist_id',$id)->where('status',1)->get()->all();
        return response()->json(compact('content'));
    }

    //Get Album Data
    public function Album(){
        $content=Album::where('status',1)->all();
        return response()->json(compact('content'));
    }

    public function AlbumSong($id){
        $artist=Artist::where('artist_id',$id)->where('status',1)->get()->first();
        $content=Album::where('artist_id',$id)->where('status',1)->with('songId')->get()->all();
        return response()->json(compact('artist','content'));
    }

    //Get Album Detail (Song) Data
    public function AlbumDetail($id){
       // perbaiki
        /*$artist=Album::select('artist_id')->where('album_id',$id)->get()->first();
        $mus=Artist::where('artist_id',$artist->artist_id)->get()->first();

        $content=Album::where('album_id',$id)->with('songId')->get()->first();*/
        $song=Album::where('album_id', $id )->where('status',1)->with('songId')->get()->first();
        $artist=Album::where('album_id', $id )->where('status',1)->with('artist')->get()->first();
        return response()->json(compact('song','artist'));
    }

    //song detail
    public function songDetail($id){
        $song=Song::where('song_id', $id )->with(['album' => function($query){
            return $query->with('artist');
            }])->get()->first();
        return response()->json(compact('song'));
    }

    public function changeSong($song_id){
        $content=Song::where('song_id', $song_id )->with(['album' => function($query){
            return $query->with('artist');
            }])->get();
        return response()->json(compact('content'));
    }

    public function checkLastListen($id,$song_id){
        //$activity=User_music_activity::where('listener_id',$id)->orderBy('listen_date', 'desc')->get()->first();
        $activity=User_music_activity::where('listener_id',$id)->where('song_id',$song_id)->whereDate('listen_date', '>=', Carbon::today('Asia/Jakarta')->toDateString())->get()->first();
        //$activity=Carbon::now('Asia/Jakarta');
        /*$last = new Carbon($activity->listen_date);
        $now = Carbon::now();
        if($last->lt($now)){
            return true;
        }
        return false;*/
        
        if($activity==NULL){
            return true;
        }else{
            return false;
        }
    }

    //Get Music Data and Storing User Data
    public function playSong($song_id,$user_id){
        $content=Song::where('song_id', $song_id )->with(['album' => function($query){
            return $query->with('artist');
            }])->get();
        //Storing User Data
        $listener=Listener::where('user_id',$user_id)->get()->first();
        if($this->checkLastListen($listener->listener_id,$song_id)){
            User_music_activity::create([
            'listener_id' => $listener->listener_id,
            'song_id' => $song_id,
            'listen_date' =>Carbon::now('Asia/Jakarta')
            ]);

        }
        //return $this->checkLastListen($listener->listener_id,$song_id);
        return response()->json(compact('content'));
    }

    /*EXPLORE DATA*/
    /*public function recommendedAlbum(){
        $content=Recommended_album::with(['album' => function($query){
            return $query->with('artist');
        }])->take(6)->get();
        return response()->json(compact('content'));
    }

    public function newRelease(){
        $content=Album::orderBy('release_date', 'desc')->with('artist')->take(6)->get();
        return response()->json(compact('content'));
    }

    public function hotArtist(){
        $content=Artist::orderBy('join_date', 'desc')->take(6)->get();
        return response()->json(compact('content'));
    }

    public function hotArtistFull(){
        $content=Artist::orderBy('join_date', 'desc')->get();
        return response()->json(compact('content'));
    }

    public function newReleaseFull(){
        $content=Album::orderBy('release_date', 'desc')->with('artist')->get();
        return response()->json(compact('content'));
    }

    public function recommendedAlbumFull(){
        $content=Recommended_album::with(['album' => function($query){
            return $query->with('artist');
        }])->get()->all();
        return response()->json(compact('content'));
    }*/

   /* public function searchData(){
        $artist=Artist::all();
        $albums=Album::all();
        $song=Song::all();
        return response()->json(compact('artist','albums','song'));
    }

    public function searchQuery($query){
        $artist=Artist::where('artist_name', 'LIKE', '%'.$query.'%' )->get();
        $albums=Album::where('album_title', 'LIKE', '%'.$query.'%' )->get();
        $song=Song::where('song_title', 'LIKE', '%'.$query.'%' )->with(['album' => function($query){
            return $query->with('artist');
        }])->get();
        return response()->json(compact('artist','albums','song'));
    }
*/
    /*public function playlistData($id){
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
    }*/
}
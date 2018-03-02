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

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Controllers\Input;
use Carbon\Carbon;

class AlbumManagementController extends Controller
{
    
    public function albumRegistrations(){
    
        $content=DB::table('msartist')
            ->join('msalbum', 'msalbum.artist_id', '=', 'msartist.artist_id')
            ->select('*')
            ->where('msalbum.status','=',0)
            ->get();
        return response()->json(compact('content'));

    }

    public function albumApproved($id){

        $album=Album::where('album_id',$id)->first();

        $album->status=1;
        $album->save();

    }

    public function albumDecline($id){

        $album=Album::where('album_id',$id)->first();
        $album->status=2;
        $album->save();

    }

    public function albumManager(){
        $content=Artist::with('album')->get()->all();
        return response()->json(compact('content'));
    }

    public function albumEdit($id){
        $content=Album::where('album_id',$id)->get()->first();
        return response()->json(compact('content'));
    }

    public function albumSubmitEdit(Request $request){

        $this->validate($request, [
            'albumId' => 'required',
            'albumTitle' => 'required|max:20',
            'albumGenre' => 'required'
                       
        ]);

        $albumId=$request->get('albumId');
        $albumTitle=$request->get('albumTitle');
        $albumGenre=$request->get('albumGenre');

        $album=Album::where('album_id',$albumId)->first();
        

        if($request->file('albumPicture')==NULL){
            $album->album_title=$albumTitle;
            $album->genre=$albumGenre;
            $album->save();
            
        }else{
            $destinationPath='uploads/artist/'.$album->artist_id.'/music/cover';
            $name = $request->file('albumPicture')->getClientOriginalName();
            $upload=$request->file('albumPicture')->move($destinationPath, $name);

            $destinationFullPath='webserve/public/'.$destinationPath.'/'.$name;

            $album->album_title=$albumTitle;
            $album->genre=$albumGenre;
            $album->album_picture=$destinationFullPath;
            $album->save();
            
        }
        
        

       

    }

    public function albumDelete($id){
        $SongId=Song::where('album_id',$id)->delete();
        $AlbumId=Album::where('album_id',$id)->delete(); 


        
    }

    public function songManager(){
        //Relate with album & artist
        $content=Song::with(['album' => function($query){
            return $query->with('artist');
            }])->get();
        return response()->json(compact('content'));
    }

    public function songEdit($id){
        $content=Song::where('song_id',$id)->get()->first();
        return response()->json(compact('content'));
    }

    public function songSubmitEdit(Request $request){
        $this->validate($request, [
            'songId' => 'required',
            'songTitle' => 'required|max:50',
            
                       
        ]);
        $songId=$request->get('songId');
        $songTitle=$request->get('songTitle');

        $song=Song::where('song_id',$songId)->first();
        $song->song_title=$songTitle;
        $song->save();
    }

    public function songDelete($id){
        $song=Song::where('song_id',$id)->delete();
    }

    public function declinedAlbum(){
        $album=Album::where('status',2)->with('artist')->get()->all();
        return response()->json(compact('album'));
    }

    public function undeclinedAlbum($id){
        
        $album=Album::where('album_id',$id)->first(); 
        $album->status=0;
        $album->save();
    }

    
    
}
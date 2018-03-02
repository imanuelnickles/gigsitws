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

use Carbon\Carbon;

class UploadController extends Controller
{
    public function albumid()
    {
        $last_albumid=Album::select('album_id')->orderBy('album_id', 'desc')->first();
        return $last_albumid->album_id;
    }

    public function artistid($user){
       
        return $last_artistid->artist_id;
    }

    public function uploadData(Request $request){


        /*Validate the Input*/
        $this->validate($request, [
            'albumTitle'     => 'required|max:50',
            'albumPicture'=>'required',
            'songGenre'    => 'required|max:20',
            'totalSongs' => 'required',
            
        ]);

       

        /*Get String Data*/
        $albumTitle=$request->get('albumTitle');
        $songGenre=$request->get('songGenre');
        $totalSongs=$request->get('totalSongs');

        $user=$request->get('userId');
        $artistid=Artist::select('artist_id')->where('user_id',$user)->first();

        /*Get File Data*/
        $destinationPathPicture='uploads/artist/'.$artistid->artist_id.'/music/cover';
        $destinationPathMusic='uploads/artist/'.$artistid->artist_id.'/music/song';
        /*1. Picture*/
        //$extension = $request->file('albumPicture')->getClientOriginalExtension();
        $name = $request->file('albumPicture')->getClientOriginalName();
        $upload=$request->file('albumPicture')->move($destinationPathPicture, $name);
        
        Album::create([
            'artist_id' => $artistid->artist_id,
            'album_title' => $albumTitle,
            'album_picture' => 'uploads/artist/'.$artistid->artist_id.'/music/cover/'.$name,
            'album_content' => $totalSongs,
            'genre' => $songGenre,
            'release_date' => Carbon::now('Asia/Jakarta'),
            'status' => 0
            ]);
      
        /*2. Files*/
        for ($i=0; $i < $totalSongs ; $i++) { 
            $name1 = $request->file('file'.$i)->getClientOriginalName();
           $upload1=$request->file('file'.$i)->move($destinationPathMusic, $name1);
           Song::create([
            
            'album_id' => $this->albumid(),
            'song_title' => str_replace(".mp3", "", $name1),
            'song_file' => 'uploads/artist/'.$artistid->artist_id.'/music/song/'.$name1,
            'status' => 0
            ]);
        }

        


        

            
      
       

    }

    public function uploadNewSong(Request $request){
        $totalSongs=$request->get('totalSongs');
        $albumId=$request->get('albumId');
        $album=Album::where('album_id',$albumId)->first();
        $album->album_content=$album->album_content+$totalSongs;

        $destinationPathMusic='uploads/artist/'.$album->artist_id.'/music/song/';


        for ($i=0; $i < $totalSongs ; $i++) { 
            $name1 = $request->file('file'.$i)->getClientOriginalName();
           $upload1=$request->file('file'.$i)->move($destinationPathMusic, $name1);

           Song::create([
           
            'album_id' => $albumId,
            'song_title' => str_replace(".mp3", "", $name1),
            'song_file' => 'uploads/artist/'.$album->artist_id.'/music/song/'.$name1,
            'status' => 0
            ]);
        }

        $album->save();
    }

}
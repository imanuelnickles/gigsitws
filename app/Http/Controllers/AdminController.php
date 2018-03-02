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

class AdminController extends Controller
{
    
    /*public function albumRegistrations(){
    
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

    public function listenerManager(){
        $content=Listener::with('userid')->with(['location' => function($query){
            return $query->with('city','province');
        }])->get()->all();

        
        return response()->json(compact('content'));
    }

    public function listenerEdit($id){
        $content=Listener::where('listener_id',$id )->with('userid')->with(['location' => function($query){
            return $query->with('city','province');
        }])->get()->first();

        return response()->json(compact('content'));
    }

    public function listenerSubmitEdit(Request $request){
        $this->validate($request, [
            'listenerId' => 'required',
            'listenerUsername' => 'required|max:20',
            'listenerEmail'=>'email|required',
            'listenerGender' => 'required',
            'listenerBOD' =>'required',
            'listenerProvince' => 'required',
            'listenerCity' => 'required'
                       
        ]);
        $listenerId=$request->get('listenerId');

        $listener=Listener::where('listener_id',$listenerId)->get()->first();
        $user=User::where('user_id',$listener->user_id)->first();
        $location=User_location::where('listener_id',$listenerId)->first();

        $listener->gender=$request->get('listenerGender');
        $listener->listener_bod=$request->get('listenerBOD');

        $user->username=$request->get('listenerUsername');
        $user->email=$request->get('listenerEmail');

        $location->province_id=$request->get('listenerProvince');
        $location->city_id=$request->get('listenerCity');
        

        $listener->save();
        $user->save();
        $location->save();

    }

    public function listenerDelete($id){
        $userid=Listener::select('user_id')->where('listener_id',$id)->get()->first();
        $listener=Listener::where('listener_id',$id)->delete();
        $user=User::where('user_id',$userid->user_id)->delete();
    }
    public function artistRegistration(){
        $content=Artist::where('status',0)->with('userid')->get();
        return response()->json(compact('content'));
    }

    public function artistRegistrationApprove($id){
        $artist=Artist::where('artist_id',$id)->first();
        $artist->status=1;
        $artist->save();
        
    }

    public function artistRegistrationDecline($id){
        $artist=Artist::where('artist_id',$id)->first();
        $artist->status=2;
        $artist->save();
    }

    public function artistDeclined(){
        $content=Artist::where('status',2)->with('userid')->get();
        return response()->json(compact('content'));
    }

    public function artistUndecline($id){
        $artist=Artist::where('artist_id',$id)->first();
        $artist->status=0;
        $artist->save();
    }

    public function artistManager(){
        $content=Artist::with('userid')->get()->all();
        return response()->json(compact('content'));
    }

    public function artistEdit($id){
        $content=Artist::with('userid')->where('artist_id',$id)->get()->first();
        return response()->json(compact('content'));
    }

    public function artistSubmitEdit(Request $request){
        $this->validate($request, [
            'artistId' => 'required',
            'artistUsername' => 'required|max:20',
            'artistEmail'=>'email|required',
            'artistName' => 'required|max:20',
            'artistBio' => 'required|max:100'
            
                       
        ]);

        $artistId=$request->get('artistId');
        
        $artistUsername=$request->get('artistUsername');
        $artistEmail=$request->get('artistEmail');
        $artistName=$request->get('artistName');
        $artistBio=$request->get('artistBio');
        $artistPicture=$request->file('artistPicture');

        $getuser=Artist::select('user_id')->where('artist_id',$artistId)->get()->first();

        $artist=Artist::where('artist_id',$artistId)->first();
        $user=User::where('user_id',$getuser->user_id)->first();
        

        


        if($request->file('artistPicture')==NULL){
            $artist->artist_name=$artistName;
            $artist->artist_bio=$artistBio;
            $user->username=$artistUsername;
            $user->email=$artistEmail;
            $artist->save();
            $user->save();
            
        }else{
            $destinationPath='uploads/artist/'.$artist->artist_id.'/profile/picture';
            $name = $request->file('artistPicture')->getClientOriginalName();
            $upload=$request->file('artistPicture')->move($destinationPath, $name);

            $destinationFullPath='webserve/public/'.$destinationPath.'/'.$name;

            
            $artist->artist_picture=$destinationFullPath;
            $artist->artist_name=$artistName;
            $artist->artist_bio=$artistBio;
            $user->username=$artistUsername;
            $user->email=$artistEmail;
            $artist->save();
            $user->save();
            
        }
      

    }

    public function artistDelete($id){
        $userid=Artist::select('user_id')->where('artist_id',$id)->get()->first();
        $artist=Artist::where('artist_id',$id)->delete();
        $user=User::where('user_id',$userid->user_id)->delete();
    }

    public function sliderAds(){
        $content=Slider_ads::get()->all();
        return response()->json(compact('content'));
    }

    public function sliderAdsEdit($id){
        $content=Slider_ads::where('slider_ads_id',$id)->get()->first();
        return response()->json(compact('content'));
    }

    public function sliderAdsSubmitEdit(Request $request){
        $this->validate($request, [
            'sliderAdsId' => 'required',
                  
        ]);

        if($request->file('sliderAdsPicture')!=NULL){
            $slider=Slider_ads::where('slider_ads_id',$request->get('sliderAdsId'))->first();

            $destinationPath='uploads/picture/sliderads';
            $name = $request->file('sliderAdsPicture')->getClientOriginalName();
            $upload=$request->file('sliderAdsPicture')->move($destinationPath, $name);
            $destinationFullPath='webserve/public/'.$destinationPath.'/'.$name;

            $slider->slider_ads_picture=$destinationFullPath;
            $slider->updated_at=Carbon::now();
            $slider->save();
        }

    }

    public function sliderAdsDelete($id){
        $slider=Slider_ads::where('slider_ads_id',$id)->delete();
        
    }
    public function sliderAdsNew(Request $request){

        $this->validate($request, [
            'sliderAdsPicture' => 'required',
            
            
                       
        ]);

        $destinationPath='uploads/picture/sliderads';
        $name = $request->file('sliderAdsPicture')->getClientOriginalName();
        $upload=$request->file('sliderAdsPicture')->move($destinationPath, $name);
        $destinationFullPath=$destinationPath.'/'.$name;


        Slider_ads::create([
            'slider_ads_picture' => $destinationFullPath
            
            ]);
    }

    public function recommendedAlbum(){
        
        $content=Recommended_album::with(['album' => function($query){
            return $query->with('artist');
        }])->get();
        return response()->json(compact('content'));
    }

    public function recommendedAlbumEdit($id){
        $content=Recommended_album::with(['album' => function($query){
            return $query->with('artist');
        }])->where('recommended_album_id',$id)->get();
        return response()->json(compact('content'));
    }

    public function recommendedAlbumSelectAlbum(){
        $content=Album::all();
        return response()->json(compact('content'));
    }

    public function recommendedAlbumSubmitEdit(Request $request){
        $this->validate($request, [
            'recommendId' => 'required',
            'recommendSelectAlbum' => 'required'
                  
        ]);

        $album=Recommended_album::where('recommended_album_id',$request->get('recommendId'))->first();
        $album->album_id=$request->get('recommendSelectAlbum');
        $album->save();
    }

    public function recommendedAlbumUndefined(){
        $this->validate($request, [
            
            'recommendSelectAlbum' => 'required'
                  
        ]);
        Recommended_album::create([
            'album_id' => $request->get('recommendSelectAlbum')
            
            ]);
    }*/
    public function monitorArtist(){
        $content=Artist::all();
        return response()->json(compact('content'));
    }

    public function monitorArtistAlbum($id){
        $content=Artist::where('artist_id',$id)->with('album')->get()->first();
        return response()->json(compact('content'));
    }
}
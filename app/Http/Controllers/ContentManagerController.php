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

class ContentManagerController extends Controller
{
    
  

    public function sliderAds(){
        $content=Slider_ads::with('user')->get()->all();
        return response()->json(compact('content'));
    }

    public function sliderAdsEdit($id){
        $content=Slider_ads::where('slider_ads_id',$id)->get()->first();
        return response()->json(compact('content'));
    }

    public function sliderAdsSubmitEdit(Request $request){
        $this->validate($request, [
            'sliderAdsId' => 'required',
            'user_id' => 'required'     
        ]);

        if($request->file('sliderAdsPicture')!=NULL){
            $slider=Slider_ads::where('slider_ads_id',$request->get('sliderAdsId'))->first();

            $destinationPath='uploads/picture/sliderads';
            $name = $request->file('sliderAdsPicture')->getClientOriginalName();
            $upload=$request->file('sliderAdsPicture')->move($destinationPath, $name);
            $destinationFullPath=$destinationPath.'/'.$name;
            $user_id=$request->get('user_id');

            $slider->slider_ads_picture=$destinationFullPath;
            $slider->updated_at=Carbon::now('Asia/Jakarta');
            $slider->user_id=$user_id;
            $slider->save();
        }

    }

    public function sliderAdsDelete($id){
        $slider=Slider_ads::where('slider_ads_id',$id)->delete();
        
    }
    public function sliderAdsNew(Request $request){

        $this->validate($request, [
            'sliderAdsPicture' => 'required',
            'user_id' => 'required'  
            
                       
        ]);

        $destinationPath='uploads/picture/sliderads';
        $name = $request->file('sliderAdsPicture')->getClientOriginalName();
        $upload=$request->file('sliderAdsPicture')->move($destinationPath, $name);
        $destinationFullPath=$destinationPath.'/'.$name;
        $user_id=$request->get('user_id');

        Slider_ads::create([
            'slider_ads_picture' => $destinationFullPath,
            'user_id' => $user_id,
            'updated_at' => Carbon::now('Asia/Jakarta')
            ]);
    }

    public function recommendedAlbum(){
        /*$count=Recommended_album::all()->count();
        $recalbum=Recommended_album::all();
        
        for($i=0;$i<$count;$i++){
            $cons=$recalbum[$i]->album_id;
            $album=Album::where('album_id',$cons)->get()->first();        
            $artist=Artist::where('artist_id',$album->artist_id)->get()->first();
            $array = array_add(['Artist' => $artist->artist_name], 'price', 100);
        }*/
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

    public function recommendedAlbumUndefined(Request $request){
        $this->validate($request, [
            
            'recommendSelectAlbum' => 'required'
                  
        ]);
        Recommended_album::create([
            'album_id' => $request->get('recommendSelectAlbum')
            
            ]);
    }
    public function monitorArtist(){
        $content=Artist::all();
        return response()->json(compact('content'));
    }

    public function monitorArtistAlbum($id){
        $content=Artist::where('artist_id',$id)->with('album')->get()->first();
        return response()->json(compact('content'));
    }
}
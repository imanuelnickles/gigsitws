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

class UserManagerController extends Controller
{
    
    

    public function listenerManager(){
        $content=Listener::with('userid')->with(['location' => function($query){
            return $query->with('city','province');
        }])->get()->all();

        //content=Listener::with('userid')->get()->all();
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
        $content=Artist::where('status',1)->with('userid')->get()->all();
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
            'artistName' => 'required|max:20'
           
            
                       
        ]);

        $artistId=$request->get('artistId');
        
        $artistUsername=$request->get('artistUsername');
        $artistEmail=$request->get('artistEmail');
        $artistName=$request->get('artistName');
       
        $artistPicture=$request->file('artistPicture');

        $getuser=Artist::select('user_id')->where('artist_id',$artistId)->get()->first();

        $artist=Artist::where('artist_id',$artistId)->first();
        $user=User::where('user_id',$getuser->user_id)->first();
        

        


        if($request->file('artistPicture')==NULL){
            $artist->artist_name=$artistName;
          
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

  
}
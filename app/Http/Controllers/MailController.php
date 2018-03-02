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
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function forgot(Request $request){

        $email=$request->get('email');
        $address=array('email' => $email);
        $message="Not Found";
        $user=User::where('email',$email)->first();

        if($user==NULL){
          return response()->json(compact('message'));
        }else{
            $random=str_random(32);
            $user->password=Hash::make($random);
            	
	        
	        Mail::send('email.forgot', ['password'=>$random], function($message) use($address)  {
	            $message->to($address['email'])
	                ->subject('Forgot Password');
	        });

                  
            $user->status=1;
            $user->save();
            
            $message="New password sent. Check your email";
            return response()->json(compact('message'));
        }
        
        
        
       
        
    
  }

  public function verification($confirmationCode){
      if(strlen($confirmationCode)==32){
        $message="Successful";
        $user=User::where('confirmation_code',$confirmationCode)->first();
          if($user!=null)
          {
        $user->status = 1;
        $user->confirmation_code = null;
        $user->save();
        }
        //return  response()->json(compact('message'));
        return redirect()->to("http://beta.gigsit.id/login");
      }else{
        $message="Error cannot activate this user code";
        return  $message;
      }

      
      
  }
  
  /*public function verificatione(){
  	$user=array('email'=>'gigsit.team@gmail.com');
  	$confirmation_code=str_random(32);
        $conf_code="https://api.gigsit.id/register/verify/".$confirmation_code;
        Mail::send('email.verification', ['confirmation_code'=>$conf_code], function($message) use($user)  {
            $message->to($user['email'])
                ->subject('Verify your email address');
        });
  }*/
  
}
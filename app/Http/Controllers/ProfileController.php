<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Artist;
use App\Models\Listener;
use App\Models\User_location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;

class ProfileController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function getProfile($id)
    {
        
        $user=Listener::where('user_id',$id )->with('userid')->with(['location' => function($query){
            return $query->with('city','province');
        }])->get()->first();

        
        return response()->json(compact('user'));
    }

    //edit profile (listener)
    public function editProfile(Request $request){
        $this->validate($request, [
            'userId'     => 'required',
            'listenerUsername' => 'required'
          ]);
        $id=$request->get('userId');
        $username=$request->get('listenerUsername');

        $user=User::where('user_id',$id)->get()->first();
        $listener=Listener::where('user_id',$id)->get()->first();
        $location=User_location::where('listener_id',$listener->listener_id)->get()->first();

        if($request->file('listenerPicture')!=NULL){
            $destinationPathPicture='uploads/listener/'.$id.'/profile/';
            $name = $request->file('listenerPicture')->getClientOriginalName();
            $upload=$request->file('listenerPicture')->move($destinationPathPicture, $name);

            
            $listener->listener_picture=$destinationPathPicture.$name;
            $listener->save();

            
        }

        $user->username=$username;
        $user->save();

        $bod=$request->get('listenerBOD');
        $gender=$request->get('listenerGender');

        $listener->listener_bod=$bod;
        $listener->gender=$gender;
        $listener->save();

        //Province & City
        $province=$request->get('listenerProvince');
        $city=$request->get('listenerCity');
        if($city!=NULL){
            $location->province_id=$province;
            $location->city_id=$city;
            $location->save();
        }

        $lnp=$request->get('listenerNewPassword');
        if($lnp!=NULL){
                $user->password=Hash::make($lnp);
                $user->save();
            
        }

    }
    public function getArtistProfile($id)
    {
        $artist=Artist::where('user_id',$id)->with('userid')->get()->first();
        return response()->json(compact('artist'));
    }
    
       public function editArtistProfile(Request $request){

        //Check for ID
        $this->validate($request, [
            'userId'     => 'required',
            
            'updateUsername' => 'required'
          ]);
        
         

        //Init
        $userId=$request->get('userId');
       
        $username=$request->get('updateUsername');
        $password=$request->get('updatePassword');

        //Query-ing
        $user=User::where('user_id',$userId)->first();
        $artist=Artist::where('user_id',$userId)->first();
        
        //Create Destination Path
        $destinationPath='uploads/artist/'.$artist->artist_id.'/profile/picture';

       

        //Validate Input
        if($request->file('updateImg')==NULL)
        {
            //State for Image is NULL
            $user->username=$username;
           
            if($password!=NULL)
            {
                $user->password=Hash::make($password);
            }

        }else{

            //Image Process
            $name = $request->file('updateImg')->getClientOriginalName();
            $destinationFullPath=$destinationPath.'/'.$name;
            $upload=$request->file('updateImg')->move($destinationPath, $name);

            //Send Data to Model
            $user->username=$username;
             if($password!=NULL)
            {
                $user->password=Hash::make($password);
            }
            $artist->artist_picture=$destinationFullPath;
            
            
        }
            $artist->save();
            $user->save();
        

        
        
       //['artist_picture'=>$destinationPath]

        

   }
}
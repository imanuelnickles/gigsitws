<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\User_location;
use App\Models\Province;
use App\Models\City;
use App\Models\Listener;
use App\Models\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    /*Login (Generate JWT)*/
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);
        $user_status=User::where('email',$request['email'])->first();
        if(!$user_status){
            return response()->json(['user_not_found'], 404);
        }else{
            if($user_status->status==0){
                return response()->json('Account unactive. Please check your email.', 501);
            }else{
                        try {
                    
                    if (! $token = $this->jwt->attempt($request->only('email','password'))) {
                        
                        //return response()->json($request);
                        return response()->json(['user_not_found'], 404);
                    }

                } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                    return response()->json(['token_expired'], 500);

                } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return response()->json(['token_invalid'], 500);

                } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return response()->json(['token_absent' => $e->getMessage()], 500);

                }

                return response()->json(compact('token'));
            }
        }
        
        /*try {
            
            if (! $token = $this->jwt->attempt($request->only('email','password'))) {
                
                //return response()->json($request);
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        return response()->json(compact('token'));*/
    }

    /* Get last userId*/
    public function userid()
    {
        $last_userid=User::select('user_id')->orderBy('user_id', 'desc')->first();
        return $last_userid->user_id;
    }

    /* Get last listenerId*/
    public function listenerid()
    {
        $last_listenerid=Listener::select('listener_id')->orderBy('listener_id', 'desc')->first();
        return $last_listenerid->listener_id;
    }

    public function random_code()
    {
        $code=str_random(32);
        return $code;
    }

   
    /*Listener Register*/
    public function listenerRegister(Request $request)
    {
        $role=2; //Role 2 for Listener
        $confirmation_code=$this->random_code();
        $this->validate($request, [
            'username'     => 'required|max:255',
            'email'    => 'required|email|max:255',
            'password' => 'required',
            'bod' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'city' => 'required'
        ]);

        /*Assign Register Data to User Model*/
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $role,
            'confirmation_code' => $confirmation_code
            ]);

        /*Assign Register Data to Listener Model*/
        Listener::create([

            'user_id' => $this->userid(),//Call function userid()
            'gender' => $request['gender'],
            'listener_bod' => $request['bod']

            ]);
        
        /*Assign Register Data to User_location Model*/
        User_location::create([
            'listener_id' => $this->listenerid(),//Call function listenerid()
            'province_id' => $request['province'],
            'city_id'=> $request['city']
            ]);

        $user=array('email'=>$request['email']);
        $conf_code="https://api.gigsit.id/register/verify/".$confirmation_code;
        Mail::send('email.verification', ['confirmation_code'=>$conf_code], function($message) use($user)  {
            $message->to($user['email'])
                ->subject('Verify your email address');
        });
        

    }

    /*Artist Register*/
    public function artistRegister(Request $request)
    {
        $role=1;//Role 1 for Artist
        $confirmation_code=$this->random_code();
        $this->validate($request, [
                'username'     => 'required|max:255',
                'band' => 'required',
                'email'    => 'required|email|max:255',
                'password' => 'required'
                
                
            ]);

        /*Assign Register Data to User_location Model*/
        User::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role_id' => $role,
                'confirmation_code' => $confirmation_code
                ]);

        /*Assign Register Data to Artist Model*/
        Artist::create([
            'user_id'=>$this->userid(),//Call function userid()
            'artist_name' => $request['band'],
            'join_date' => Carbon::now('Asia/Jakarta'),
            'status' => 0
            ]);
        $user=array('email'=>$request['email']);
        $conf_code="https://api.gigsit.id/register/verify/".$confirmation_code;
        Mail::send('email.verification', ['confirmation_code'=>$conf_code], function($message) use($user)  {
            $message->to($user['email'])
                ->subject('Verify your email address');
        });
            
    }

    


    /*JWT validation function and JWT decrypter*/
    public function getAuthenticatedUser(Request $user)
    {


    try {

        if (! $user = $this->jwt->parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

        return response()->json(['token_expired'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

        return response()->json(['token_invalid'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

        return response()->json(['token_absent'], $e->getStatusCode());

    }

    // the token is valid and we have found the user via the sub claim
    return response()->json(compact('user'));
    

    }


    /*Get Province Data from Province Model*/
    public function getProvince()
    {
        $province=Province::all();
        return response()->json(compact('province'));

    }

    /*Get City Data from Province Model*/
    public function getCity($id)
    {
        $city=DB::select("select * from mscity where LEFT(city_id,2) like '$id'" );//Raw Query (LEFT)
        return response()->json(compact('city'));

    }

}
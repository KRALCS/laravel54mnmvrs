<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use URL;
use JWTAuth;
use App\User;
use JWTAuthException;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
   
    public function register(Request $request){
        $user = $this->user->create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);
        return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
    }

    public function login(Request $request){
        if(isset($request->token)) {
            $user = JWTAuth::toUser($request->token);
            if($user['exists'] == 1) {
                return redirect('/vechile?token='.$request->token);
            }
        }
        return view('login');
    }

    public function loginPost(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
               return view('login')->with('error', 'Hatalı kullanıcı adı veya parola!');
           }
        } catch (JWTAuthException $e) {
            return view('login')->with('error', 'Kimlik oluşturma başarısız!');
        }
        return redirect('/vechile?token='.$token);
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);
        /*
        foreach (json_decode($user) as $area) {
            echo $area."<br>";
        }
        */
        return response()->json(['result' => $user]);
    }

    public function logout(Request $request) {
        JWTAuth::invalidate($request->token);
        return redirect(URL::to('/'));
    }


}

<?php

namespace App\Http\Controllers\Api_Cotrollers;

use App\Http\Controllers\Controller;
use App\Models\Api_models\Blind;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;


class BlindController extends Controller
{   use GeneralTrait;
     public function __construct()
    {
        $this->middleware('auth:blind_api', ['except' => ['login','register']]);

    }


    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|email|string|unique:blinds|min:12|max:50',
            'phone'=>'required|numeric|digits:11',
            'age'=>'required|numeric|digits:2',
            'hobbies'=>'required|string|max:50',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $blind = Blind::create($input);
        return $this->returnData('blind_data',$blind,"Registration successfully");
    }
    public function login(Request $request){
        $rules = [
            "email"=>"required|exists:blinds,email",
            "password"=>"required"
        ];
        $validator=Validator::make($request->all() , $rules);
        if($validator->fails())
        {
            return $this->returnValidationError($validator);
        }
        if(!$token=\auth()->attempt($validator->validated())){
            return $this->returnError('Ei00',"unauthorized");
        }
        return $this->creatnewToken($token);
    }
    public function creatnewToken($token){
        return $this->returnData('data',[
            'access_token'=>$token,
            'Token_type'=>'bearer',
            "guard"=>$this->guard(),
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
            "USER"=>auth()->user(),

        ],'login successfully');
    }
    public function guard()
    {
        return Auth::guard();
    }
    public function blindProfile(){

          return $this->returnData("user_data",\auth()->user()," data for login user");

    }

    public function logout()
    {
        \auth()->logout();
        return $this->returnSuccessMessage("logout successfully");
    }

}

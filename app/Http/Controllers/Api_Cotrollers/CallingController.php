<?php

namespace App\Http\Controllers\Api_Cotrollers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\CallingResource;
use App\Models\Api_models\Calling;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class CallingController extends Controller
{
   use GeneralTrait;
    public function __construct()
    {
          $this->middleware('auth:blind_api');

      }
    public function addNumber(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'number'=>'required|numeric|digits:11',

        ]);
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }
        $number=new Calling();
        $number->name=$request->name;
        $number->phone_number=$request->number;
        $number->user_id=Auth()->user()->id;
        $number->save();

        return $this->returnSuccessMessage("inserted");


    }
    public function deleteNumber($name){
        $number=Calling::where('name',$name)->where('user_id',Auth()->user()->id)->get();
        if($number==''){
            return $this->returnError('Eoo',"three is no number founded");
        }
        $number->delete();
         return $this-> returnSuccessMessage('phone selected successfully');
    }
    public function getallunm(){
        $number=Calling::where('user_id',Auth()->user()->id)->get();
        if($number==''){
            return $this->returnError('Eoo',"three is no number founded");
        }
        return $this->returnData('phone num',CallingResource::collection($number),'phones selected successfully');



    }
}

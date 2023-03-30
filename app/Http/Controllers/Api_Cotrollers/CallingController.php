<?php

namespace App\Http\Controllers\Api_Cotrollers;

use App\Http\Controllers\Controller;
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
            'name' => 'required|string|max:2',
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
    public function getNumber($name){
        $number=Calling::where('name',$name)->where('user_id',Auth()->user()->id)->get('phone_number');
        if($number==''){
            return $this->returnError('Eoo',"three is no number founded");
        }
         return $this->returnData('phone num',$number,'phone selected successfully');
    }
}

<?php

namespace App\Http\Controllers\Api_Cotrollers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlarmRequest;
use App\Http\Requests\UpdateAlarmRequest;
use App\Models\Api_models\Alarm;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class AlarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use GeneralTrait;
   public function __construct()
    {
       $this->middleware('auth:blind_api', ['except' => ['login','register']]);

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json("kkkkk");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlarmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlarmRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'alarm_date' => 'required|date',
            'alarm_time' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        $alarm = new Alarm();
        $alarm->content = $request->input('content');
        $alarm->alarm_date = $request->input('alarm_date');
        $alarm->alarm_time = $request->input('alarm_time');
        $alarm->user_id=Auth()->user()->id;
        $alarm->save();

        return response()->json(['message' => 'Alarm created successfully', 'data' => $alarm]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function show(Alarm $alarm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function edit(Alarm $alarm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlarmRequest  $request
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlarmRequest $request, Alarm $alarm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alarm $alarm)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\Api_models\Alarm;
use App\Models\Api_models\Blind;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlarmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Blind $blind)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Blind $blind, Alarm $alarm)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Blind $blind)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Blind $blind, Alarm $alarm)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Blind $blind, Alarm $alarm)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Blind $blind, Alarm $alarm)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Api_models\Blind  $blind
     * @param  \App\Models\Api_models\Alarm  $alarm
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Blind $blind, Alarm $alarm)
    {
        //
    }
}

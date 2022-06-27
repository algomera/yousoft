<?php

namespace App\Policies;

use App\Applicant;
use App\Building;
use App\Practice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\DB;


class SuperbonusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function view(User $user, Building $building)
    {
        $applicants = Applicant::where('user_id', auth()->id())->pluck('id');

        $q = DB::table('buildings')
        ->whereIn('practice_id', $applicants)->pluck('practice_id');

        $access = in_array($building->practice_id, $q->toArray());
        //dd($building);
        if($access){
           return Response::allow();
        }
         
        return Response::deny('Accesso negato!');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function update(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function delete(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function restore(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Practice  $practice
     * @return mixed
     */
    public function forceDelete(User $user, Practice $practice)
    {
        //
    }
}

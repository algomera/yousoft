<?php

namespace App\Policies;

use App\ComputoPriceList;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PriceListPolicy
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
	    if ($user->can('access_price_lists')) {
		    return true;
	    }
	    return Response::deny('Non sei autorizzato a visualizzare i prezzari DEI');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ComputoPriceList  $computoPriceList
     * @return mixed
     */
    public function view(User $user, ComputoPriceList $computoPriceList)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
	    if ($user->can('create_price_lists')) {
		    return true;
	    }
	    return Response::deny('Non sei autorizzato a creare i prezzari');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ComputoPriceList  $computoPriceList
     * @return mixed
     */
    public function update(User $user, ComputoPriceList $computoPriceList)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ComputoPriceList  $computoPriceList
     * @return mixed
     */
    public function delete(User $user, ComputoPriceList $computoPriceList)
    {
	    if ($user->can('delete_price_lists')) {
		    // Se Practice appartiene a User
		    if ($computoPriceList->user_id == $user->id) {
			    return true;
		    }
		    // Se User è collegato ad un altro User
		    if (in_array($computoPriceList->user_id, $user->parents->pluck('id')->toArray())) {
			    return true;
		    }
	    }
	    return Response::deny('Non sei autorizzato ad eliminare il prezzario');
    }

	public function upload(User $user, ComputoPriceList $computoPriceList) {
		if ($user->can('upload_price_lists')) {
			// Se Practice appartiene a User
			if ($computoPriceList->user_id == $user->id) {
				return true;
			}
			// Se User è collegato ad un altro User
			if (in_array($computoPriceList->user_id, $user->parents->pluck('id')->toArray())) {
				return true;
			}
		}
		return Response::deny('Non sei autorizzato a caricare file per il prezzario');
	}

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ComputoPriceList  $computoPriceList
     * @return mixed
     */
    public function restore(User $user, ComputoPriceList $computoPriceList)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ComputoPriceList  $computoPriceList
     * @return mixed
     */
    public function forceDelete(User $user, ComputoPriceList $computoPriceList)
    {
        //
    }
}

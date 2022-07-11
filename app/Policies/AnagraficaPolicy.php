<?php

namespace App\Policies;

use App\Anagrafica;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AnagraficaPolicy
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
	    if ($user->can('access_anagrafiche')) {
		    return true;
	    }
	    return Response::deny('Non sei autorizzato a visualizzare le anagrafiche');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anagrafica  $anagrafica
     * @return mixed
     */
    public function view(User $user, Anagrafica $anagrafica)
    {
	    if ($user->can('read_anagrafiche')) {
		    // Se Practice appartiene a User
		    if ($anagrafica->user_id === $user->id) {
			    return true;
		    }
		    // Se User è collegato ad un altro User
		    if (in_array($anagrafica->user_id, $user->parents->pluck('id')->toArray())) {
			    return true;
		    }
	    }
	    return Response::deny('Non puoi accedere a questa anagrafica');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
	    if ($user->can('create_anagrafiche')) {
		    return true;
	    }
	    return Response::deny('Non sei autorizzato a creare le anagrafiche');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anagrafica  $anagrafica
     * @return mixed
     */
    public function update(User $user, Anagrafica $anagrafica)
    {
	    if ($user->can('update_anagrafiche')) {
		    // Se Practice appartiene a User
		    if ($anagrafica->user_id === $user->id) {
			    return true;
		    }
		    // Se User è collegato ad un altro User
		    if (in_array($anagrafica->user_id, $user->parents->pluck('id')->toArray())) {
			    return true;
		    }
	    }
	    return Response::deny('Non sei autorizzato ad aggiornare l\'anagrafica');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anagrafica  $anagrafica
     * @return mixed
     */
    public function delete(User $user, Anagrafica $anagrafica)
    {
	    //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anagrafica  $anagrafica
     * @return mixed
     */
    public function restore(User $user, Anagrafica $anagrafica)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Anagrafica  $anagrafica
     * @return mixed
     */
    public function forceDelete(User $user, Anagrafica $anagrafica)
    {
        //
    }
}

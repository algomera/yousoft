<?php

namespace App\Policies;

use App\ContractualDocument;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ContractualDocumentPolicy
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
	    if ($user->can('access_contractual_documents')) {
		    return true;
	    }
	    return Response::deny('Non sei autorizzato a visualizzare i documenti contrattuali');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContractualDocument  $contractualDocument
     * @return mixed
     */
    public function view(User $user, ContractualDocument $contractualDocument)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContractualDocument  $contractualDocument
     * @return mixed
     */
    public function update(User $user, ContractualDocument $contractualDocument)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContractualDocument  $contractualDocument
     * @return mixed
     */
    public function delete(User $user, ContractualDocument $contractualDocument)
    {
	    if ($user->can('delete_contractual_documents')) {
		    // Se Practice appartiene a User
		    if ($contractualDocument->user_id === $user->id) {
			    return true;
		    }
		    // Se User è collegato ad un altro User
		    if (in_array($contractualDocument->user_id, $user->parents->pluck('id')->toArray())) {
			    return true;
		    }
	    }
	    return Response::deny('Non sei autorizzato a caricare documenti contrattuali');
    }

	public function upload(User $user, ContractualDocument $contractualDocument) {
		if ($user->can('upload_contractual_documents')) {
			// Se Practice appartiene a User
			if ($contractualDocument->user_id === $user->id) {
				return true;
			}
			// Se User è collegato ad un altro User
			if (in_array($contractualDocument->user_id, $user->parents->pluck('id')->toArray())) {
				return true;
			}
		}
		return Response::deny('Non sei autorizzato a caricare documenti contrattuali');
	}

	public function download(User $user, ContractualDocument $contractualDocument) {
		if ($user->can('download_contractual_documents')) {
			// Se Practice appartiene a User
			if ($contractualDocument->user_id === $user->id) {
				return true;
			}
			// Se User è collegato ad un altro User
			if (in_array($contractualDocument->user_id, $user->parents->pluck('id')->toArray())) {
				return true;
			}
		}
		return Response::deny('Non sei autorizzato a caricare documenti contrattuali');
	}

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContractualDocument  $contractualDocument
     * @return mixed
     */
    public function restore(User $user, ContractualDocument $contractualDocument)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ContractualDocument  $contractualDocument
     * @return mixed
     */
    public function forceDelete(User $user, ContractualDocument $contractualDocument)
    {
        //
    }
}

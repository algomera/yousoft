<?php

	namespace App\Policies;

	use App\Folder;
	use App\User;
	use Illuminate\Auth\Access\HandlesAuthorization;
	use Illuminate\Auth\Access\Response;

	class FolderManagementPolicy
	{
		use HandlesAuthorization;

		/**
		 * Determine whether the user can view any models.
		 *
		 * @param \App\User $user
		 * @return mixed
		 */
		public function viewAny(User $user) {
			if ($user->can('access_folders')) {
				return true;
			}
			return Response::deny('Non sei autorizzato a gestire file e cartelle');
		}

		/**
		 * Determine whether the user can view the model.
		 *
		 * @param \App\User $user
		 * @param \App\Folder $folder
		 * @return mixed
		 */
		public function view(User $user, Folder $folder) {
			if ($user->can('read_folders')) {
				// Se Practice appartiene a User
				if ($folder->user_id == $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($folder->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non puoi accedere a questa cartella');
		}

		/**
		 * Determine whether the user can create models.
		 *
		 * @param \App\User $user
		 * @return mixed
		 */
		public function create(User $user) {
			if ($user->can('create_folders')) {
				return true;
			}
			return Response::deny('Non sei autorizzato a creare le cartelle');
		}

		/**
		 * Determine whether the user can update the model.
		 *
		 * @param \App\User $user
		 * @param \App\Folder $folder
		 * @return mixed
		 */
		public function update(User $user, Folder $folder) {
			if ($user->can('update_folders')) {
				// Se Practice appartiene a User
				if ($folder->user_id == $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($folder->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad aggiornare la cartella');
		}

		/**
		 * Determine whether the user can delete the model.
		 *
		 * @param \App\User $user
		 * @param \App\Folder $folder
		 * @return mixed
		 */
		public function delete(User $user, Folder $folder) {
			if ($user->can('delete_folders')) {
				// Se Practice appartiene a User
				if ($folder->user_id == $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($folder->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad eliminare la cartella');
		}

		/**
		 * Determine whether the user can upload the model
		 *
		 * @param User $user
		 * @param Folder $folder
		 * @return bool|Response
		 */
		public function uploadFiles(User $user, Folder $folder) {
			if ($user->can('upload_folder_files')) {
				// Se Practice appartiene a User
				if ($folder->user_id == $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($folder->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad aggiungere files la cartella');
		}

		/**
		 * Determine whether the user can download the model
		 *
		 * @param User $user
		 * @param Folder $folder
		 * @return bool|Response
		 */
		public function downloadFiles(User $user, Folder $folder) {
			if ($user->can('download_folder_files')) {
				// Se Practice appartiene a User
				if ($folder->user_id == $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($folder->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a scaricare il file dalla cartella');
		}

		/**
		 * Determine whether the user can delete the model
		 *
		 * @param User $user
		 * @param Folder $folder
		 * @return bool|Response
		 */
		public function deleteFiles(User $user, Folder $folder) {
			if ($user->can('delete_folder_files')) {
				// Se Practice appartiene a User
				if ($folder->user_id == $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($folder->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad eliminare il file dalla cartella');
		}

		/**
		 * Determine whether the user can restore the model.
		 *
		 * @param \App\User $user
		 * @param \App\Folder $folder
		 * @return mixed
		 */
		public function restore(User $user, Folder $folder) {
			//
		}

		/**
		 * Determine whether the user can permanently delete the model.
		 *
		 * @param \App\User $user
		 * @param \App\Folder $folder
		 * @return mixed
		 */
		public function forceDelete(User $user, Folder $folder) {
			//
		}
	}

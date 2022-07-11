<?php

	namespace App\Policies;

	use App\Practice;
	use App\User;
	use Illuminate\Auth\Access\HandlesAuthorization;
	use Illuminate\Auth\Access\Response;

	class PracticePolicy
	{
		use HandlesAuthorization;

		/**
		 * Determine whether the user can view any models.
		 *
		 * @param \App\User $user
		 * @return mixed
		 */
		public function viewAny(User $user) {
			//
		}

		/**
		 * Determine whether the user can view the model.
		 *
		 * @param \App\User $user
		 * @param \App\Practice $practice
		 * @return mixed
		 */
		public function view(User $user, Practice $practice) {
			// Se Practice appartiene a User
			if ($practice->user_id === $user->id) {
				return true;
			}
			// Se User è collegato ad un altro User
			if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
				return true;
			}
			return Response::deny('Non puoi accedere a questa pratica');
		}

		/**
		 * Determine whether the user can create models.
		 *
		 * @param \App\User $user
		 * @return mixed
		 */
		public function create(User $user) {
			//
		}

		/**
		 * Determine whether the user can update the model.
		 *
		 * @param \App\User $user
		 * @param \App\Practice $practice
		 * @return mixed
		 */
		public function update(User $user, Practice $practice) {
			//
		}

		/**
		 * Determine whether the user can delete the model.
		 *
		 * @param \App\User $user
		 * @param \App\Practice $practice
		 * @return mixed
		 */
		public function delete(User $user, Practice $practice) {
			//
		}

		/**
		 * Determine whether the user can restore the model.
		 *
		 * @param \App\User $user
		 * @param \App\Practice $practice
		 * @return mixed
		 */
		public function restore(User $user, Practice $practice) {
			//
		}

		/**
		 * Determine whether the user can permanently delete the model.
		 *
		 * @param \App\User $user
		 * @param \App\Practice $practice
		 * @return mixed
		 */
		public function forceDelete(User $user, Practice $practice) {
			//
		}
	}

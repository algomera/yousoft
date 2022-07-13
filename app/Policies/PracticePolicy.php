<?php

	namespace App\Policies;

	use App\Practice;
	use App\User;
	use Illuminate\Auth\Access\HandlesAuthorization;
	use Illuminate\Auth\Access\Response;

	class PracticePolicy
	{
		use HandlesAuthorization;

		/** Practices */
		public function viewAny(User $user) {
			if ($user->can('access_practices')) {
				return true;
			}
			return Response::deny('Non sei autorizzato a visualizzare le pratiche');
		}

		public function view(User $user, Practice $practice) {
			if ($user->can('read_practices')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non puoi accedere a questa pratica');
		}

		public function create(User $user) {
			if ($user->can('create_practices')) {
				return true;
			}
			return Response::deny('Non sei autorizzato a creare le pratiche');
		}

		public function update(User $user, Practice $practice) {
			if ($user->can('update_practices')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad aggiornare la pratica');
		}

		public function delete(User $user, Practice $practice) {
			if ($user->can('delete_practices')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad eliminare la pratica');
		}

		/** Practices - Computo */
		public function createComputo(User $user, Practice $practice) {
			if ($user->can('create_computo')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a creare il computo metrico');
		}

		public function downloadComputo(User $user, Practice $practice) {
			if ($user->can('download_computo')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a scaricare il computo metrico');
		}

		/** Practices - Tabs */
		/** Applicant */
		//
		/** Practice */
		//
		/** Subject */
		//
		/** Building */
		public function createCondomini(User $user, Practice $practice) {
			if ($user->can('create_condomini')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a create dei condomini');
		}

		public function importCondominiExcel(User $user, Practice $practice) {
			if ($user->can('import_condomini_excel')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad importare la lista dei condomini');
		}

		public function exportCondominiExcel(User $user, Practice $practice) {
			if ($user->can('export_condomini_excel')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad esportare la lista dei condomini');
		}

		public function downloadCondominiExcel(User $user, Practice $practice) {
			if ($user->can('download_condomini_excel')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a scaricare la lista dei condomini');
		}

		public function deleteCondominiExcel(User $user, Practice $practice) {
			if ($user->can('delete_condomini_excel')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a cancellare la lista dei condomini');
		}
		/** Media */
		//
		/** Documents */
		public function viewRequiredDocumentsFolder(User $user, Practice $practice) {
			if ($user->can('view_required_documents_folder')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad visualizzare il contenuto della cartella');
		}
		public function uploadRequiredDocumentsFile(User $user, Practice $practice) {
			if ($user->can('upload_required_documents_file')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad aggiungere files alla cartella');
		}
		public function downloadRequiredDocumentsFile(User $user, Practice $practice) {
			if ($user->can('download_required_documents_file')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato a scaricare il file');
		}
		public function deleteRequiredDocumentsFile(User $user, Practice $practice) {
			if ($user->can('delete_required_documents_file')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad eliminare il file');
		}
		public function approveRequiredDocumentsFolder(User $user, Practice $practice) {
			if ($user->can('approve_required_documents_folder')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad approvare la cartella');
		}
		public function disapproveRequiredDocumentsFolder(User $user, Practice $practice) {
			if ($user->can('disapprove_required_documents_folder')) {
				// Se Practice appartiene a User
				if ($practice->user_id === $user->id) {
					return true;
				}
				// Se User è collegato ad un altro User
				if (in_array($practice->user_id, $user->parents->pluck('id')->toArray())) {
					return true;
				}
			}
			return Response::deny('Non sei autorizzato ad disapprovare la cartella');
		}
		/** Superbonus */
		//
		/** Contracts */
		//
		/** Policies */
		//
	}

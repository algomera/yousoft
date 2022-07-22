<?php

	namespace App\Http\Livewire\Users;

	use App\Helpers\ContractualDocuments;
	use App\User;
	use App\UserData;
	use LivewireUI\Modal\ModalComponent;
	use Spatie\Permission\Models\Role;
	use App\Notifications\CredentialEmailNotification;

	class Create extends ModalComponent
	{
		public $role;
		public $name;
		public $email;
		public $password;
		public $password_confirmation;
		public $showParents = false;
		public $selectedParents = [];
		public $parents = [];

		protected function rules() {
			return [
				'role'                  => 'required|string',
				'name'                  => 'required|string',
				'email'                 => 'required|email:rfc,dns|unique:users,email',
				'password'              => 'required|string|min:8|confirmed',
				'password_confirmation' => 'required|same:password',
				'selectedParents'       => in_array($this->role, [
					'collaborator',
					'consultant',
					'technical_asseverator',
					'fiscal_asseverator'
				]) ? 'required' : 'nullable',
			];
		}

		protected $validationAttributes = [
			'role'                  => 'Tipologia Profilo',
			'nome'                  => 'Nome',
			'email'                 => 'Email',
			'password'              => 'Password',
			'password_confirmation' => 'Conferma Password'
		];

		public function updatingRole($value) {
			$this->parents = [];
			if (config('users_matrioska.' . $value)) {
				$p = config('users_matrioska.' . $value);
				if (in_array(auth()->user()->role->name, array_keys($p))) {
					$this->showParents = false;
					$this->selectedParents = auth()->user()->id;
				} else {
					foreach ($p as $k => $name) {
						$this->parents[$name] = User::role($k)->get();
					}
					if (config('users_matrioska.' . $value)) {
						$this->showParents = true;
					} else {
						$this->showParents = false;
						$this->selectedParents = [];
					}
				}
			} else {
				$this->showParents = false;
				$this->selectedParents = [];
			}
		}

		public function save() {
			$validated = $this->validate();
			// Creazione User
			$user = User::create([
				'email'    => $validated['email'],
				'password' => bcrypt($validated['password'])
			]);
			// Creazione UserData
			UserData::create([
				'user_id'    => $user->id,
				'created_by' => auth()->user()->id,
				'name'       => $validated['name'],
			]);
			// Assegnazione ruolo
			$role = Role::findByName($validated['role']);
			$user->assignRole($role);
			if ($user->role->name === 'business') {
				ContractualDocuments::createInitialContractualDocuments($user->id);
			}
			// TODO: Assegnazione eventuali permessi
			// Assegnazione User/Parents
			$user->parents()->sync($this->selectedParents);
			$this->closeModal();
			$this->emitTo('users.index', 'user-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Creato'),
				'subtitle' => __('L\'utente è stato creato con successo!')
			]);
			if (app()->isProduction()) {
				$user->notify(new CredentialEmailNotification($user, $this->password));
			}
		}

		public function render() {
			return view('livewire.users.create');
		}
	}

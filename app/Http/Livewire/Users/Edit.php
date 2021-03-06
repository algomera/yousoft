<?php

	namespace App\Http\Livewire\Users;

	use App\User;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		use AuthorizesRequests;
		public $user_id;
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
				'email'                 => 'required|email:rfc,dns|unique:users,email,' . $this->user_id,
				'password'              => 'sometimes|nullable|min:8|confirmed',
				'password_confirmation' => 'sometimes|same:password',
				'selectedParents'      => in_array($this->role, [
					'collaborator',
					'consultant',
					'technical_asseverator',
					'fiscal_asseverator'
				]) ? 'required' : 'nullable',
			];
		}

		protected $validationAttributes = [
			'role' => 'Tipologia Profilo',
			'nome' => 'Nome',
			'email' => 'Email',
			'password' => 'Password',
			'password_confirmation' => 'Conferma Password'
		];

		public function mount(User $user) {
			$this->authorize('update', $user);
			$this->user_id = $user->id;
			$this->role = $user->role->name;
			$this->name = $user->name;
			$this->email = $user->email;
			foreach ($user->parents as $parent) {
				$this->selectedParents[] = $parent->id;
			}
			if (config('users_matrioska.' . $user->role->name)) {
				$p = config('users_matrioska.' . $user->role->name);
				foreach ($p as $k => $name) {
					$this->parents[$name] = User::role($k)->get();
				}
				if (config('users_matrioska.' . $user->role->name) && auth()->user()->isAdmin()) {
					$this->showParents = true;
				} else {
					$this->showParents = false;
					$this->selectedParents[] = auth()->user()->id;
				}
			}
		}

		public function updatingRole($value) {
			$this->selectedParents = [];
			$this->parents = [];
			if (config('users_matrioska.' . $value)) {
				$p = config('users_matrioska.' . $value);
				foreach ($p as $k => $name) {
					$this->parents[$name] = User::role($k)->get();
				}
				if (config('users_matrioska.' . $value)) {
					$this->showParents = true;
				} else {
					$this->showParents = false;
					$this->selectedParents = [];
				}
			} else {
				$this->showParents = false;
				$this->selectedParents = [];
			}
		}

		public function save() {
			$user = User::find($this->user_id);
			$this->authorize('update', $user);
			$validated = $this->validate();
			$user->update([
				'email'    => $validated['email'],
				'password' => $validated['password'] ? bcrypt($validated['password']) : $user->getAuthPassword()
			]);
			$user->user_data()->update(['name' => $validated['name']]);
			if ($user->role->name !== $validated['role']) {
				$user->removeRole($user->role->name);
				$user->assignRole($validated['role']);
			}
			$user->parents()->sync($this->selectedParents);
			$this->closeModal();
			$this->emitTo('users.index', 'user-updated');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Aggiornato'),
				'subtitle' => __('L\'utente ?? stato aggiornato con successo!')
			]);
		}

		public function render() {
			return view('livewire.users.edit');
		}
	}

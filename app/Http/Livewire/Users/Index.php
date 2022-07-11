<?php

	namespace App\Http\Livewire\Users;

	use App\User;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Index extends Component
	{
		use AuthorizesRequests;
		public $users;
		public $business;
		public $search = '';
		protected $listeners = [
			'user-added'   => '$refresh',
			'user-updated' => '$refresh',
			'user-deleted' => '$refresh',
		];

		public function mount() {
			$this->authorize('viewAny', User::class);
		}

		public function deleteUser($id) {
			$user = User::find($id);
			$this->authorize('delete', $user);
			$user->delete();
			$this->dispatchBrowserEvent('close-modal');
			$this->emitSelf('user-deleted');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Eliminato'),
				'subtitle' => __('L\'utente è stato eliminato con successo!')
			]);
		}

		public function render() {
			if (auth()->user()->isAdmin()) {
				$this->users = User::SearchParent('name', $this->search)->get();
			} else {
				$this->users = User::withAssociated()->get();
			}
			return view('livewire.users.index');
		}
	}

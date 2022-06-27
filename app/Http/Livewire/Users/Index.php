<?php

	namespace App\Http\Livewire\Users;

	use App\User;
	use Livewire\Component;

	class Index extends Component
	{
		public $users;
		public $business;
		protected $listeners = [
			'user-added'   => '$refresh',
			'user-updated' => '$refresh',
			'user-deleted' => '$refresh',
		];

		public function deleteUser($id) {
			User::destroy($id);

			$this->dispatchBrowserEvent('close-modal');
			$this->emitSelf('user-deleted');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Eliminato'),
				'subtitle' => __('L\'utente è stato eliminato con successo!')
			]);
		}

		public function render() {
			if (auth()->user()->isAdmin()) {
				$this->users = User::all();
			} else {
				$this->users = User::withAssociated()->get();
			}
			$this->business = User::role('business')->get();
			return view('livewire.users.index');
		}
	}

<?php

	namespace App\Http\Livewire;

	use Livewire\Component;

	class Navigation extends Component
	{
		public function render() {
			return view('livewire.navigation', [
				'routes' => $this->registerRoutes()
			]);
		}

		public function registerRoutes() {
			return [
				[
					'name'   => 'Home',
					'url'    => route('dashboard'),
					'active' => $this->isActiveRoute('dashboard'),
					'icon'   => 'home',
				],
				[
					'name'       => 'Anagrafiche',
					'url'        => route('anagrafiche.index'),
					'active'     => $this->isActiveRoute('anagrafiche*'),
					'icon'       => 'users',
					'permission' => 'access_anagrafiche'
				],
				[
					'name'       => 'Gestione Accessi',
					'url'        => route('users.index'),
					'active'     => $this->isActiveRoute('users*'),
					'icon'       => 'lock-open',
					'permission' => 'access_users'
				],
				[
					'name'       => 'Pratiche',
					'url'        => route('practice.index'),
					'active'     => $this->isActiveRoute('practice*'),
					'icon'       => 'collection',
					'permission' => 'access_practices'
				],
				[
					'name'       => 'Calendario',
					'url'        => route('calendar.index'),
					'active'     => $this->isActiveRoute('calendar*'),
					'icon'       => 'calendar',
					'permission' => 'access_calendar'
				],
				[
					'name'       => 'Gestione File/Cartelle',
					'url'        => route('folder-file-management.index'),
					'active'     => $this->isActiveRoute('folder-file-management*'),
					'icon'       => 'folder',
					'permission' => 'access_folders'
				],
				[
					'name'       => 'Documenti Contrattuali',
					'url'        => route('contractual_documents.index'),
					'active'     => $this->isActiveRoute('contractual_documents*'),
					'icon'       => 'document-text',
					'permission' => 'access_contractual_documents'
				],
				[
					'name'       => 'Prezzari DEI',
					'url'        => route('price_list.index'),
					'active'     => $this->isActiveRoute('price_list*'),
					'icon'       => 'clipboard-list',
					'permission' => 'access_price_lists'
				],
				[
					'name'       => 'Chat',
					'url'        => route('chat'),
					'active'     => $this->isActiveRoute('price_list*'),
					'icon'       => 'chat',
					'permission' => 'access_chat'
				],
			];
		}

		private function isActiveRoute(string $string) {
			return request()->routeIs($string);
		}
	}

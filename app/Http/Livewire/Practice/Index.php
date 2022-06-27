<?php

	namespace App\Http\Livewire\Practice;

	use App\Helpers\Contracts;
	use App\Helpers\folder_documents;
	use App\Helpers\Policies;
	use App\Practice;
	use Illuminate\Http\Request;
	use Livewire\Component;

	class Index extends Component
	{
		public $practices;
		protected $listeners = [
			'practice-deleted' => '$refresh',
		];

		public function mount(Request $request) {
			if (auth()->user()->isAdmin()) {
				$q = Practice::query();
			} else {
				$q = Practice::withParents();
			}
			if ($request->get('practical_month') !== null) {
				$q->whereMonth('created_at', '=', $request->get('practical_month'));
			}
			if ($request->get('practical_phase') !== null) {
				$q->where('practical_phase', '=', $request->get('practical_phase'));
			}
			if ($request->get('practical_description') !== null) {
				$q->where('description', 'LIKE', '%' . $request->get('practical_description') . '%');
			}
			if ($request->get('practical_number') !== null) {
				$q->where('id', '=', $request->get('practical_number'));
			}
			$this->practices = $q->get();
		}

		public function createPractice() {
			// Create new Applicant related by User
			$applicant = auth()->user()->applicant()->create();
			// Create new Practice
			$practice = Practice::create([
				'applicant_id' => $applicant->id,
				'user_id'      => auth()->user()->id
			]);
			// Create all models related by Practice
			$practice->subject()->create();
			$practice->building()->create();
			$practice->data_project()->create();
			$practice->driving_intervention()->create();
			$practice->towed_intervention()->create([
				'is_common' => true
			]);
			$practice->final_state()->create();
			$practice->variant()->create();
			// Create Folder Document
			folder_documents::addFolders($practice->id);
			// Create Contracts
			Contracts::createInitialContracts($practice->id);
			// Create Policies
			Policies::createInitialPolicies($practice->id);
			return redirect()->route('practice.edit', $practice);
		}

		public function deletePractice($id) {
			Practice::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Pratica Eliminata'),
				'subtitle' => __('La pratica è stata eliminata con successo!')
			]);
			$this->emit('practice-deleted');
		}

		public function render() {
			return view('livewire.practice.index');
		}
	}

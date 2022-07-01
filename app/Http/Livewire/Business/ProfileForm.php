<?php

	namespace App\Http\Livewire\Business;

	use App\UserData;
	use Livewire\Component;

	class ProfileForm extends Component
	{
		public $type;
		public $p_iva;
		public $c_f;
		public $legal_form;
		public $rea;
		public $c_ateco;
		public $reg_date;
		protected $rules = [
			'type'       => 'nullable|string',
			'p_iva'      => 'nullable|string|min:11|max:11',
			'c_f'        => 'nullable|string|min:16|max:16',
			'legal_form' => 'nullable|string',
			'rea'        => 'nullable|string',
			'c_ateco'    => 'nullable|string',
			'reg_date'   => 'nullable|string',
		];
		protected $validationAttributes = [
			'type'       => 'Ragione Sociale',
			'p_iva'      => 'Partita IVA',
			'c_f'        => 'Codice Fiscale',
			'legal_form' => 'Forma legale',
			'rea'        => 'CCIAA + REA',
			'c_ateco'    => 'Codice Ateco',
			'reg_date'   => 'Data registrazione',
		];

		public function mount() {
			$this->type = auth()->user()->user_data->type;
			$this->p_iva = auth()->user()->user_data->p_iva;
			$this->c_f = auth()->user()->user_data->c_f;
			$this->legal_form = auth()->user()->user_data->legal_form;
			$this->rea = auth()->user()->user_data->rea;
			$this->c_ateco = auth()->user()->user_data->c_ateco;
			$this->reg_date = auth()->user()->user_data->reg_date;
		}

		public function save() {
			$validated = $this->validate();
			$business = UserData::where('user_id', auth()->user()->id)->first();
			$validated['c_f'] = strtoupper($validated['c_f']);
			$business->update($validated);
			return redirect()->route('dashboard');
		}

		public function render() {
			return view('livewire.business.profile-form');
		}
	}

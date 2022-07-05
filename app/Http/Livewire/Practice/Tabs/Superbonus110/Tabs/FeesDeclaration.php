<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice;
	use Livewire\Component;

	class FeesDeclaration extends Component
	{
		public $practice;
		public $fees_declarations;
		protected $rules = [
			'fees_declarations.ecobonus_driving_cost'           => 'nullable|numeric',
			'fees_declarations.ecobonus_driving_cost_sal_1'     => 'nullable|numeric',
			'fees_declarations.ecobonus_driving_cost_sal_2'     => 'nullable|numeric',
			'fees_declarations.ecobonus_driving_cost_sal_f'     => 'nullable|numeric',
			'fees_declarations.ecobonus_driving_cost_sal_1_2'   => 'nullable|numeric',
			'fees_declarations.ecobonus_driving_cost_sal_1_2_f' => 'nullable|numeric',
			'fees_declarations.ecobonus_towed_cost'             => 'nullable|numeric',
			'fees_declarations.ecobonus_towed_cost_sal_1'       => 'nullable|numeric',
			'fees_declarations.ecobonus_towed_cost_sal_2'       => 'nullable|numeric',
			'fees_declarations.ecobonus_towed_cost_sal_f'       => 'nullable|numeric',
			'fees_declarations.ecobonus_towed_cost_sal_1_2'     => 'nullable|numeric',
			'fees_declarations.ecobonus_towed_cost_sal_1_2_f'   => 'nullable|numeric',
			'fees_declarations.ecobonus_project_cost'           => 'nullable|numeric',
			'fees_declarations.ecobonus_realized_sal_1'         => 'nullable|numeric',
			'fees_declarations.ecobonus_realized_sal_2'         => 'nullable|numeric',
			'fees_declarations.ecobonus_realized_sal_f'         => 'nullable|numeric',
			'fees_declarations.ecobonus_realized_sal_1_2'       => 'nullable|numeric',
			'fees_declarations.ecobonus_realized_sal_1_2_f'     => 'nullable|numeric',
			'fees_declarations.sismabonus_project_cost'         => 'nullable|numeric',
			'fees_declarations.sismabonus_realized_sal_1'       => 'nullable|numeric',
			'fees_declarations.sismabonus_realized_sal_2'       => 'nullable|numeric',
			'fees_declarations.sismabonus_realized_sal_f'       => 'nullable|numeric',
			'fees_declarations.sismabonus_realized_sal_1_2'     => 'nullable|numeric',
			'fees_declarations.sismabonus_realized_sal_1_2_f'   => 'nullable|numeric',
			'fees_declarations.national_contract'   => 'nullable|string',
		];

		public function mount(Practice $practice) {
			$this->practice = $practice;
			$this->fees_declarations = $practice->fees_declarations;
		}

		public function save() {
			$this->validate();
			$this->fees_declarations->update();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dati aggiornati con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.show', 'change-tab', 'variants');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.fees-declaration');
		}
	}

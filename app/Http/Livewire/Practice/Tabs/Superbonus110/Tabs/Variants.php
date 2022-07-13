<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Variants extends Component
	{
		use AuthorizesRequests;
		public $practice;
		public $variant;
		protected $rules = [
			'variant.sal_2_request_variant'       => 'nullable|boolean',
			'variant.sal_2_technical_relation'    => 'nullable|boolean',
			'variant.sal_2_common'                => 'nullable|string',
			'variant.sal_2_province'              => 'nullable|string',
			'variant.sal_2_date'                  => 'nullable|string',
			'variant.sal_2_protocol_number'       => 'nullable|string',
			'variant.sal_2_APE_post_conventional' => 'nullable|boolean',
			'variant.sal_2_superbonus_variations' => 'nullable|boolean',
			'variant.sal_2_driving_interventions' => 'nullable|string',
			'variant.sal_2_towed_interventions'   => 'nullable|string',
			'variant.sal_2_computo_metrico'       => 'nullable|string',
			'variant.sal_2_approved_variant'      => 'nullable|boolean',
			'variant.sal_f_request_variant'       => 'nullable|boolean',
			'variant.sal_f_technical_relation'    => 'nullable|boolean',
			'variant.sal_f_common'                => 'nullable|string',
			'variant.sal_f_province'              => 'nullable|string',
			'variant.sal_f_date'                  => 'nullable|string',
			'variant.sal_f_protocol_number'       => 'nullable|string',
			'variant.sal_f_APE_post_conventional' => 'nullable|boolean',
			'variant.sal_f_superbonus_variations' => 'nullable|boolean',
			'variant.sal_f_driving_interventions' => 'nullable|string',
			'variant.sal_f_towed_interventions'   => 'nullable|string',
			'variant.sal_f_computo_metrico'       => 'nullable|string',
			'variant.sal_f_approved_variant'      => 'nullable|boolean',
		];

		public function mount(Practice $practice) {
			$this->practice = $practice;
			$this->variant = $practice->variant;
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$this->validate();
			$this->variant->update();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dati aggiornati con successo!')
			]);
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.variants');
		}
	}

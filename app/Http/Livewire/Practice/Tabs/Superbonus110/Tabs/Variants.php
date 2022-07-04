<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice;
	use Livewire\Component;

	class Variants extends Component
	{
		public $practice;
		public $variant;
//		public $sal_2_request_variant;
//		public $sal_2_technical_relation;
//		public $sal_2_common;
//		public $sal_2_province;
//		public $sal_2_date;
//		public $sal_2_protocol_number;
//		public $sal_2_APE_post_conventional;
//		public $sal_2_superbonus_variations;
//		public $sal_2_driving_interventions;
//		public $sal_2_towed_interventions;
//		public $sal_2_computo_metrico;
//		public $sal_2_approved_variant;
//		public $sal_f_request_variant;
//		public $sal_f_technical_relation;
//		public $sal_f_common;
//		public $sal_f_province;
//		public $sal_f_date;
//		public $sal_f_protocol_number;
//		public $sal_f_APE_post_conventional;
//		public $sal_f_superbonus_variations;
//		public $sal_f_driving_interventions;
//		public $sal_f_towed_interventions;
//		public $sal_f_computo_metrico;
//		public $sal_f_approved_variant;
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

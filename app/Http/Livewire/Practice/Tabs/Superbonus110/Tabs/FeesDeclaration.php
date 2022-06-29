<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use Livewire\Component;

	class FeesDeclaration extends Component
	{
		public function save() {
			$this->emitTo('practice.tabs.superbonus110.show', 'change-tab', 'variants');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.fees-declaration');
		}
	}

<x-card class="space-y-1 h-full">
	<livewire:practice.modals.computo.tabs.computo.intervention :selectedIntervention="$selectedIntervention" :practice_id="$practice_id"/>
	<livewire:practice.modals.computo.tabs.computo.price-list :selectedIntervention="$selectedIntervention" :practice_id="$practice_id"/>
</x-card>
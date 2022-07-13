<div>
	<div class="flex flex-col items-start">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>ST. Collettori solari</span>
			@can('update', $practice)
				<x-button
						wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-solar-panel', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
						type="button" size="sm">
					<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
				</x-button>
			@endcan
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($solar_panels as $i => $solar_panel)
				<li class="py-4 flex">
					<div class="flex flex-col items-center space-y-3">
						<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full flex-shrink-0">
							{{ $i + 1 }}
						</div>
						<x-modal>
							<x-slot name="trigger">
								<div class="text-red-600 hover:text-red-900">
									<x-icon name="trash" class="w-5 h-5"></x-icon>
								</div>
							</x-slot>
							<x-slot name="title">
								Conferma eliminazione
							</x-slot>
							Sei sicuro di voler eliminare l'intervento?
							<x-slot name="footer">
								<x-link-button x-on:click="open = false">Annulla</x-link-button>
								<x-danger-button type="button" class="ml-2"
								                 wire:click="deleteSolarPanel({{ $solar_panel->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($solar_panel->sup_lorda_singolo_modulo)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sup. lorda singolo modulo:</span>
									<span>{{ $solar_panel->sup_lorda_singolo_modulo }} m²</span>
								</p>
							@endisset
							@isset($solar_panel->num_moduli)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">N° di moduli:</span>
									<span>{{ $solar_panel->num_moduli }}</span>
								</p>
							@endisset
							@isset($solar_panel->sup_totale)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sup. totale:</span>
									<span>{{ $solar_panel->sup_totale }} m²</span>
								</p>
							@endisset
							@isset($solar_panel->tipo_di_collettori)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di collettori:</span>
									<span>{{ $solar_panel->tipo_di_collettori }}</span>
								</p>
							@endisset
							@isset($solar_panel->tipo_di_installazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di installazione:</span>
									<span>{{ $solar_panel->tipo_di_installazione }}</span>
								</p>
							@endisset
							@isset($solar_panel->inclinazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Inclinazione:</span>
									<span>{{ $solar_panel->inclinazione }} %</span>
								</p>
							@endisset
							@isset($solar_panel->orientamento)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Orientamento:</span>
									<span>{{ $solar_panel->orientamento }}</span>
								</p>
							@endisset
							@isset($solar_panel->q_col_q_sol)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Q col/Q sol:</span>
									<span>{{ $solar_panel->q_col_q_sol }} kWht</span>
								</p>
							@endisset
							@isset($solar_panel->ql)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">QL:</span>
									<span>{{ $solar_panel->ql }} MJ</span>
								</p>
							@endisset
							@isset($solar_panel->accumulo_in_litri)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Accumulo</span>
									<span>{{ $solar_panel->accumulo_in_litri }} L</span>
								</p>
							@endisset
							@isset($solar_panel->destinazione_calore)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Destinazione calore:</span>
									<span>{{ $solar_panel->destinazione_calore }}</span>
								</p>
							@endisset
							@isset($solar_panel->tipo_impianto_integrato_o_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo impianto integrato o sostituito:</span>
									<span>{{ $solar_panel->tipo_impianto_integrato_o_sostituito }}</span>
								</p>
							@endisset
							@isset($solar_panel->certificazione_solar_keymark)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Cart. Solar Keymark:</span>
									<span>{{ $solar_panel->certificazione_solar_keymark ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($solar_panel->impianto_factory_made)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Impianto Factory Made:</span>
									<span>{{ $solar_panel->impianto_factory_made }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun collettore inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>
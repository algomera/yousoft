@props(['vertwall', 'practice', 'items', 'condomino', 'isCommon'])

<div>
    <div class="mt-5">
        <div class="d-flex align-items-center mb-3">
            <label for="biome_generator" class="checkbox-wrapper d-flex align-items-center mb-0">
                <input type="checkbox" name="biome_generator" id="biome_generator" value="true" {{$vertwall->biome_generator == 'true' ? 'checked' : ''}}>
                <span class="checkmark"></span>
                <span class="black" ><b>IB. Generatori a biomamassa</b></span>
            </label>
            <div class="add-btn-custom" onclick="addBiomeGenerator(event)">+</div>
            @if($items->count() > 0)
                <span><strong>(Inserite: {{ $items->count() }})</strong></span>
            @endif
        </div>
        <p class="font-italic">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
        <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
            <div id="biome_generator_wrapper">
                @forelse($items as $i => $item)
                    <div class="box_input" data-id="biome_generator-{{$practice->id}}-{{$item->id}}">
                        {{ $i + 1 }}
                        <div class="row_input">
                            <input type="hidden" name="biome_generators[{{$practice->id}}-{{$item->id}}][is_common]" id="biome_generators[{{$practice->id}}-{{$item->id}}][is_common]" value="{{ $isCommon }}">
                            <input type="hidden" name="biome_generators[{{$practice->id}}-{{$item->id}}][condomino_id]" id="biome_generators[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                            <label for="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                                Tipo sostituito
                                <select name="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_sostituito]" id="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                                    <option {{ $item->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                    <option {{ $item->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                    <option {{ $item->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                    <option {{ $item->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                    <option {{ $item->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                    <option {{ $item->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                    <option {{ $item->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                    <option {{ $item->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                    <option {{ $item->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                </select>
                            </label>
                            <label for="biome_generators[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]">
                                P. nom. sostituito
                                <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" id="biome_generators[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" value="{{ $item->p_nom_sostituito }}">
                                kW
                            </label>
                            <label for="biome_generators[{{$practice->id}}-{{$item->id}}][classe_generatore]">
                                Classe generatore
                                <select name="biome_generators[{{$practice->id}}-{{$item->id}}][classe_generatore]" id="biome_generators[{{$practice->id}}-{{$item->id}}][classe_generatore]">
                                    <option {{ $item->classe_generatore === '4 stelle' ? 'selected' : ''}} value="4 stelle">4 stelle</option>
                                    <option {{ $item->classe_generatore === '5 stelle' ? 'selected' : ''}} value="5 stelle">5 stelle</option>
                                </select>
                            </label>
                        </div>
                        <div class="row_input">
                            <label for="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_generatore]">
                                Tipo generatore
                                <select name="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_generatore]" id="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_generatore]">
                                    <option {{ $item->tipo_generatore === 'Caldaia a biomassa' ? 'selected' : ''}} value="Caldaia a biomassa">Caldaia a biomassa</option>
                                    <option {{ $item->tipo_generatore === 'Termocamini e stufe' ? 'selected' : ''}} value="Termocamini e stufe">Termocamini e stufe</option>
                                </select>
                            </label>
                            <label for="biome_generators[{{$practice->id}}-{{$item->id}}][use_destination]">
                                Impianto destinato a
                                <select name="biome_generators[{{$practice->id}}-{{$item->id}}][use_destination]" id="biome_generators[{{$practice->id}}-{{$item->id}}][use_destination]">
                                    <option {{ $item->use_destination === 'Riscaldamento ambiente' ? 'selected' : ''}} value="Riscaldamento ambiente">Riscaldamento ambiente</option>
                                    <option {{ $item->use_destination === 'Risc. amb. + prod. ACS' ? 'selected' : ''}} value="Risc. amb. + prod. ACS">Risc. amb. + prod. ACS</option>
                                </select>
                            </label>
                            <label for="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                                Tipo di alimentazione
                                <select name="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]" id="biome_generators[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                                    <option {{ $item->tipo_di_alimentazione === 'Legna' ? 'selected' : ''}} value="Legna">Legna</option>
                                    <option {{ $item->tipo_di_alimentazione === 'Pellet' ? 'selected' : ''}} value="Pellet">Pellet</option>
                                    <option {{ $item->tipo_di_alimentazione === 'Cippato' ? 'selected' : ''}} value="Cippato">Cippato</option>
                                </select>
                            </label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="row_input">
                                <label for="biome_generators[{{$practice->id}}-{{$item->id}}][p_utile_nom]">
                                    Pot. Utile nom.
                                    <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$item->id}}][p_utile_nom]" id="biome_generators[{{$practice->id}}-{{$item->id}}][p_utile_nom]" value="{{ $item->p_utile_nom }}">
                                    kW
                                </label>
                                <label for="biome_generators[{{$practice->id}}-{{$item->id}}][p_al_focolare]">
                                    P. al focolare
                                    <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$item->id}}][p_al_focolare]" id="biome_generators[{{$practice->id}}-{{$item->id}}][p_al_focolare]" value="{{ $item->p_al_focolare }}">
                                    kW
                                </label>
                                <label for="biome_generators[{{$practice->id}}-{{$item->id}}][rend_utile_alla_pot_nom]">
                                    Rend. utile alla pot. nom.
                                    <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$item->id}}][rend_utile_alla_pot_nom]" id="biome_generators[{{$practice->id}}-{{$item->id}}][rend_utile_alla_pot_nom]" value="{{ $item->rend_utile_alla_pot_nom }}">
                                    %
                                </label>
                                <label for="biome_generators[{{$practice->id}}-{{$item->id}}][sup_riscaldata]">
                                    Sup. riscaldata
                                    <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$item->id}}][sup_riscaldata]" id="biome_generators[{{$practice->id}}-{{$item->id}}][sup_riscaldata]" value="{{ $item->sup_riscaldata }}">
                                    m²
                                </label>
                            </div>
                            <div onclick="deleteBiomeGenerator({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p id="biome_generators_no_data_row">Nessun generatore a biomassa inserito</p>
                @endforelse
            </div>
        </div>
    </div>
    {{--<div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">--}}
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <p class="m-0">Il costo previsto per i generatori a biomassa IB) ammonta a *</p>--}}
    {{--        <label for="IB_expected_cos" class=" m-0 mr-4 black">--}}
    {{--            <input type="text" value="{{$vertwall->IB_expected_cost}}" name="IB_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">--}}
    {{--            €--}}
    {{--        </label>--}}
    {{--    </div>--}}
    {{--    <button class="add-button">Computo metrico</button>--}}
    {{--</div>--}}
    {{--<p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>--}}

    {{--<div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">--}}
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <p class="m-0">La spesa massima ammissibile per l’intrevento è pari a</p>--}}
    {{--        <label for="IB_max_cost" class=" m-0 mr-4 black">--}}
    {{--            <input type="text" value="{{$vertwall->IB_max_cost}}" name="IB_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">--}}
    {{--            €--}}
    {{--        </label>--}}
    {{--    </div>--}}
    {{--</div>--}}

    {{--<div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">--}}
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>--}}
    {{--        <label for="IB_nr_savings" class=" m-0 mr-4 black">--}}
    {{--            <input type="text" value="{{$vertwall->IB_nr_savings}}" name="IB_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">--}}
    {{--            KWh/anno--}}
    {{--        </label>--}}
    {{--    </div>--}}
    {{--</div>--}}
</div>

@push('scripts')
    @include('pages.scripts.biome_generator', ['condomino' => $condomino ?? '', 'is_common' => $isCommon])
@endpush

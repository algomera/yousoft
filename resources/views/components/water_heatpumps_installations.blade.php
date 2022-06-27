@props(['vertwall', 'practice', 'items', 'condomino', 'isCommon'])

<div>
    <div class="mt-5">
        <div class="d-flex align-items-center mb-3">
            <label class="checkbox-wrapper d-flex align-items-center mb-0">
                <input {{$vertwall->water_heatpumps_installation == 'true' ? 'checked' : ''}} type="checkbox" name="water_heatpumps_installation" id="water_heatpumps_installation" value="true">
                <span class="checkmark"></span>
                <span class="black" ><b>SA. Installazione di scaldacqua a pompa di calore</b></span>
            </label>
            <div class="add-btn-custom" onclick="addWaterHeatpumpsInstallation(event)">+</div>
            @if($items->count() > 0)
                <span><strong>(Inserite: {{ $items->count() }})</strong></span>
            @endif
        </div>
        <p style="width: 70%;">In sostituzione di un sistema di produzione di acqua calda quando avviene con lo stesso generatore di calore destinato alla climatizzazione invernale ai sensi delle lettre b) e c) del comma 1 dell’articolo 119 del Decreto Rilancio</p>
        <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
            <div id="water_heatpumps_installation_wrapper">
                @forelse($items as $i => $item)
                    <div class="box_input" data-id="water_heatpumps_installation-{{$practice->id}}-{{$item->id}}">
                        {{ $i + 1 }}
                        <div class="row_input">
                            <input type="hidden" name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][is_common]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][is_common]" value="{{ $isCommon }}">
                            <input type="hidden" name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][condomino_id]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                            <label for="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][tipo_scaldacqua_sostituito]">
                                Tipo scaldaacqua sostituito
                                <select name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][tipo_scaldacqua_sostituito]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][tipo_scaldacqua_sostituito]">
                                    <option {{ $item->tipo_scaldacqua_sostituito === 'Boiler elettrico' ? 'selected' : '' }} value="Boiler elettrico">Boiler elettrico</option>
                                    <option {{ $item->tipo_scaldacqua_sostituito === 'Gas/Gasolio' ? 'selected' : '' }} value="Gas/Gasolio">Gas/Gasolio</option>
                                    <option {{ $item->tipo_scaldacqua_sostituito === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                </select>
                            </label>
                            <label for="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][pu_scaldacqua_sostituito]">
                                Pu scaldacqua sostituito
                                <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][pu_scaldacqua_sostituito]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][pu_scaldacqua_sostituito]" value="{{ $item->pu_scaldacqua_sostituito }}">
                                kW
                            </label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="row_input">
                                <label for="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][pu_scaldacqua_a_pdc]">
                                    Pu scaldacqua a PDC
                                    <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][pu_scaldacqua_a_pdc]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][pu_scaldacqua_a_pdc]" value="{{ $item->pu_scaldacqua_a_pdc }}">
                                    kW
                                </label>
                                <label for="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][cop_nuovo_scaldacqua]">
                                    COP del nuovo scaldacqua
                                    <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][cop_nuovo_scaldacqua]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][cop_nuovo_scaldacqua]" value="{{ $item->cop_nuovo_scaldacqua }}">
                                </label>
                                <label for="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][capacita_accumulo]">
                                    Capacità accumulo
                                    <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][capacita_accumulo]" id="water_heatpumps_installations[{{$practice->id}}-{{$item->id}}][capacita_accumulo]" value="{{ $item->capacita_accumulo }}">
                                    L
                                </label>
                            </div>
                            <div onclick="deleteWaterHeatpumpsInstallation({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3 clickable">
                                <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p id="water_heatpumps_installations_no_data_row">Nessuno scaldacqua a pompa di calore inserito</p>
                @endforelse
            </div>
        </div>
    </div>
    {{--<div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">--}}
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <p class="m-0">Il costo complessivo previsto degli interventi sull’impianto (Punto 2) ammonta a *</p>--}}
    {{--        <label for="SA_expected_cost" class=" m-0 mr-4 black">--}}
    {{--            <input type="text" value="{{$vertwall->SA_expected_cost}}" name="SA_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">--}}
    {{--            €--}}
    {{--        </label>--}}
    {{--    </div>--}}
    {{--    <button class="add-button">Computo metrico</button>--}}
    {{--</div>--}}
    {{--<p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>--}}

    {{--<div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">--}}
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <p class="m-0">La spesa massima ammissibile per la sostituzione degli impianti è pari a</p>--}}
    {{--        <label for="SA_max_cost" class=" m-0 mr-4 black">--}}
    {{--            <input type="text" name="SA_max_cost" value="{{$vertwall->SA_max_cost}}" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">--}}
    {{--            €--}}
    {{--        </label>--}}
    {{--    </div>--}}
    {{--</div>--}}

    {{--<div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">--}}
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>--}}
    {{--        <label for="SA_nr_savings" class=" m-0 mr-4 black">--}}
    {{--            <input type="text" name="SA_nr_savings" value="{{$vertwall->SA_nr_savings}}" style="width: 120px;" class="border ml-2 px-2 text-right">--}}
    {{--            KWh/anno--}}
    {{--        </label>--}}
    {{--    </div>--}}
    {{--</div>--}}
</div>

@push('scripts')
    @include('pages.scripts.water_heatpumps_installation', ['condomino' => $condomino ?? '', 'is_common' => $isCommon])])
@endpush

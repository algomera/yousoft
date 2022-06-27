@props(['vertwall', 'practice', 'items', 'condomino', 'isCommon'])

<div class="mt-5">
    <div class="d-flex align-items-center mb-3">
        <label for="heat_pump" class="checkbox-wrapper d-flex align-items-center mb-0">
            <input {{$vertwall->heat_pump == 'true' ? 'checked' : ''}} type="checkbox" name="heat_pump" id="heat_pump" value="true">
            <span class="checkmark"></span>
            <span class="black" ><b>PC. Pompe di calore (PDC) </b></span>
        </label>
        <div class="add-btn-custom" onclick="addHeatPump(event)">+</div>
        @if($items->count() > 0)
            <span><strong>(Inserite: {{ $items->count() }})</strong></span>
        @endif
    </div>
    <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
        <div id="heat_pump_wrapper">
            @forelse($items as $i => $item)
                <div class="box_input" data-id="heat_pump-{{$practice->id}}-{{$item->id}}">
                    {{ $i + 1 }}
                    <div class="row_input">
                        <input type="hidden" name="heat_pumps[{{$practice->id}}-{{$item->id}}][is_common]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][is_common]" value="{{ $isCommon }}">
                        <input type="hidden" name="heat_pumps[{{$practice->id}}-{{$item->id}}][condomino_id]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                            Tipo sostituito
                            <select name="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_sostituito]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
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
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]">
                            P. nom. sostituito
                            <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" value="{{ $item->p_nom_sostituito }}">
                            kW
                        </label>
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_di_pdc]">
                            Tipo di PDC
                            <select name="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_di_pdc]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_di_pdc]">
                                <option {{ $item->tipo_di_pdc === 'Aria/Aria' ? 'selected' : ''}} value="Aria/Aria">Aria/Aria</option>
                                <option {{ $item->tipo_di_pdc === 'Aria/Acqua' ? 'selected' : ''}} value="Aria/Acqua">Aria/Acqua</option>
                                <option {{ $item->tipo_di_pdc === 'Salamoia/Aria' ? 'selected' : ''}} value="Salamoia/Aria">Salamoia/Aria</option>
                                <option {{ $item->tipo_di_pdc === 'Salamoia/Acqua' ? 'selected' : ''}} value="Salamoia/Acqua">Salamoia/Acqua</option>
                                <option {{ $item->tipo_di_pdc === 'Acqua/Aria' ? 'selected' : ''}} value="Acqua/Aria">Acqua/Aria</option>
                                <option {{ $item->tipo_di_pdc === 'Acqua/Acqua' ? 'selected' : ''}} value="Acqua/Acqua">Acqua/Acqua</option>
                            </select>
                        </label>
                    </div>
                    <div class="row_input">
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_roof_top]" class="checkbox-wrapper d-flex">
                            <input type="checkbox" {{ $item->tipo_roof_top ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_roof_top]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][tipo_roof_top]" value="true">
                            <span class="checkmark"></span>
                            Tipo Roof Top
                        </label>
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][potenza_nominale]">
                            Potenza Nominale
                            <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$item->id}}][potenza_nominale]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][potenza_nominale]" value="{{ $item->potenza_nominale }}">
                            kW
                        </label>
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][p_elettrica_assorbita]">
                            P. Elettrica assorbita
                            <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$item->id}}][p_elettrica_assorbita]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][p_elettrica_assorbita]" value="{{ $item->p_elettrica_assorbita }}">
                            kW
                        </label>
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][inverter]" class="checkbox-wrapper d-flex">
                            <input type="checkbox" {{ $item->inverter ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$item->id}}][inverter]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][inverter]" value="true">
                            <span class="checkmark"></span>
                            Inverter
                        </label>
                        <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][cop]">
                            COP
                            <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$item->id}}][cop]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][cop]" value="{{ $item->cop }}">
                        </label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row_input">
                            <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][reversibile]" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{ $item->reversibile ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$item->id}}][reversibile]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][reversibile]" value="true">
                                <span class="checkmark"></span>
                                E' reversibile
                            </label>
                            <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][eer]">
                                EER
                                <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$item->id}}][eer]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][eer]" value="{{ $item->eer }}">
                            </label>
                            <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][sonde_geotermiche]" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{ $item->sonde_geotermiche ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$item->id}}][sonde_geotermiche]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][sonde_geotermiche]" value="true">
                                <span class="checkmark"></span>
                                Sonde geotermiche
                            </label>
                            <label for="heat_pumps[{{$practice->id}}-{{$item->id}}][sup_riscaldata_dalla_pdc]">
                                Sup. riscaldata dalla PDC
                                <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$item->id}}][sup_riscaldata_dalla_pdc]" id="heat_pumps[{{$practice->id}}-{{$item->id}}][sup_riscaldata_dalla_pdc]" value="{{ $item->sup_riscaldata_dalla_pdc }}">
                                m²
                            </label>
                        </div>
                        <div onclick="deleteHeatPump({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                        </div>
                    </div>
                </div>
            @empty
                <p id="heat_pumps_no_data_row">Nessuna pompa di calore inserita</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
    @include('pages.scripts.heat_pump', ['condomino' => $condomino ?? '', 'is_common' => $isCommon])
@endpush

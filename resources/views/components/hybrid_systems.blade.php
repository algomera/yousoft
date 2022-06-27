@props(['vertwall', 'practice', 'items', 'condomino', 'isCommon'])

<div class="mt-5">
    <div class="d-flex align-items-center mb-3">
        <label for="hybrid_system" class="checkbox-wrapper d-flex align-items-center mb-0">
            <input {{$vertwall->hybrid_system == 'true' ? 'checked' : ''}} type="checkbox" name="hybrid_system" id="hybrid_system" value="true">
            <span class="checkmark"></span>
            <span class="black" ><b>SI. Sistemi ibridi</b></span>
        </label>
        <div class="add-btn-custom" onclick="addHybridSystem(event)">+</div>
        @if($items->count() > 0)
            <span><strong>(Inserite: {{ $items->count() }})</strong></span>
        @endif
    </div>
    <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
        <div id="hybrid_system_wrapper">
            @forelse($items as $i => $item)
                <div class="box_input" data-id="hybrid_system-{{$practice->id}}-{{$item->id}}">
                    {{ $i + 1 }}
                    <div class="row_input">
                        <input type="hidden" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][is_common]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][is_common]" value="{{ $isCommon }}">
                        <input type="hidden" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][condomino_id]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                            Tipo sostituito
                            <select name="hybrid_systems[{{$practice->id}}-{{$item->id}}][tipo_sostituito]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
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
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]">
                            P. nom. sostituito
                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" value="{{ $item->p_nom_sostituito }}">
                            kW
                        </label>
                    </div>
                    <div class="row_input">
                        <h6>Caldaia a condensazione:</h6>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_potenza_nominale]">
                            P. nom.
                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_potenza_nominale]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_potenza_nominale]" value="{{ $item->condensing_potenza_nominale }}">
                            kW
                        </label>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_rend_utile_nom]">
                            Rend. utile nom. (100%)
                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_rend_utile_nom]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_rend_utile_nom]" value="{{ $item->condensing_rend_utile_nom }}">
                            %
                        </label>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_efficienza_ns]">
                            Efficienza ns
                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_efficienza_ns]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][condensing_efficienza_ns]" value="{{ $item->condensing_efficienza_ns }}">
                            %
                        </label>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                            Tipo di alim.
                            <select name="hybrid_systems[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                                <option {{ $item->tipo_di_alimentazione === 'Metano' ? 'selected' : '' }} value="Metano">Gas Naturale (metano)</option>
                                <option {{ $item->tipo_di_alimentazione === 'Gpl' ? 'selected' : '' }} value="Gpl">Gpl</option>
                                <option {{ $item->tipo_di_alimentazione === 'Gasolio' ? 'selected' : '' }} value="Gasolio">Gasolio</option>
                            </select>
                        </label>
                    </div>
                    <div class="row_input">
                        <h6>Pompa di calore (PDC):</h6>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_tipo_di_pdc]">
                            Tipo di PDC
                            <select name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_tipo_di_pdc]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_tipo_di_pdc]">
                                <option {{ $item->heat_tipo_di_pdc === 'Aria/Aria' ? 'selected' : '' }} value="Aria/Aria">Aria/Aria</option>
                                <option {{ $item->heat_tipo_di_pdc === 'Aria/Acqua' ? 'selected' : '' }} value="Aria/Acqua">Aria/Acqua</option>
                                <option {{ $item->heat_tipo_di_pdc === 'Salamoia/Aria' ? 'selected' : '' }} value="Salamoia/Aria">Salamoia/Aria</option>
                                <option {{ $item->heat_tipo_di_pdc === 'Salamoia/Acqua' ? 'selected' : '' }} value="Salamoia/Acqua">Salamoia/Acqua</option>
                                <option {{ $item->heat_tipo_di_pdc === 'Acqua/Aria' ? 'selected' : '' }} value="Acqua/Aria">Acqua/Aria</option>
                                <option {{ $item->heat_tipo_di_pdc === 'Acqua/Acqua' ? 'selected' : '' }} value="Acqua/Acqua">Acqua/Acqua</option>
                            </select>
                        </label>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_tipo_roof_top]" class="checkbox-wrapper d-flex">
                            <input type="checkbox" {{ $item->heat_tipo_roof_top ? 'checked' : '' }} name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_tipo_roof_top]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_tipo_roof_top]" value="true">
                            <span class="checkmark"></span>
                            Tipo Roof Top
                        </label>
                        <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_potenza_nominale]">
                            P. nom.
                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_potenza_nominale]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_potenza_nominale]" value="{{ $item->heat_potenza_nominale }}">
                            kW
                        </label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row_input">
                            <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_p_elettrica_assorbita]">
                                P. Elettrica assorbita
                                <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_p_elettrica_assorbita]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_p_elettrica_assorbita]" value="{{ $item->heat_p_elettrica_assorbita }}">
                                kW
                            </label>
                            <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_inverter]" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{ $item->heat_inverter ? 'checked' : '' }} name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_inverter]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_inverter]" value="true">
                                <span class="checkmark"></span>
                                inverter
                            </label>
                            <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_cop]">
                                COP
                                <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_cop]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_cop]" value="{{ $item->heat_cop }}">
                            </label>
                            <label for="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_sonde_geotermiche]" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{ $item->heat_sonde_geotermiche ? 'checked' : '' }} name="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_sonde_geotermiche]" id="hybrid_systems[{{$practice->id}}-{{$item->id}}][heat_sonde_geotermiche]" value="true">
                                <span class="checkmark"></span>
                                Sonde geotermiche
                            </label>
                        </div>
                        <div onclick="deleteHybridSystem({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                        </div>
                    </div>
                </div>
            @empty
                <p id="hybrid_systems_no_data_row">Nessun sistema ibrido inserito</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
    @include('pages.scripts.hybrid_system', ['condomino' => $condomino ?? '', 'is_common' => $isCommon])])
@endpush

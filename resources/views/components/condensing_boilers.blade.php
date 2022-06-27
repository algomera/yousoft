@props(['vertwall', 'practice', 'items', 'condomino', 'isCommon'])

<div class="mt-5">
    <div class="d-flex align-items-center mb-3">
        <label for="condensing_boiler" class="checkbox-wrapper d-flex align-items-center mb-0">
            <div>
                <input {{$vertwall->condensing_boiler == 'true' ? 'checked' : ''}} type="checkbox" name="condensing_boiler" id="condensing_boiler" value="true">
                <span class="checkmark"></span>
                <span class="black"><b>CC. Caldaie a condensazione</b></span>
            </div>
        </label>
        <div class="add-btn-custom" onclick="addCondensingBoiler(event)">+</div>
        @if($items->count() > 0)
            <span><strong>(Inserite: {{ $items->count() }})</strong></span>
        @endif
    </div>
    <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
        <div id="condensing_boiler_wrapper">
            @forelse($items as $i => $item)
                <div class="box_input" data-id="condensing_boiler-{{$practice->id}}-{{$item->id}}">
                    {{ $i + 1 }}
                    <div class="row_input">
                        <input type="hidden" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][is_common]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][is_common]" value="{{ $isCommon }}">
                        <input type="hidden" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][condomino_id]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
                            Tipo sostituito
                            <select name="condensing_boilers[{{$practice->id}}-{{$item->id}}][tipo_sostituito]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][tipo_sostituito]">
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
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]">
                            P. nom. sostituito
                            <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][p_nom_sostituito]" value="{{ $item->p_nom_sostituito }}">
                            kW
                        </label>
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][potenza_nominale]">
                            Potenza nominale
                            <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][potenza_nominale]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][potenza_nominale]" value="{{ $item->potenza_nominale }}">
                            kW
                        </label>
                    </div>
                    <div class="row_input">
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][rend_utile_nom]">
                            Rend. utile nom. (100%)
                            <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][rend_utile_nom]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][rend_utile_nom]" value="{{ $item->rend_utile_nom }}">
                            %
                        </label>
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][use_destination]">
                            <select name="condensing_boilers[{{$practice->id}}-{{$item->id}}][use_destination]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][use_destination]">
                                <option {{ $item->use_destination === 'Riscaldameto ambiente' ? 'selected' : ''}} value="Riscaldameto ambiente">Riscaldameto ambiente</option>
                                <option {{ $item->use_destination === 'Risc. ambiente + prod.ACS' ? 'selected' : ''}} value="Risc. ambiente + prod.ACS">Risc. ambiente + prod.ACS</option>
                            </select>
                        </label>
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][efficienza_ns]">
                            Efficienza ns
                            <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][efficienza_ns]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][efficienza_ns]" value="{{ $item->efficienza_ns }}">
                            %
                        </label>
                        <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][efficienza_acs_nwh]">
                            Efficienza ACS nwh
                            <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$item->id}}][efficienza_acs_nwh]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][efficienza_acs_nwh]" value="{{ $item->efficienza_acs_nwh }}">
                            %
                        </label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row_input">
                            <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                                Tipo di alimentazione
                                <select name="condensing_boilers[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][tipo_di_alimentazione]">
                                    <option {{ $item->tipo_di_alimentazione === 'Metano' ? 'selected' : ''}} value="Metano">Gas Naturale (metano)</option>
                                    <option {{ $item->tipo_di_alimentazione === 'Gpl' ? 'selected' : ''}} value="Gpl">Gpl</option>
                                    <option {{ $item->tipo_di_alimentazione === 'Gasolio' ? 'selected' : ''}} value="Gasolio">Gasolio</option>
                                </select>
                            </label>
                            <label for="condensing_boilers[{{$practice->id}}-{{$item->id}}][classe_termo_evoluto]">
                                Classe disp. termoregolazione evoluto
                                <select name="condensing_boilers[{{$practice->id}}-{{$item->id}}][classe_termo_evoluto]" id="condensing_boilers[{{$practice->id}}-{{$item->id}}][classe_termo_evoluto]">
                                    <option {{ $item->classe_termo_evoluto === 'V' ? 'selected' : ''}} value="V">V</option>
                                    <option {{ $item->classe_termo_evoluto === 'VI' ? 'selected' : ''}} value="VI">VI</option>
                                    <option {{ $item->classe_termo_evoluto === 'VIII' ? 'selected' : ''}} value="VIII">VIII</option>
                                    <option {{ $item->classe_termo_evoluto === 'Nessun dispositivo' ? 'selected' : ''}} value="Nessun dispositivo">Nessun dispositivo</option>
                                </select>
                            </label>
                        </div>
                        <div onclick="deleteCondensingBoiler({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                        </div>
                    </div>
                </div>
            @empty
                <p id="consensing_boilers_no_data_row">Nessuna caldaia inserita</p>
            @endforelse
            {{-- end loop --}}
        </div>
    </div>
</div>

@push('scripts')
    @include('pages.scripts.condensing_boiler', ['condomino' => $condomino ?? '', 'is_common' => $isCommon])
@endpush


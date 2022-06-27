@props(['vertwall', 'practice', 'items', 'condomino', 'isCommon'])

<div class="mt-5">
    <div class="d-flex align-items-center mb-3">
        <label class="checkbox-wrapper d-flex align-items-center mb-0">
            <input {{$vertwall->solar_panel == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel" id="solar_panel" value="true">
            <span class="checkmark"></span>
            <span class="black" ><b>Collettori solari</b></span>
        </label>
        <div class="add-btn-custom" onclick="addSolarPanel(event)">+</div>
        @if($items->count() > 0)
            <span><strong>(Inserite: {{ $items->count() }})</strong></span>
        @endif
    </div>
    <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
        <div id="solar_panel_wrapper">
            @forelse($items as $i => $item)
                <div class="box_input"  data-id="solar_panel-{{$practice->id}}-{{$item->id}}">
                    {{ $i + 1 }}
                    <div class="row_input">
                        <input type="hidden" name="solar_panels[{{$practice->id}}-{{$item->id}}][is_common]" id="solar_panels[{{$practice->id}}-{{$item->id}}][is_common]" value="{{ $isCommon }}">
                        <input type="hidden" name="solar_panels[{{$practice->id}}-{{$item->id}}][condomino_id]" id="solar_panels[{{$practice->id}}-{{$item->id}}][condomino_id]" value="{{ $condomino ?? $item->condomino_id }}">
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][sup_lorda_singolo_modulo]">
                            Superfice lorda Ag di un singolo modulo
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][sup_lorda_singolo_modulo]" id="solar_panels[{{$practice->id}}-{{$item->id}}][sup_lorda_singolo_modulo]" value="{{ $item->sup_lorda_singolo_modulo }}">
                            m²
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][num_moduli]">
                            N° di moduli
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][num_moduli]" id="solar_panels[{{$practice->id}}-{{$item->id}}][num_moduli]" value="{{ $item->num_moduli }}">
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][sup_totale]">
                            Sup. Totale
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][sup_totale]" id="solar_panels[{{$practice->id}}-{{$item->id}}][sup_totale]" value="{{ $item->sup_totale }}">
                            m²
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][certificazione_solar_keymark]" class="checkbox-wrapper d-flex">
                            <input type="checkbox" {{ $item->certificazione_solar_keymark ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$item->id}}][certificazione_solar_keymark]" id="solar_panels[{{$practice->id}}-{{$item->id}}][certificazione_solar_keymark]" value="true">
                            <span class="checkmark"></span>
                            Certificazione solar Keymark
                        </label>
                    </div>
                    <div class="row_input">
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_di_collettori]">
                            Tipo di collettori
                            <select name="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_di_collettori]" id="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_di_collettori]">
                                <option {{ $item->tipo_di_collettori === 'Piani vetrati' ? 'selected' : '' }} value="Piani vetrati">Piani vetrati</option>
                                <option {{ $item->tipo_di_collettori === 'Sotto vuoto o tubi evacuati' ? 'selected' : '' }} value="Sotto vuoto o tubi evacuati">Sotto vuoto o tubi evacuati</option>
                                <option {{ $item->tipo_di_collettori === 'A concentrazione' ? 'selected' : '' }} value="A concentrazione">A concentrazione</option>
                                <option {{ $item->tipo_di_collettori === 'Scoperti' ? 'selected' : '' }} value="Scoperti">Scoperti</option>
                            </select>
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_di_installazione]">
                            Tipo di installazione
                            <select name="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_di_installazione]" id="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_di_installazione]">
                                <option {{ $item->tipo_di_installazione === 'Tetto piano' ? 'selected' : '' }} value="Tetto piano">Tetto piano</option>
                                <option {{ $item->tipo_di_installazione === 'Tetto a falda' ? 'selected' : '' }} value="Tetto a falda">Tetto a falda</option>
                                <option {{ $item->tipo_di_installazione === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                            </select>
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][inclinazione]">
                            inclinazione
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][inclinazione]" id="solar_panels[{{$practice->id}}-{{$item->id}}][inclinazione]" value="{{ $item->inclinazione }}">
                            %
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][orientamento]">
                            Orientamento
                            <select name="solar_panels[{{$practice->id}}-{{$item->id}}][orientamento]" id="solar_panels[{{$practice->id}}-{{$item->id}}][orientamento]">
                                <option {{ $item->orientamento === 'Nord' ? 'selected' : '' }} value="Nord">Nord</option>
                                <option {{ $item->orientamento === 'Nord-Est' ? 'selected' : '' }} value="Nord-Est">Nord-Est</option>
                                <option {{ $item->orientamento === 'Est' ? 'selected' : '' }} value="Est">Est</option>
                                <option {{ $item->orientamento === 'Sud-Est' ? 'selected' : '' }} value="Sud-Est">Sud-Est</option>
                                <option {{ $item->orientamento === 'Sud' ? 'selected' : '' }} value="Sud">Sud</option>
                                <option {{ $item->orientamento === 'Sud-Ovest' ? 'selected' : '' }} value="Sud-Ovest">Sud-Ovest</option>
                                <option {{ $item->orientamento === 'Ovest' ? 'selected' : '' }} value="Ovest">Ovest</option>
                                <option {{ $item->orientamento === 'Nord-Ovest' ? 'selected' : '' }} value="Nord-Ovest">Nord-Ovest</option>
                                <option {{ $item->orientamento === 'P-orizzontale' ? 'selected' : '' }} value="P-orizzontale">P-orizzontale</option>
                            </select>
                        </label>
                    </div>
                    <div class="row_input">
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]">
                            Impianto factory made
                            <input type="radio" {{ $item->impianto_factory_made === 'N.D' ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]" id="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]" value="N.D">
                            N.D
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]">
                            <input type="radio" {{ $item->impianto_factory_made === 'No' ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]" id="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]" value="No">
                            No
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]">
                            <input type="radio" {{ $item->impianto_factory_made === 'Si' ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]" id="solar_panels[{{$practice->id}}-{{$item->id}}][impianto_factory_made]" value="Si">
                            Si
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][q_col_q_sol]">
                            Q col/Q sol
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][q_col_q_sol]" id="solar_panels[{{$practice->id}}-{{$item->id}}][q_col_q_sol]" value="{{ $item->q_col_q_sol }}">
                            kWht
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][ql]">
                            QL
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][ql]" id="solar_panels[{{$practice->id}}-{{$item->id}}][ql]" value="{{ $item->ql }}">
                            MJ
                        </label>
                        <label for="solar_panels[{{$practice->id}}-{{$item->id}}][accumulo_in_litri]">
                            Accumulo in litri
                            <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$item->id}}][accumulo_in_litri]" id="solar_panels[{{$practice->id}}-{{$item->id}}][accumulo_in_litri]" value="{{ $item->accumulo_in_litri }}">
                        </label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row_input">
                            <label for="solar_panels[{{$practice->id}}-{{$item->id}}][destinazione_calore]">
                                Destinazione del calore
                                <select name="solar_panels[{{$practice->id}}-{{$item->id}}][destinazione_calore]" id="solar_panels[{{$practice->id}}-{{$item->id}}][destinazione_calore]">
                                    <option {{ $item->destinazione_calore === 'Acqua sanitaria' ? 'selected' : '' }} value="Acqua sanitaria">Produzione di acqua calda sanitaria</option>
                                    <option {{ $item->destinazione_calore === 'Produzione di ACS e riscaldamento ambiente' ? 'selected' : '' }} value="Produzione di ACS e riscaldamento ambiente">Produzione di ACS e riscaldamento ambiente</option>
                                    <option {{ $item->destinazione_calore === 'Produzione di calore di processo' ? 'selected' : '' }} value="Produzione di calore di processo">Produzione di calore di processo</option>
                                    <option {{ $item->destinazione_calore === 'Riscaldamento piscine' ? 'selected' : '' }} value="Riscaldamento piscine">Riscaldamento piscine</option>
                                    <option {{ $item->destinazione_calore === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                </select>
                            </label>
                            <label for="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_impianto_integrato_o_sostituito]">
                                Tipo impianto integrato o sostituito
                                <select name="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_impianto_integrato_o_sostituito]" id="solar_panels[{{$practice->id}}-{{$item->id}}][tipo_impianto_integrato_o_sostituito]">
                                    <option {{ $item->tipo_impianto_integrato_o_sostituito === 'Boiler elettrico' ? 'selected' : '' }} value="Boiler elettrico">Boiler elettrico</option>
                                    <option {{ $item->tipo_impianto_integrato_o_sostituito === 'Gas/Gasolio' ? 'selected' : '' }} value="Gas/Gasolio">Gas/Gasolio</option>
                                    <option {{ $item->tipo_impianto_integrato_o_sostituito === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                </select>
                            </label>
                        </div>
                        <div onclick="deleteSolarPanel({{$practice->id}}, {{$item->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                        </div>
                    </div>
                </div>
            @empty
                <p id="solar_panels_no_data_row">Nessun collettore solare inserito</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
    @include('pages.scripts.solar_panel', ['condomino' => $condomino ?? '', 'is_common' => $isCommon])
@endpush

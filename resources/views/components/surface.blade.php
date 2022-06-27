@props(['vertwall', 'practice', 'surfaces', 'condomino', 'isCommon', 'type'])

@php
    $routeSurface = Route::currentRouteName() == 'driving_intervention' ? 'driving_intervention' : 'towed_intervention';
@endphp

<div class="ov-x-none">
    <div class="nav_bonus d-flex align-items-center" style="width: 100%; padding-right: 0px; margin:0;margin-bottom: 5px;">
        <a href="{{route($routeSurface, ['practice' => $practice->id, $condomino ?? null, 'type' => 'PV'])}}" @if($type !== 'PV') onclick="saveTypeChange({{$practice->id}}, null, '{{$type}}')"@endif style="padding: 0">
            <div class="d-flex align-items-center link text-nowrap {{$type == 'PV' ? 'frame' : ''}}" >
                (PV) Pareti Verticali

                 @if($type == 'PV')
                    <div class="add-btn-custom-small" onclick="addSurface(event, 'PV')">+</div>
                @endif
            </div>        
        </a>
        <a href="{{route($routeSurface, ['practice' => $practice->id,$condomino ?? null, 'type' => 'PO'])}}" @if($type !== 'PO') onclick="saveTypeChange({{$practice->id}}, null, '{{$type}}')"@endif style="padding: 0">
            <div class="d-flex align-items-center link text-nowrap {{$type == 'PO' ? 'frame' : ''}}" >
                (PO) Coperture

                 @if($type == 'PO')
                    <div class="add-btn-custom-small" onclick="addSurface(event, 'PO')">+</div>
                @endif
            </div>        
        </a>
        <a href="{{route($routeSurface, ['practice' => $practice->id,$condomino ?? null, 'type' => 'PS'])}}" @if($type !== 'PS') onclick="saveTypeChange({{$practice->id}}, null, '{{$type}}')"@endif style="padding: 0">
            <div class="d-flex align-items-center link text-nowrap {{$type == 'PS' ? 'frame' : ''}}" >
                (PS) Pavimenti

                 @if($type == 'PS')
                    <div class="add-btn-custom-small" onclick="addSurface(event, 'PS')">+</div>
                @endif
                <div class="bord-trasp"></div>
            </div>        
        </a>
        @if(Route::currentRouteName() == 'driving_intervention')
            <a href="{{route($routeSurface, ['practice' => $practice->id,$condomino ?? null, 'type' => 'POND'])}}" @if($type !== 'POND') onclick="saveTypeChange({{$practice->id}}, null, '{{$type}}')"@endif style="padding: 0">
                <div class="d-flex align-items-center link text-nowrap {{$type == 'POND' ? 'frame' : ''}}" >
                    (POND) Cop. non disperdenti

                    @if($type == 'POND')
                        <div class="add-btn-custom-small" onclick="addSurface(event, 'POND')">+</div>
                    @endif
                </div>        
            </a>
            <p class="m-0 text-nowrap">Data inizio pagamento coperture non disperdenti</p>
            <input value="{{$vertwall->start_date_payment}}" name="start_date_payment" id="start_date_payment" class="border ml-2" style="width: 150px; padding:0 5px" type="date">
        @endif
    </div>
    <table class="table_bonus" id="surface_table" style="width: 100%">
        <thead>
        <tr>
            <td class="text-center" style="width:5%;"><b>N.</b></td>
            <td style="width:20%;"><b>Descrizione</b></td>
            <td style="width:13%;"><b>Superficie (m2)</b></td>
            <td style="width:10%;">
                <b>
                    Trasm. ante
                    (W/m2k)
                </b>
            </td>
            <td style="width:10%;">
                <b>
                    Trasm. post
                    (W/m2k)
                </b>
            </td>
            <td style="width:15%;">
                <b>
                    Trasm. Term.
                    Period. YIE (W/m2k)
                </b>
            </td>
            <td style="width:15%;"><b>Confine</b></td>
            <td style="width:15%;"><b>Coibentazione</b></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
            @forelse($surfaces as $s => $surface)
                <input type="hidden" name="surfaces[{{$practice->id}}-{{$surface->id}}][intervention]" value="{{$surface->intervention}}">
                <input type="hidden" name="surfaces[{{$practice->id}}-{{$surface->id}}][is_common]" id="" value="{{ $isCommon }}">
                <input type="hidden" name="surfaces[{{$practice->id}}-{{$surface->id}}][condomino_id]" id="" value="{{ $condomino === 'common' ? '' : $condomino}}">
                <input type="hidden" name="surfaces[{{$practice->id}}-{{$surface->id}}][type]" id="" value="{{$type}}">
                <tr name="{{$practice->id}}-{{$surface->id}}">
                    <td class="text-center">{{ $s + 1 }}</td>
                    <td class="text-center">
                        <input type="text" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][description_surface]" value="{{ $surface->description_surface }}">
                    </td>
                    <td class="text-right">
                        <input type="number" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][surface]" value="{{ $surface->surface }}">
                    </td>
                    <td class="text-right">
                        <input type="number" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][trasm_ante]" value="{{ $surface->trasm_ante }}">
                    </td>
                    <td class="text-right">
                        <input type="number" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][trasm_post]" value="{{ $surface->trasm_post }}">
                    </td>
                    <td class="text-right">
                        <input type="number" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][trasm_term]" value="{{ $surface->trasm_term }}">
                    </td>
                    <td class="text-center">
                        <input type="text" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][confine]" value="{{ $surface->confine }}">
                    </td>
                    <td class="text-center">
                        <input type="text" style="border: none; width:100%;" name="surfaces[{{$practice->id}}-{{$surface->id}}][insulation]" value="{{ $surface->insulation }}">
                    </td>
                    <td>
                        <div onclick="deleteSurface({{$practice->id}}, {{$surface->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center">
                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                        </div>
                    </td>
                </tr>
            @empty
                <tr id="no_data_row">
                    <td colspan="12">Nessun dato caricato</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex mt-2" style="background-color: #f2f2f2; width:100%; padding:5px 10px">
        <div class="d-flex mr-4">
            <p class="m-0">Totale “pareti verticali”</p>
            <label for="total_vertical_walls" class="m-0 black">
                <input type="number" readonly value="{{ $surfaces->sum('surface') }}" name="total_vertical_walls" id="total_vertical_walls" class="border ml-2 px-2 text-right  @error('total_vertical_walls') is-invalid error @enderror" style="width: 80px">
                m²
                @error('total_vertical_walls')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
        <div class="d-flex mr-4">
            <p class="m-0">di cui realizzati SAL n. 1</p>
            <label for="vw_realized_1" class="m-0  black">
                <input type="number" value="{{old('vw_realized_1') ?? $vertwall->vw_realized_1}}" name="vw_realized_1" id="vw_realized_1" class="border ml-2 px-2 text-right @error('vw_realized_1') is-invalid error @enderror" style="width: 80px">
                m²
                @error('vw_realized_1')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
        <div class="d-flex mr-4">
            <p class="m-0">SAL n. 2</p>
            <label for="vw_realized_2" class="m-0  black">
                <input type="number" value="{{old('vw_realized_2') ?? $vertwall->vw_realized_2}}" name="vw_realized_2" id="vw_realized_2" class="border ml-2 px-2 text-right @error('vw_realized_2') is-invalid error @enderror" style="width: 80px">
                m²
                @error('vw_realized_2')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
        <div class="d-flex mr-4">
            <p class="m-0">SAL F.</p>
            <label for="vw_sal_f" class="m-0  black">
                <input type="number" value="{{old('vw_sal_f') ?? $vertwall->vw_sal_f}}" name="vw_sal_f" id="vw_sal_f" class="border ml-2 px-2 text-right @error('vw_sal_f') is-invalid error @enderror" style="width: 80px">
                m²
                @error('vw_sal_f')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
    </div>
</div>

@push('scripts')
    @include('pages.scripts.surface_add')

    <script type="text/javascript">
        
        function saveTypeChange(pid, id, type)  {
            console.log(pid, id, type);
            let inputs = document.querySelectorAll("[name^='surfaces']");

            let x = (function() {
                let n = {};
                inputs.forEach(o => {
                    let oid = o.name.split(/\[(.*?)\]/)[1]
                    let okey = o.name.split(/\[(.*?)\]/)[3]
                    if(n[oid] === undefined) {
                        n[oid] = {};
                    }
                    n[oid][okey] = o.value === '' ? null : o.value;
                })
                return n;
            })();
            axios.post(`/save_type_data/${type}`, {
                practice: pid,
                surfaces: x,
            })
        }

    </script>
@endpush

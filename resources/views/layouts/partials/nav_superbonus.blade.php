<div class="nav_bonus d-flex align-items-center ov-x ov-y-none">
    <a href="{{ route('superbonus.show', [$practice->id, $building->id]) }}" class="{{Route::currentRouteName() == 'superbonus.show' ? 'frame' : ''}} text-nowrap px-3">Dati di Progetto</a>
    <a href="{{ route('driving_intervention', [$practice, 'PV']) }}" class="{{Route::currentRouteName() == 'driving_intervention' ? 'frame' : ''}} text-nowrap px-3">Interventi trainanti</a>
    <a href="{{ route('towed_intervention', [$practice, 'common', 'PV']) }}" class="{{Route::currentRouteName() == 'towed_intervention' ? 'frame' : ''}} text-nowrap px-3">Interventi trainati</a>
    <a href="{{ route('final_state', [$practice]) }}" class="{{Route::currentRouteName() == 'final_state' ? 'frame' : ''}} text-nowrap px-3">Dati stato finale</a>
    <a href="{{ route('fees_declaration', [$practice]) }}" class="{{Route::currentRouteName() == 'fees_declaration' ? 'frame' : ''}} text-nowrap px-3">Tot. Spese e Dichiarazioni</a>
    <a href="{{ route('var_computation', [$practice]) }}" class="{{Route::currentRouteName() == 'var_computation' ? 'frame' : ''}} text-nowrap px-3">Varianti</a>
</div>


<div style="padding: 10px 165px 10px 30px; border-bottom: 2px solid #DBDCDB" class="d-flex align-items-center justify-content-between mb-2">
    <h2 class="light-grey">Pratiche</h2>
</div>

<div class="content-main" style="padding-top: 0px;">
    <div class="box">
        <div class="px-20 pt-20">
            <a href="{{route('practice.index')}}">
                <span style="margin-right: 20px" class="black text-md clickable {{Route::currentRouteName() == 'practice.index' ? 'bold' : ''}}">
                    Lista Pratiche
                </span>
            </a>
            <span class="black text-md {{Route::currentRouteName() != 'practice.index' ? 'bold' : ''}}">
                Scheda pratica
            </span>
            <hr class="bg-black" style="margin-top: 5px;">
            <div class="d-flex justify-content-between menu mb-4 ov-x">
                <a href="{{route('applicant.edit', $applicant->id) }}" class="{{request()->is('applicant*') ? 'visited' : ''}} px-2">
                    RICHIEDENTE
                </a>
                <a href="{{route('practice.edit', $practice->id) }}" class="{{request()->is('practice*') ? 'visited' : ''}} px-2">
                    PRATICA
                </a>
                <a href="{{route('subject.edit', $subject->id) }}" class="{{request()->is('subject*') ? 'visited' : ''}} px-2">
                    SUBAPPALTATORI
                </a>
                <a href="{{route('building.edit', $building->id) }}" class="{{request()->is('building/*') ? 'visited' : ''}} px-2">
                    IMMOBILE
                </a>
                <a href="{{route('medias', $practice->id)}}" class="{{request()->is('medias/*') ? 'visited' : ''}} px-2 text-nowrap">
                    FOTO E VIDEO
                </a>
                 <a href="{{route('folderDocument.show', [$practice->id, $practice->folder_documents->first()->id ])}}" class="{{request()->is('folder_document/*') ? 'visited' : ''}} text-nowrap px-2">
                    DOCUMENTI RICHIESTI
                </a>
                 <a href="{{route('superbonus.index', $practice->id) }}" class="{{request()->is('superbonus*') ? 'visited' : ''}} px-2">
                    SUPERBONUS
                </a>
                <a href="{{route('contracts.index', $practice->id)}}" class="{{ request()->is('contracts*') ? 'visited' : ''}} px-2">CONTRATTI</a>
                <a href="{{route('policies.index', $practice->id)}}" class="{{request()->is('policies*') ? 'visited' : ''}} px-2">POLIZZE</a>
            </div>

            @if (Route::currentRouteName() == 'applicant.create')
            <div class="submenu">
                <h6>Dati richiedente</h6>
            </div>
            @endif
            @if (Route::currentRouteName() == 'practice.create')
            <div class="submenu">
                <h6>Dati pratica</h6>
            </div>
            @endif
            @if (Route::currentRouteName() == 'superbonus.index')
            <div class="submenu">
                <h6>Lista dati progetto</h6>
            </div>
            @endif
        </div>


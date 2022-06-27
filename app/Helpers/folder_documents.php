<?php

namespace App\Helpers;
use App\FolderDocument;
use App\Sub_folder;
use App\Practice;
use Illuminate\Support\Facades\DB;

class folder_documents

{
    public static function addFolders($practice_id)
    {
        $practice = Practice::find($practice_id);
        $session_folder = [
            [
                'practice_id'=> $practice_id,
                'name' => 'Documenti necessari PRIMA dell\'inizio dei lavori',
                'type' => 'first'
            ],
            [
                'practice_id'=> $practice_id,
                'name' => 'Documenti necessari DURANTE i lavori',
                'type' => 'during'
            ],
            [
                'practice_id'=> $practice_id,
                'name' => 'Documenti necessari AL TERMINE dei lavori',
                'type' => 'after'
            ],
            [
                'practice_id' => $practice_id,
                'name' => 'Documenti necessari per Involucro',
                'type' => 'casing'
            ]
        ];

        for ($i = 0; $i < count($session_folder); $i++) {
            FolderDocument::create($session_folder[$i]);
        }

        $list_folders_first = [
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Dichiarazione di conformità all\'originale',
                'role' => 'General Contractor'
            ],

            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'APE Ante timbrato dal professionista e post di progetto timbrato dal professionista',
                'role' => 'Termotecnico APE Ante'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Lettere d\'incarico professionisti con delega',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Visura catastale',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Dichiarazione del proprietario dell\'immobile, di consenso all\'esecuzione dei lavori laddove l\'intervento è effettuato dal detentore dell\'immobile',
                'role' => 'Richiedente'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Autocertificazione circa il rispetto dei requisiti tecnici',
                'role' => 'Termotecnico APE Ante'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Autocertificazione dei beneficiari delle detrazioni con firme su tutte le singole pagine',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Autocertificazione dell\'amministratore del condominio con firma su tutte le pagine',
                'role' => 'Proprietario/Amministratore'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Documenti di identità dei beneficiari delle detrazioni con firma leggibile e tessera sanitaria',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Contratto preliminare registrato o atto di acquisto',
                'role' => 'Richiedente'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Incarico e delega del certificatore fiscale',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Dichiarazione presenza impianto di riscaldamento',
                'role' => 'Termotecnico APE Ante'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Computo metrico estimativo timbrato dal tecnico in tutte le pagine',
                'role' => 'Tecnico addetto al Computo Metrico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Convocazione dell\'assemblea per approvazione interventi',
                'role' => 'Proprietario/Amministratore'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Delibera assemblea per approvazione dei lavori',
                'role' => 'Proprietario/Amministratore'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Progetto legge 10 e deposito in comune con n° di protocollo e data',
                'role' => 'Termotecnico progetto efficientamento energetico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Progetto miglioramento sismico con deposito (se realizzato)',
                'role' => 'Strutturista'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Titolo abilitativo per l\'esecuzione dell\'intervento di ristrutturazione (Cila/Scia)',
                'role' => 'Direttore lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Allegato B e ricevuta di deposito (se effettuato intervento sismabonus)',
                'role' => 'Strutturista'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'first')->first()->id,
                'folder_type' => 'first',
                'name' => 'Comunicazione denuncia inizio lavori ASL/SPISAL',
                'role' => 'Direttore lavori'
            ],

        ];

        $list_folders_during = [
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Comunicazione per trasferimento dei crediti SAL 1/SAL 2/SAL 3 o finale',
                'role' => 'Asseveratore fiscale'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Delega trasferimento credito',
                'role' => 'Asseveratore fiscale'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Visto di conformità fiscale SAL 1/SAL 2/SAL 3 o finale',
                'role' => 'Asseveratore fiscale'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Asseverazione efficacia interventi strutturali SAL 3 completa di modello B con polizza di asseverazione e ricevuta di deposito',
                'role' => ''
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Asseverazione efficacia interventi strutturali SAL 2 completa di modello B con polizza di asseverazione e ricevuta di deposito',
                'role' => 'Strutturista'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Asseverazione efficacia interventi strutturali SAL 1 completa di modello B con polizza di asseverazione e ricevuta di deposito',
                'role' => 'Strutturista'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Ricevuta esito controlli ENEA SAL 3 ',
                'role' => 'Asseveratore tecnico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Asseverazione art. 119 Decreto Rilancio SAL 3',
                'role' => 'Asseveratore tecnico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Fattura SAL 3',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Stato d\'avanzamento 3 Finale (SAL 3)',
                'role' => 'Direttore lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Ricevuta esito controlli ENEA SAL 2',
                'role' => 'Asseveratore tecnico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Asseverazione art. 119 Decreto Rilancio SAL 2',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Fattura SAL 2',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Stato d\'avanzamento 2 (SAL 2)',
                'role' => 'Direttore lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Ricevuta esito controlli ENEA SAL 1',
                'role' => 'Asseveratore tecnico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Asseverazione art. 119 Decreto Rilancio SAL 1',
                'role' => 'Asseveratore tecnico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Fattura SAL 1',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'during')->first()->id,
                'folder_type' => 'during',
                'name' => 'Stato d\'avanzamento 1 (SAL 1)',
                'role' => 'Direttore lavori'
            ],
        ];

        $list_folders_after = [
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'after')->first()->id,
                'folder_type' => 'after',
                'name' => 'Dichiarazione fine lavori con stato finale e dichiarazione conformità delle opere realizzate rispetto al progetto',
                'role' => 'Direttore lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'after')->first()->id,
                'folder_type' => 'after',
                'name' => 'Collaudo statico se presentato Sismabonus con miglioramento sismico',
                'role' => 'strutturista'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'after')->first()->id,
                'folder_type' => 'after',
                'name' => 'APE - post intervento dell\'edificio',
                'role' => 'Termotecnico APE Post'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'after')->first()->id,
                'folder_type' => 'after',
                'name' => 'APE - post intervento singole unità immobiliari',
                'role' => 'Termotecnico APE Post'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'after')->first()->id,
                'folder_type' => 'after',
                'name' => 'Asseverazione art. 119 Decreto Rilancio allegato 1 nel caso in cui si effettui un unico stato di avanzamento finale',
                'role' => 'Asseveratore tecnico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'after')->first()->id,
                'folder_type' => 'after',
                'name' => 'Ricevuta esito controlli ENEA nel caso in cui si effettui un unico stato di avanzamento finale in base all\'art. 119 Decreto Rilancio allegato 1',
                'role' => 'Asseveratore tecnico'
            ],

        ];

        $list_folders_casing = [
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Dichiarazione dell\'amministratore di corretta ripartizione e adempimenti per le spese condominio',
                'role' => 'Proprietario/Amministratore'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Bonifici completi di causale, codice fiscale beneficiario della detrazione, codice fiscale del soggetto a cui è effettuato il bonifico. In caso di condominio di tutti i condomini e dell\'amministratore',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Fatture',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'In caso di sostituzione di caldaia/pompa di calore riportare scheda tecnica con certificazione dei dati della caldaia/pompa di calore',
                'role' => 'Termotecnico progetto efficientamento energetico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'In caso di sostituzione dei serramenti riportare scheda tecnica attestante certificazione dei dati termotecnici',
                'role' => 'Termotecnico progetto efficientamento energetico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Dichiarazione di conformità edilizia e urbanistica',
                'role' => 'Direttore lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Ricevuta informatica codice identificativo della domanda',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Comunicazione di inizio lavori e comunicazione ASL/SPISAL mediante raccomandata denuncia inizio lavori (CILA/SCIA)',
                'role' => 'Direttore lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Computo metrico estimativo',
                'role' => 'Tecnico addetto al Computo Metrico'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Visura catastale di tutte le unità immobiliari',
                'role' => 'General Contractor'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Delibera assemblea con allegata tabella millesimale firmata dall\'amministratore del condominio con ripartizione spese (solo per condominio)',
                'role' => 'Proprietario/Amministratore'
            ],
            [
                'practice_id'=> $practice_id,
                'folder_document_id' => $practice->folder_documents()->where('type', 'casing')->first()->id,
                'folder_type' => 'casing',
                'name' => 'Codice Fiscale carta d\'identità del proprietario o in caso di condominio dell\'amministratore',
                'role' => 'General Contractor'
            ],
        ];

        $list_folders_first = collect($list_folders_first);
        $list_folders_first_chunk = $list_folders_first->chunk(20);
        $list_folders_during = collect($list_folders_during);
        $list_folders_during_chunk = $list_folders_during->chunk(20);
        $list_folders_after = collect($list_folders_after);
        $list_folders_after_chunk = $list_folders_after->chunk(20);
        $list_folders_casing = collect($list_folders_casing);
        $list_folders_casing_chunk = $list_folders_casing->chunk(20);


        foreach ($list_folders_first_chunk as $chunk) {
            DB::table('sub_folders')->insert($chunk->toArray());
        }

        foreach ($list_folders_during_chunk as $chunk) {
            DB::table('sub_folders')->insert($chunk->toArray());
        }

        foreach ($list_folders_after_chunk as $chunk) {
            DB::table('sub_folders')->insert($chunk->toArray());
        }

        foreach ($list_folders_casing_chunk as $chunk) {
            DB::table('sub_folders')->insert($chunk->toArray());
        }
    }
}

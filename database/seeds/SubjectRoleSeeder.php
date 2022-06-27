<?php

use App\SubjectRole;
use Illuminate\Database\Seeder;

class SubjectRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectRole::create([
            'name' => 'Richiedente',
			'slug' => 'applicant',
            'color' => '#f1a754'
        ]);
        SubjectRole::create([
            'name' => 'Proprietario/Amministratore',
            'slug' => 'owner',
            'color' => '#487624'
        ]);
        SubjectRole::create([
            'name' => 'Agente/Consulente',
			'slug' => 'consultant',
            'color' => '#80d2cb'
        ]);
        SubjectRole::create([
            'name' => 'Banca finanziatrice',
            'slug' => 'lending_bank',
            'color' => '#6e6e6e'
        ]);
        SubjectRole::create([
            'name' => 'General Contractor',
            'slug' => 'general_contractor',
            'color' => '#ee5c47'
        ]);
        SubjectRole::create([
            'name' => 'Azienda edile',
            'slug' => 'construction_company',
            'color' => '#711f1b'
        ]);
        SubjectRole::create([
            'name' => 'Azienda impianti idrotermosanitari',
            'slug' => 'hydrothermal_sanitary_company',
            'color' => '#d096bf'
        ]);
        SubjectRole::create([
            'name' => 'Azienda impianti elettrici/fotovoltaici',
			'slug' => 'photovoltaic_company',
            'color' => '#9d6fcc'
        ]);
        SubjectRole::create([
            'name' => 'Termotecnico APE Ante',
			'slug' => 'technician_APE_Ante',
            'color' => '#fde761'
        ]);
        SubjectRole::create([
            'name' => 'Strutturista',
			'slug' => 'structural_engineer',
            'color' => '#97fa52'
        ]);
        SubjectRole::create([
            'name' => 'Direttore lavori',
            'slug' => 'work_director',
            'color' => '#597ecf'
        ]);
        SubjectRole::create([
            'name' => 'Asseveratore tecnico',
            'slug' => 'technical_assev',
            'color' => '#89745c'
        ]);
        SubjectRole::create([
            'name' => 'Asseveratore fiscale',
            'slug' => 'fiscal_assev',
            'color' => '#c2b26f'
        ]);
        SubjectRole::create([
            'name' => 'Contribuente',
            'slug' => 'contributor',
            'color' => '#ec55eb'
        ]);
        SubjectRole::create([
            'name' => 'Cessionario credito fiscale',
            'slug' => 'phiscal_transferee',
            'color' => '#d0ec60'
        ]);
        SubjectRole::create([
            'name' => 'Assicuratore',
            'slug' => 'insurer',
            'color' => '#232323'
        ]);
        SubjectRole::create([
            'name' => 'Area Manager',
            'slug' => 'area_manager',
            'color' => '#c6c6c6'
        ]);
        SubjectRole::create([
            'name' => 'Termotecnico progetto efficientamento energetico',
            'slug' => 'technician_energy_efficient',
            'color' => '#fbf4be'
        ]);
        SubjectRole::create([
            'name' => 'Termotecnico APE Post',
            'slug' => 'technician_APE_Post',
            'color' => '#a15f20'
        ]);
        SubjectRole::create([
            'name' => 'Tecnico addetto al Computo Metrico',
            'slug' => 'metric_calc_technician',
            'color' => '#45a170'
        ]);
        SubjectRole::create([
            'name' => 'Generico',
            'slug' => 'generic',
            'color' => ''
        ]);
    }
}

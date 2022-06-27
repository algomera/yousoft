<?php

namespace App\Helpers;

class Interventi
{
    public static function addCondensingBoiler($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->condensing_boilers()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->condensing_boilers()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "potenza_nominale" => $item['potenza_nominale'],
                        "rend_utile_nom" => $item['rend_utile_nom'],
                        "use_destination" => $item['use_destination'],
                        "efficienza_ns" => $item['efficienza_ns'],
                        "efficienza_acs_nwh" => $item['efficienza_acs_nwh'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "classe_termo_evoluto" => $item['classe_termo_evoluto'],
                    ]);
                }
            }
        }
    }

    public static function addHeatPump($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->heat_pumps()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->heat_pumps()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "tipo_di_pdc" => $item['tipo_di_pdc'],
                        "tipo_roof_top" => isset($item['tipo_roof_top']),
                        "potenza_nominale" => $item['potenza_nominale'],
                        "p_elettrica_assorbita" => $item['p_elettrica_assorbita'],
                        "inverter" => isset($item['inverter']),
                        "cop" => $item['cop'],
                        "reversibile" => isset($item['reversibile']),
                        "eer" => $item['eer'],
                        "sonde_geotermiche" => isset($item['sonde_geotermiche']),
                        "sup_riscaldata_dalla_pdc" => $item['sup_riscaldata_dalla_pdc'],
                    ]);
                }
            }
        }
    }

    public static function addAbsorptionHeatPump($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->absorption_heat_pumps()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->absorption_heat_pumps()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "tipo_di_pdc" => $item['tipo_di_pdc'],
                        "tipo_roof_top" => isset($item['tipo_roof_top']),
                        "potenza_nominale" => $item['potenza_nominale'],
                        "gueh" => $item['gueh'],
                        "reversibile" => isset($item['reversibile']),
                        "guec" => $item['guec'],
                        "sup_riscaldata_dalla_pdc" => $item['sup_riscaldata_dalla_pdc'],
                    ]);
                }
            }
        }
    }

    public static function addHybridSystem($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->hybrid_systems()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->hybrid_systems()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "condensing_potenza_nominale" => $item['condensing_potenza_nominale'],
                        "condensing_rend_utile_nom" => $item['condensing_rend_utile_nom'],
                        "condensing_efficienza_ns" => $item['condensing_efficienza_ns'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "heat_tipo_di_pdc" => $item['heat_tipo_di_pdc'],
                        "heat_tipo_roof_top" => isset($item['heat_tipo_roof_top']),
                        "heat_potenza_nominale" => $item['heat_potenza_nominale'],
                        "heat_p_elettrica_assorbita" => $item['heat_p_elettrica_assorbita'],
                        "heat_inverter" => isset($item['heat_inverter']),
                        "heat_cop" => $item['heat_cop'],
                        "heat_sonde_geotermiche" => isset($item['heat_sonde_geotermiche']),
                    ]);
                }
            }
        }
    }

    public static function addMicrogenerationSystem($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->microgeneration_systems()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->microgeneration_systems()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "p_elettrica" => $item['p_elettrica'],
                        "p_immessa" => $item['p_immessa'],
                        "p_term_recuperata" => $item['p_term_recuperata'],
                        "pes" => $item['pes'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "tipo_intervento" => $item['tipo_intervento'],
                        "a_celle_a_combustibile" => isset($item['a_celle_a_combustibile']),
                        "riscaldatore_suppl" => isset($item['riscaldatore_suppl']),
                        "potenza_risc_suppl" => $item['potenza_risc_suppl'],
                        "efficienza_ns" => $item['efficienza_ns'],
                        "classe_energ" => $item['classe_energ'],
                    ]);
                }
            }
        }
    }

    public static function addWaterHeatpumpsInstallation($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->water_heatpumps_installations()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->water_heatpumps_installations()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_scaldacqua_sostituito" => $item['tipo_scaldacqua_sostituito'],
                        "pu_scaldacqua_sostituito" => $item['pu_scaldacqua_sostituito'],
                        "pu_scaldacqua_a_pdc" => $item['pu_scaldacqua_a_pdc'],
                        "cop_nuovo_scaldacqua" => $item['cop_nuovo_scaldacqua'],
                        "capacita_accumulo" => $item['capacita_accumulo'],
                    ]);
                }
            }
        }
    }

    public static function addBiomeGenerator($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->biome_generators()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->biome_generators()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "classe_generatore" => $item['classe_generatore'],
                        "tipo_generatore" => $item['tipo_generatore'],
                        "use_destination" => $item['use_destination'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "p_utile_nom" => $item['p_utile_nom'],
                        "p_al_focolare" => $item['p_al_focolare'],
                        "rend_utile_alla_pot_nom" => $item['rend_utile_alla_pot_nom'],
                        "sup_riscaldata" => $item['sup_riscaldata'],
                    ]);
                }
            }
        }
    }

    public static function addSolarPanel($practice, $items) {
        if($items) {
            foreach ($items as $i => $item) {
                $item['condomino_id'] = self::checkCondominoId($item, $practice);
                if(is_numeric($i)) {
                    $practice->solar_panels()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->solar_panels()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "is_common" => $item['is_common'] ?? false,
                        "condomino_id" => $item['condomino_id'],
                        "sup_lorda_singolo_modulo" => $item['sup_lorda_singolo_modulo'],
                        "num_moduli" => $item['num_moduli'],
                        "sup_totale" => $item['sup_totale'],
                        "certificazione_solar_keymark" => isset($item['certificazione_solar_keymark']),
                        "tipo_di_collettori" => $item['tipo_di_collettori'],
                        "tipo_di_installazione" => $item['tipo_di_installazione'],
                        "inclinazione" => $item['inclinazione'],
                        "orientamento" => $item['orientamento'],
                        "impianto_factory_made" => $item['impianto_factory_made'],
                        "q_col_q_sol" => $item['q_col_q_sol'],
                        "ql" => $item['ql'],
                        "accumulo_in_litri" => $item['accumulo_in_litri'],
                        "destinazione_calore" => $item['destinazione_calore'],
                        "tipo_impianto_integrato_o_sostituito" => $item['tipo_impianto_integrato_o_sostituito'],
                    ]);
                }
            }
        }
    }

    protected static function checkCondominoId($item, $practice) {
        return in_array($item['condomino_id'], $practice->condomini()->pluck('id')->toArray()) ? $item['condomino_id'] : null;
    }
}

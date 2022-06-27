<?php

namespace App\Http\Controllers;

use App\AbsorptionHeatPump;
use App\BiomeGenerator;
use App\CondensingBoiler;
use App\HeatPump;
use App\HybridSystem;
use App\MicrogenerationSystem;
use App\SolarPanel;
use App\WaterHeatpumpsInstallation;

class InterventionController extends Controller
{
    public function deleteCondensingBoilers($id) {
        $condensingBoiler = CondensingBoiler::find($id);
        $condensingBoiler->delete();
    }

    public function deleteHeatPumps($id) {
        $heat_pump = HeatPump::find($id);
        $heat_pump->delete();
    }

    public function deleteAbsorptionHeatPumps($id) {
        $absorption_heat_pump = AbsorptionHeatPump::find($id);
        $absorption_heat_pump->delete();
    }

    public function deleteHybridSystems($id) {
        $hybrid_system = HybridSystem::find($id);
        $hybrid_system->delete();
    }

    public function deleteMicrogenerationSystems($id) {
        $microgeneration_system = MicrogenerationSystem::find($id);
        $microgeneration_system->delete();
    }

    public function deleteWaterHeatpumpsInstallations($id) {
        $water_heatpumps_installation = WaterHeatpumpsInstallation::find($id);
        $water_heatpumps_installation->delete();
    }

    public function deleteBiomeGenerators($id) {
        $biome_generator = BiomeGenerator::find($id);
        $biome_generator->delete();
    }

    public function deleteSolarPanels($id) {
        $solar_panel = SolarPanel::find($id);
        $solar_panel->delete();
    }
}

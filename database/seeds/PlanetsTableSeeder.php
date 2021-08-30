<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Planet;

class PlanetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://swapi.dev/api/planets/');
        if ($response->status() == 200) {
            $response->json();
            $planetsQT = $response['count'];
            for ($i=1; $i < $planetsQT ; $i++) {
                $planet = Http::get("https://swapi.dev/api/planets/$i/");
                if ($planet->status() == 200) {
                    $planet->json();
                    $newPlanet = new Planet();
                    $newPlanet->name = $planet['name'];
                    $newPlanet->rotation_period = $planet['rotation_period'];
                    $newPlanet->orbital_period = $planet['orbital_period'];
                    $newPlanet->diameter = $planet['diameter'];
                    $newPlanet->climate = $planet['climate'];
                    $newPlanet->gravity = $planet['gravity'];
                    $newPlanet->terrain = $planet['terrain'];
                    $newPlanet->surface_water = $planet['surface_water'];
                    $newPlanet->population = $planet['population'];
                    $newPlanet->save();
                }
            }
        }
    }
}

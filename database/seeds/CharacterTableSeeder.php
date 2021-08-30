<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Character;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://swapi.dev/api/people/');
        if ($response->status() == 200) {
            $response->json();
            $characterQT = $response['count'];
            for ($i=1; $i < $characterQT ; $i++) { 
                $character = Http::get("https://swapi.dev/api/people/$i/");
                if ($character->status() == 200){
                    $character->json();
                    $newCharacter = new Character();
                    $newCharacter->name = $character['name'];
                    $newCharacter->height = $character['height'];
                    $newCharacter->mass = $character['mass'];
                    $newCharacter->hair_color = $character['hair_color'];
                    $newCharacter->skin_color = $character['skin_color'];
                    $newCharacter->eye_color = $character['eye_color'];
                    $newCharacter->birth_year = $character['birth_year'];
                    $homeworld = $character['homeworld'];
                    $spliced = explode("/", $homeworld);
                    $planetID = $spliced[5];
                    $newCharacter->planet_id = $planetID;
                    $newCharacter->save();
                }
                
            }
        }
    }
}

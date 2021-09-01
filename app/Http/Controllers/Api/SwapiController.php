<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Planet;
use App\Character;


class SwapiController extends Controller
{
    public function allPeople()
    {
        $people = Character::paginate(10);
        return response()->json($people, 200);
    }
    
    public function PeopleWithPlanet(Request $request)
    {
        $singlePeople = Character::where('id' , $request->id)->with('planet')->get();
        
        return response()->json($singlePeople);
    }

}

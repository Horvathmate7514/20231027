<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    function actors(){
       $actors = DB::table('actor')->get();
       return $actors;

    }
    function actorsByLastName($lastname){
        $actors = DB::table('actor')
                    ->where('last_name', '=', $lastname)
                    ->get();
        return $actors;

    }

    function actorsByName($lastname, $firstname){
        $actors = DB::table('actor')
                    ->where('last_name', '=', $lastname)
                    ->where('first_name', '=', $firstname)

                    ->get();
        return $actors;
    }


    function countActors(){
        $actors = DB::table('actor')
                    ->select('last_name', DB::raw('COUNT(*) AS actor_count'))
                    ->groupBy('last_name')
                    ->get();
        return $actors;

    }
}

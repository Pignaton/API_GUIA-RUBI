<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $array = ['error' => '', 'places' => []];

        $text = $request->input('text');
        if ($text) {
            $placeList = Place::where('name', 'like', '%' . $text . '%')->get();

            foreach ($placeList as $placeItem) {
                $array['places'][] = [
                    'name' => $placeItem['name']
                ];
            }
        } else {
            $array['error'] = 'Digite algo para pesquisar';
        }

        return $array;
    }
}

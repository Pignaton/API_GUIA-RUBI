<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Place;
use App\PlaceCategory;
use App\Category;

class categoryController extends Controller
{
    public function list(Request $request)
    {
        $array = ['error' => ''];
        $category = $request->input('category');

        if ($category) {
            $listAll = DB::table('places')  
                ->select('places.id', 'places.name', 'places.user_id', 'places.image', 'places.address',
                 'places.phone', 'places.website', 'places.description', 'places.latitude', 'places.longitude', 'places.last_update')
                ->join('place_category', 'places.id', '=', 'place_category.category_id')
                ->join('category', 'place_category.category_id', '=', 'category.id')
                ->where('category.name', 'like', '%' . $this->refatorar($category) . '%')->get();

            foreach ($listAll as $listItem) {

                return $array['result'][] = [
                    'id' => $listItem->id,
                    'userId' => $listItem->user_id,
                    'name' => $listItem->name,
                    'image' => url('media/places/' . $listItem->image),
                    'address' => $listItem->address,
                    'phone' => $listItem->phone,
                    'website' => $listItem->website,
                    'description' => $listItem->description,
                    'latitude' => $listItem->latitude,
                    'longitude' => $listItem->longitude,
                    'lastUpdate' => $listItem->last_update,
                ];
            }
        } else {
            $array['result'] = 'Sem categoria adicionado';
        }

        return $array;
    }

    public function refatorar($text)
    {

        $array = '_';

        if (stripos($text, $array) !== false) {
            $newText = str_replace('_', ' ', $text);
            return $newText;
        } else {
            return $text;
        }
    }
}

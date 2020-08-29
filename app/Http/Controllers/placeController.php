<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Place;
use App\PlaceCategory;

class placeController extends Controller
{
    public function create(Request $request)
    {
        $array = ['error' => ''];

        $image = $request->file('image');
        $name = $request->input('name');
        $address = $request->input('address');
        $category = $request->input('category');
        $phone = $request->input('phone');
        $website = $request->input('website');
        $description = $request->input('description');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $lastupdate = $request->input('lastupdate');

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $array['error'] = $validator->errors();
        } else {

            $filename = $this->validatorImage($image);

            if (!empty($filename['error'])) {
                $array = $filename;
            } else {

                $place = new Place();
                $place->name = $name;
                $place->image = $filename['image'];
                $place->address = $address;
                $place->phone = $phone;
                $place->website = $website;
                $place->description = $description;
                $place->latitude = $latitude;
                $place->longitude = $longitude;
                $place->last_update = $lastupdate;
                $place->save();
                $lastInsertId = $place->id;

                $placeCategory = new PlaceCategory();
                $placeCategory->place_id = $lastInsertId;
                $placeCategory->category_id = $category;
                $placeCategory->save();

                $array['success'] = 'Create Place';
            }
        }

        return $array;
    }

    public function validatorImage($image)
    {
        $array = ['error' => ""];

        $allowedType = ['image/jpg', 'image/jpeg', 'image/png'];

        if ($image) {
            if (in_array($image->getClientMimeType(), $allowedType)) {

                $filename = md5(time() . rand(0, 9999)) . '.jpg';

                $destPath = public_path('/media/places');

                $img = Image::make($image->path())->save($destPath . '/' . $filename);

                // $array['url'] = url('media/places' . $filename);
                $array['image'] = $filename;
            } else {
                $array['error'] = 'Arquivo não suportado!';
            }
        } else {
            $array['error'] = 'Arquivo não enviado!';
        }

        return $array;
    }

    public function validator(array $datas)
    {
        return Validator::make($datas, [
            'name' => 'required|string|max:100',
            'address' => 'required|max:100',
            'phone' => 'numeric|min:25',
            'website' => 'string|max:100',
            'description' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'category' => 'required',
        ]);
    }
}

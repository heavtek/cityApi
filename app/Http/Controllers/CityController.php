<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    private static array $cities = [
        ['id' => 1, 'name' => 'Addis Ababa'],
        ['id' => 2, 'name' => 'Adama'],
    ];

    public function getAllCites()
    {
        return response()->json(self::$cities);
    }

    public function getCityById($id)
    {
        $city = collect(self::$cities)->firstWhere('id', (int) $id);

        if (! $city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        return response()->json($city);
    }

    public function store(Request $request)
    {
        $city = [
            'id' => count(self::$cities) + 1,
            'name' => $request->name,
        ];

        self::$cities[] = $city;

        return response()->json($city, 201);
    }

    public function update(Request $request, $id)
    {
        foreach (self::$cities as &$city) {
            if ($city['id'] == $id) {
                $city['name'] = $request->name;
                return response()->json($city);
            }
        }

        return response()->json(['message' => 'City not found'], 404);
    }

    public function deleteCity($id)
    {
        foreach (self::$cities as $key => $city) {
            if ($city['id'] == $id) {
                array_splice(self::$cities, $key, 1);
                return response()->json(['message' => 'City deleted']);
            }
        }

        return response()->json(['message' => 'City not found'], 404);
    }
}

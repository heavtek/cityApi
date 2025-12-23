<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    private static array $cities = [
        ['id' => 1, 'name' => 'Addis Ababa'],
        ['id' => 2, 'name' => 'Bahir Dar'],
    ];

    public function index()
    {
        return response()->json(self::$cities);
    }

   
}

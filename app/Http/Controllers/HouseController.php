<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    public function create()
    {
        return view('houses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:houses',
        ]);

        $house = House::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('house.index');

    }

    public function edit(House $house)
    {
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required|unique:houses,name, '. $id,
        ]);

        $house = House::where('id', $id)
            ->update([
                'name' => $request->input('name')
            ]);

        return redirect()->route('house.index');
    }

    public function destroy(House $house)
    {
        $house->delete();
        return redirect()->route('house.index');
    }

}

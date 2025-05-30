<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_city = City::with('province')->get();
        return view('city.index', ["list_city" => $list_city]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_province = Province::all();
        return view('city.form-create', ["list_province"=> $list_province ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'province_id' => 'required',
        ]);

        City::create($validated);

        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        $list_province = Province::all();
        return view('city.edit', ['city' => $city, 'list_province' => $list_province]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'province_id' => 'required',
        ]);

        $city = City::find($id);
        $city->update($validation);

        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        City::destroy($id);
        return redirect()->route('city.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_province = Province::all();
        return view('provinces.index', ['list_province' => $list_province]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('province.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        Province::create($validated);

        return redirect()->route('province.index');
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
        $province = Province::find($id);
        return view('province.edit-province', ['province' => $province]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Nama Provinsi harus diisi',
        ]);

        Province::find($id)->update($validation);
        return redirect()->route('province.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Province::destroy($id);
        return redirect()->route('province.index');
    }
}

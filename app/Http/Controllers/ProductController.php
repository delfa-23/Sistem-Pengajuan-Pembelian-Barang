<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\unit;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit as XmlUnit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_product = Product::with(['categorie', 'unit'])->get();
        return view('product.index', ["list_product" => $list_product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_category = Categorie::all();
        $list_unit = Unit::all();
        return view('product.create', [
            "list_categorie"=> $list_category,
            "list_unit" => $list_unit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'barcode' => 'required',
            'categorie_id' => 'required',
            'unit_id' => 'required',
            'selling_price' => 'required',
            'image' => 'required'
        ]);

        Product::create($validated);

        return redirect()->route('product.index');
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
        $product = Product::find($id);
        $list_category = Categorie::all();
        $list_unit = Unit::all();
        return view('product.edit', [
            'product' => $product, 'list_category' => $list_category, 'list_unit' => $list_unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'categorie_id' => 'required',
            'unit_id' => 'required',
            'barcode' => 'required',
            'image' => 'required',
            'selling_price' => 'required',
        ]);

        $product = Product::find($id);
        $product->update($validation);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('product.index');
    }
}

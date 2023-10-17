<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::with('categories')->get();

        $categories = Category::with('products')->get();

        return view('products.index', [
            'data' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show(Request $request) {
        $searchQueryString = $request->query()['search'] ?? ''; // Nog beveiliging toevoegen

        // Haalt de tags eruit en als het leeg is een array
        $tags = $request->query()['tags'] ?? [];

        // Zet array om in een lange string om zodadelijk voor het zoeken te gebruiken
        $stringifiedTags = implode(" ", $tags) ?? '';

        // Voegt categorieen van de checkboxes als string aan de zoekveldstring
        $totalSearchquery = $searchQueryString . $stringifiedTags;

        // Zoek dmv een string de product model in de mogelijke kolommen
        $products = Product::search($totalSearchquery, ['name', 'price', 'categories.name'])->get();

        // Om categorien in filtermenu te selecteren
        $categories = Category::with('products')->get();

        return view('products.index', [
            'data' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product) {
        // validatie toevoegen
        $product->where('id', $product->id)->first();
        $product->status = $request->post('status') ?? '0';
        $product->save();


        // add a redirect to products

        return redirect()->route('products.index')->with(['success_message' => $product->name]); //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        //
    }
}

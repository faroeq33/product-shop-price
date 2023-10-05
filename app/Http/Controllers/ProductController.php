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
        $data = DB::table('products')->select('name', 'price')->get();

        return view('products.index', ['data' => $data]);  //
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
        $sanitisedSearchQuery = $request->query()['search']; // Add security for sanitising

        $data = Product::search($sanitisedSearchQuery, ['name', 'price', 'categories.name'])->get();
        $categories = Category::find([2, 3]);

        $product = Product::create([
            'name'  =>  'Home Brixton Faux Leather Armchair',
            'price' =>  199.99,
        ]);

        $product->categories()->attach($categories);


        return view('products.index', ['data' => $data]);  //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        //
    }
}

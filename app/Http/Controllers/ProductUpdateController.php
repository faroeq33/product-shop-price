<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Deze controller is gemaakt voor het veranderen van de status zonder refresh (AJAX)
 */

class ProductUpdateController extends Controller {

    public function update(Request $request) {
        $incomingProductId = $request->post('product')['id'];
        $incomingProductStatus = $request->post('product')['status'];

        $myProduct = Product::where('id', $incomingProductId)->first();

        // Wijzig statusveld in de database, als er geen statuswaarde uit request is maak het 0.
        $myProduct->status = $incomingProductStatus ?? '0';

        // Wijziging doorvoeren
        $myProduct->save();

        return response()->json(['success' => $myProduct->name]);
    }
}

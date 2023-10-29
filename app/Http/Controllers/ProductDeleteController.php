<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductDeleteController extends Controller {
    private function applyAuthRules() {
        if (Product::count() > 10) {
            Gate::define('delete', function (User $user) {
                return Auth::check();
            });
        }
    }

    public function delete($product) {
        // verwijderen mag alleen als je member bent
        $this->applyAuthRules();

        return view('products.delete', [
            'product' => Product::findOrFail($product),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $this->applyAuthRules();

        if (Gate::denies('delete', Product::class)) {
            // Denied access
            // abort(403, 'Unauthorized action.');
            return redirect('/products')->with('warning', 'Pas als je meer dan 10 producten hebt mag je ze verwijderen!');
        }

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('success', 'Successfully deleted ' . $product->name . '!');
    }
}

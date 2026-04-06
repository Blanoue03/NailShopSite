<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class StoreController extends Controller
{
    private function getMockProducts(): array
    {
        return [
            ['id' => 1, 'name' => 'PRODUCT 1', 'price' => 25.00, 'description' => 'Nail polish or product description', 'full_description' => 'Full detailed description for product 1. Great for everyday wear.'],
            ['id' => 2, 'name' => 'PRODUCT 2', 'price' => 30.00, 'description' => 'Nail polish or product description', 'full_description' => 'Full detailed description for product 2. Long-lasting formula.'],
            ['id' => 3, 'name' => 'PRODUCT 3', 'price' => 35.00, 'description' => 'Nail polish or product description', 'full_description' => 'Full detailed description for product 3. Vibrant color collection.'],
            ['id' => 4, 'name' => 'PRODUCT 4', 'price' => 40.00, 'description' => 'Nail polish or product description', 'full_description' => 'Full detailed description for product 4. Premium finish.'],
            ['id' => 5, 'name' => 'PRODUCT 5', 'price' => 28.00, 'description' => 'Nail polish or product description', 'full_description' => 'Full detailed description for product 5. Chip-resistant coating.'],
            ['id' => 6, 'name' => 'PRODUCT 6', 'price' => 32.00, 'description' => 'Nail polish or product description', 'full_description' => 'Full detailed description for product 6. Quick-dry formula.'],
        ];
    }

    public function index()
    {
        return Inertia::render('Store', [
            'products' => $this->getMockProducts(),
        ]);
    }

    public function show($id)
    {
        //$product = Product::findOrFail($id);
        $products = $this->getMockProducts();
        $product = collect($products)->firstWhere('id', (int) $id);

        if (!$product) {
            abort(404);
        }

        return Inertia::render('ProductDetails', [
            'product' => $product,
        ]);
    }
}

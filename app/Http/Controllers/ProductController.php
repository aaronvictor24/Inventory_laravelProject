<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockReport;

class ProductController extends Controller
{
    
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass products to the view
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $products = Product::all();  
        return view('products.create', compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'low_stock_threshold' => 'required|integer',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    /**
     * Load StockRecords
     */
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'low_stock_threshold' => 'required|integer',
        ]);

        $previousStock = $product->quantity;
        $newStock = $request->quantity;

        $product->update([
            'name' => $request->name,
            'quantity' => $newStock,
            'low_stock_threshold' => $request->low_stock_threshold,
        ]);

        

        return redirect()->route('products.index', $product->id)->with('success', 'Stock updated successfully');
    }



    /**
    * Update the stock level of a product.
    */ 
    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);
    
        // Get the previous stock level before update
        $previousStock = $product->quantity;
    
        // Update the product stock
        $product->update([
            'quantity' => $request->quantity,
        ]);
    
        // Get the updated stock value
        $updatedStock = $product->quantity;
    
        // Save stock change to the StockReport table
        StockReport::create([
            'product_id' => $product->id,
            'previous_stock' => $previousStock,
            'updated_stock' => $updatedStock,
            'change' => $updatedStock - $previousStock,
            'updated_at' => now(), // Ensure timestamp is saved
        ]);
    
        // Check if stock is below threshold
        if ($product->quantity <= $product->low_stock_threshold) {
            return redirect()->route('products.index')->with('warning', 'Warning: Low stock for ' . $product->name . '!');
        }
    
        return redirect()->route('products.index')->with('success', 'Stock updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect back with success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

}

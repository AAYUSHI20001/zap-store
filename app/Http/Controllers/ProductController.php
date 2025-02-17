<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Product creation started');
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|unique:products',
                'description' => 'nullable|string',
                'category' => 'nullable|string',
                'purchase_price' => 'required|numeric|min:0',
                'selling_price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'alert_quantity' => 'nullable|integer|min:0',
                'image' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $imageName = Str::slug($request->name) . '-' . time() . '.' . $file->extension();
                    // Store in the storage/app/public/products directory
                    $file->move(public_path('storage/products'), $imageName);
                    $validated['image'] = 'products/' . $imageName;
                }
            }

            $product = Product::create($validated);

            return redirect()->route('products.index')
                ->with('success', 'Product created successfully.');
            
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return back()->with('error', 'Error creating product: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|unique:products,code,' . $product->id,
                'description' => 'nullable|string',
                'category' => 'nullable|string',
                'purchase_price' => 'required|numeric|min:0',
                'selling_price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'alert_quantity' => 'nullable|integer|min:0',
                'image' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('image')) {
                // Delete old image
                if ($product->image) {
                    $oldImagePath = public_path('storage/' . $product->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $file = $request->file('image');
                if ($file->isValid()) {
                    $imageName = Str::slug($request->name) . '-' . time() . '.' . $file->extension();
                    $file->move(public_path('storage/products'), $imageName);
                    $validated['image'] = 'products/' . $imageName;
                }
            }

            $product->update($validated);

            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully.');
                
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            return back()->with('error', 'Error updating product: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/products/' . $product->image);
        }
        
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
} 
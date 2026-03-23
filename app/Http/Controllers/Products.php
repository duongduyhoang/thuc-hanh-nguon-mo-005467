<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách sản phẩm";

      
        $categories = \App\Models\Category::all();

   
        $products = Product::query()
            ->when($request->category_id, function ($query, $categoryId) {
              
                return $query->where('category_id', $categoryId);
            })
            ->latest() 
            ->get();

        return view('product.prd', compact('products', 'title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('product.prd_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);


        $data = $request->all();


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }


        Product::create($data);

        return redirect()->route('prd')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
    
        return view('product.detail_prd', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        return view('product.update_prd', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $product = Product::findOrFail($id);


        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate ảnh
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

 
        if ($request->hasFile('image')) {
            
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            
            $path = $request->file('image')->store('products', 'public');

          
            $product->image = $path;
        }


        $product->save();

        return redirect()->route('prd')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::destroy($id);
        return redirect()->route('prd');
    }
}

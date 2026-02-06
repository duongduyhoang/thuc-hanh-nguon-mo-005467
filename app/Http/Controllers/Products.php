<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //lấy tất cả sản phẩm
        $products = Product::all();
        $title = "Danh sách sản phẩm";
        return view('product.prd', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product.prd_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric|max:9999999999',
            'stock' => 'required|integer'
        ]);

        Product::create($request->all());

        return redirect()->route('prd');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        // Trả về trang chỉ để xem thông tin
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

        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric|max:9999999999',
            'stock' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);

        // Ép kiểu dữ liệu về số chuẩn để Database không từ chối
        $product->name = $request->name;
        $product->price = (float) $request->price;
        $product->stock = (int) $request->stock; // Ép "10.00" về số 10 tròn trịa

        $product->save();
        // $product->update($request->all());

        return redirect()->route('prd');
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

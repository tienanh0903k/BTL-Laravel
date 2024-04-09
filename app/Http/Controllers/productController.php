<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.products.index', compact('product'));
    }

    public function productCart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.create', [
            'categories' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $product = new Product;
    $product->title = $request->input('title');
    $product->price = $request->input('price');
    $product->discount = $request->input('discount');
    $product->description = $request->input('description');
    $product->category_id = $request->input('category_id');

    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/product/', $filename);
        $product->thumbnail = $filename;
    }

    $product->save();

    return redirect()->back()->with('status', 'Product added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $category = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', [
            'categories' => $category,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //tim student theo id
        $product = product::find($id);
        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->description = $request->input('description');

        if ($request->hasFile('thumbnail')) {
            //co file dinh kem trong form update thi tim file cu va xoa di
            //neu truoc do ko co anh dai dien cu thi ko xoa
            $anhcu = 'uploads/product/' . $product->thumbnail;
            if (File::exists($anhcu)) {
                File::delete($anhcu);
            }
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);  //upload len thu muc uploads/students
            $product->thumbnail = $filename;
        }
        $product->update();
        return redirect()->route('products')->with('success', 'product updated successfully');
        //return redirect()->back()->with('status', 'Cap nhat sinh vien voi anh dai dien thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'product deleted successfully');
    }


}

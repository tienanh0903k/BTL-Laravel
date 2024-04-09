<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    public function getAll()
    {
        $categories = DB::table('category')->get();
        $products = DB::table('product')->get();
        return view(
            'index',
            [
                'cates' => $categories,
                'products' => $products
            ]
        );
    }

    public function detail(Request $request)
    {
        $id = $request->query('id');
        $product = DB::table('product')->where('id', $id)->first();
        $similar = DB::select('Call sp_similar(?)', [$id]);
        //dd($similar);
        return view(
            'shop',
            [
                'product' => $product,
                'similar' => $similar
            ]
        );
    }



    public function getCategoryProducts($categoryId)
    {
        $category = category::findOrFail($categoryId);
        $products = $category->products;
        return response()->json($products);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $listPr = $this->getProByOption($request);
        $categories = Category::all();

        return view('products', [
            'listPr' => $listPr,
            'categories' => $categories
        ]);
    }

    public function getProByOption(Request $request)
    {
        $sortBy = $request->sort_by ?? 'latest';
        $query = Product::join('category', 'product.category_id', '=', 'category.id')
                        ->select('product.*', 'category.name as category_name');

        // Lọc theo danh mục nếu có
        if ($request->has('cate')) {
            $query->where('product.category_id', $request->cate);
        }

        switch ($sortBy) {
            case 'latest':
                $query->orderBy('product.id', 'desc');
                break;
            case 'oldest':
                $query->orderBy('product.id', 'asc');
                break;
            default:
                $query->orderBy('product.id', 'desc');
        }

        return $query->paginate(6);
    }



    /**
     *------------------------------------------ ADMIN----------------------------------------------------------------
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
}

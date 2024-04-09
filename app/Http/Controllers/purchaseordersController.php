<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\purchaseorders;
use App\Models\purchaseorder_details;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class purchaseordersController extends Controller
{
    public function index()
    {
        $listHDN = DB::table('purchaseorders')
                ->join('supplier', 'purchaseorders.supplier_id', '=', 'supplier.id')
                ->select('purchaseorders.*', 'supplier.name')
                ->paginate(10);
        //dd($listHDN);
        return view('admin.importbill.index', [
            'listHDN' => $listHDN
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listProducts = session('products') ?? [];
        //dd($listProducts);

        $products = product::all();
        $suppliers = supplier::all();
        return view('admin.importbill.create', [
            'products' => $products,
            'suppliers' => $suppliers,
            'listProducts' => $listProducts
        ]);
    }


    public function postImport(Request $request) {
        $request ->validate([
            'supplier_id' => 'required',
            'ngaynhap' => 'required',
            'status' => 'required',
            'total_price' => 'required',
        ], [
            'supplier_id.required' => 'Nhà phân phối bắt buộc phải chọn',
            'ngaynhap.required' => 'Nhân viên nhập bắt buộc phải chọn',
            'status.required' => 'Kiểu thanh toán bắt buộc phải chọn'
        ]);

        $billData = [
            "supplier_id" => $request->input("supplier_id"),
            "order_date" => $request->input("ngaynhap") ,
            "status" => $request->input("status"),
            "total_money" => $request->input("total_price"),
        ];
        //dd($billData);
        //dd($request->session()->all());
        //$products = $request->session()->get('products');
        // foreach ($products as $item) {
        //     dd($item);
        // }


        $bill = new purchaseorders($billData);
        $bill->save();

        //dd($customerData);
        $products = $request->session()->get('products');
        foreach ($products as $item) {
            $chitiet = new purchaseorder_details([
                'purchase_order_id' => $bill->id,
                'product_id' => $item['id'],
                'price' =>  $item['price'],
                'quantity' =>  $item['quantity'],
                'total_money' =>  $item['price']*$item['quantity'],
            ]);
            $chitiet->save();
        }
        $request->session()->forget('products');
        return redirect()->route('purchaseorders.index')->with('success', 'Thêm thành công');
    }


    public function saveProducts(Request $request)
    {
        $productId = $request->input('products')[0]['id'];
        $productName = Product::findOrFail($productId)->title;
        $productPrice = $request->input('price');
        $productQty = $request->input('quantity');
        //dd($request->session()->all());


        if (!$request->session()->has('products')) {
            $products = [];
        } else {
            $products = $request->session()->get('products');
        }
        $products[] = [
            'id' => $productId,
            'title' => $productName,
            'price' => $productPrice,
            'quantity' => $productQty,
            'total_price' => $productPrice*$productQty,
        ];

        //dd($products);
        //dd($request->session()->all());
        //$request->session()->forget('products');

        $request->session()->put('products', $products);

        return redirect()->back();
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
    public function show($id)
    {

        $hoadonnhap = purchaseorders::with('supplier')->findOrFail($id);

        $data_CTHDN_SP = purchaseorder_details::join('product', 'purchaseorder_details.product_id', '=', 'product.id')
            ->where('purchaseorder_details.purchase_order_id', $id) // Thay 'purchase_order_id' bằng tên trường thích hợp
            ->select('purchaseorder_details.*', 'product.*')
            ->get();

        //dd($data_CTHDN_SP,  $hoadonnhap);

        return view('admin.importbill.show', [
            'hoadonnhap' => $hoadonnhap,
            'data_CTHDN_SP' => $data_CTHDN_SP
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(purchaseorders $purchaseorders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchaseorders $purchaseorders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchaseorders $purchaseorders)
    {
        //
    }
}

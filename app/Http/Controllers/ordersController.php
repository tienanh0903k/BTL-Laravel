<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Helper\Cart;
use App\Models\order_detail;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function viewCheckout(Cart $cart)
    {
        $cartItems = $cart->listCart();
        //dd($cartItems);
        return view('checkout', compact('cartItems'));
    }


    public function addOrders(Request $request) {
        $currentDate = Carbon::now();
        $formattedDate = $currentDate->format('Y-m-d');

        $customerData = [
            'user_id' => $request->input('id'),
            'fullname' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'order_date' => $formattedDate,
            'status' =>$request->input('payment_method') == 'vnpay' ? 1: 0,
            'total_money' => $request->input('total_price'),
        ];

        $order = new orders($customerData);
        $order->save();

        //dd($customerData);
        $cart = $request->session()->get('cart');
        foreach ($cart as $item) {
            $chitiet = new order_detail([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'num' => $item['quantity'],
                'total_money' => $item['price'] * $item['quantity'],
            ]);
            $chitiet->save();
        }
        $request->session()->forget('cart');
    }


    public function checkOut(Request $request) {

        $this->addOrders($request);
        return redirect()->route('checkout.index')->with('msg', 'Đặt hàng thành công');
    }

    // Ngân hàng NCB
    // Số thẻ	9704198526191432198
    // Tên chủ thẻ	NGUYEN VAN A
    // Ngày phát hành 07/15
    // Mật khẩu OTP	123456



    public function vn_Payment(Request $request)
    {
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "8V0HD6JK";
        $vnp_HashSecret = "FQGXLADAEYWSKHCBDEYOEEWHVMTFDKDW";
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8003/return-vnpay";
        //dd($request->input('total_price'));
        $vnp_TxnRef = rand(1,10000);
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('total_price') * 100;
        $vnp_BankCode = "NCB";
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        session(['id' => 1]);
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef

        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        //redirect()->route('return.vnpay');
        //thanh toan
        //$this->addOrders($request);
        return redirect($vnp_Url);
    }


    public function return(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        //$url = session('url_prev','/');
        if ($vnp_ResponseCode === '00') {
            dd(session()->all());
            //return redirect()->route('checkout.index')->with('msg', 'Đặt hàng thành công');
        } else {
            dd('Ko Thanh cong');
        }
    }












    /**
     * Show the form for creating a new resource.
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
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}

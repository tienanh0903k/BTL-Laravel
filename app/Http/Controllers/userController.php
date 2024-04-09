<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Helper\Cart;

class userController extends Controller
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

    public function checkOut(Request $request) {
        //validate form laravel
        // $this->validate($request, [
        //     'name' =>'required',
        //     'email' =>'required|email',
        //     'phone' =>'required',
        //     'address' =>'required',
        //     'city' =>'required',
        //     'country' =>'required',
        //     'postal_code' =>'required',
        // ]);
        // //get data from form
        // $customerData = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'country' => $request->country,
        //     'postal_code' => $request->postal_code,
        // ];
        // //insert data to database
        // $customer = DB::table('customers')->insert($customerData);
        // //redirect to home page
        // return redirect()->route('home');
        $currentDate = Carbon::now();
        $formattedDate = $currentDate->format('Y-m-d');

        $customerData = [
            'id' => $request->input('id'),
            'fullname' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'order_date' => $formattedDate,
            'status' => 'Chưa thanh toán',
            'total_money' => $request->input('total_price'),
        ];


        dd($customerData);
        // $user = new user();
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->phone = $data['phone'];
        // $user->address = $data['address'];
        // $user->city = $data['city'];
        // $user->state = $data['state'];
        // $user->country = $data['country'];
        // $user->zip = $data['zip'];
        // $user->save();
        // return redirect()->back()->with('success', 'Your order has been placed');
    }




    public function create()
    {

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
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}

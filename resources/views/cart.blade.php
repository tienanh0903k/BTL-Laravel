@extends('layout')
@section('sidebar')
<div class="col-lg-3">
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>All departments</span>
        </div>
        <ul style="display: none;">
            <li><a href="#">Fresh Meat</a></li>
            <li><a href="#">Vegetables</a></li>
            <li><a href="#">Fruit &amp; Nut Gifts</a></li>
            <li><a href="#">Fresh Berries</a></li>
            <li><a href="#">Ocean Foods</a></li>
            <li><a href="#">Butter &amp; Eggs</a></li>
            <li><a href="#">Fastfood</a></li>
            <li><a href="#">Fresh Onion</a></li>
            <li><a href="#">Papayaya &amp; Crisps</a></li>
            <li><a href="#">Oatmeal</a></li>
            <li><a href="#">Fresh Bananas</a></li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $key => $value)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('uploads/product/'.$value['image'])}}" alt="" width="50px">
                                        <h5>{{ $value['name'] }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ $value['price'] }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $value['quantity'] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ $value['price'] * $value['quantity'] }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="shoping__checkout" >
                    <h5>Tổng tiền</h5>
                    <ul>
                        <li>Total <span>{{number_format($cart->sumPrice(), 0, ',', '.')}} đ</span></li>
                    </ul>
                    <a href="{{route('checkout.index')}}" class="primary-btn">THANH TOÁN</a>
                </div>
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#" style="display: flex; align-items: center;">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

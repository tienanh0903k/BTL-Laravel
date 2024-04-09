@extends('admin.layoutAdmin')

@section('title', 'Create Product')

@section('content')
    <h2 class="mb-0">Thêm hóa đơn nhập</h2>
    <hr />
    <form action="{{ route('importbill.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col mb-3">
                <label for="title">Tên nhà cung cấp</label>
                    <select name="supplier_id" class="form-control" id="category_id">
                        <option value="">-- Chọn nhà cung cấp --</option>
                        @foreach($suppliers as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col mb-3">
                <label for="price">Ngày nhập:</label>
                <input type="date" id="ngaynhap" name="ngaynhap" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="discount">Trạng thái:</label>
            <select name="status" class="form-control" id="category_id">
                    <option value="1">Đã thanh toán</option>
                    <option value="0">Chưa thanh toán</option>
            </select>
        </div>
            @php
                $totalPrice = 0;
                    foreach ($listProducts as $item) {
                        $totalPrice += $item['total_price'];
                    }
                    //dd($totalPrice);
            @endphp
            <input type="hidden" name="total_price" value="{{$totalPrice}}">
        <button type="submit" class="btn btn-primary" style="margin-left: 80%;">Lưu thông tin</button>
    </form>

    <form action="{{route('save.products')}}" method='POST'>
        @csrf
        <div class="form-group">
            <label for="category_id">Nhập sản phẩm:</label>
            <select name="products[0][id]" class="form-control" id="category_id">
                <option value="">-- Select Product --</option>
                @foreach($products as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="title">Giá nhập:</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Enter price">
            </div>
            <div class="col mb-3">
                <label for="price">Số lượng:</label>
                <input type="number" name="quantity" class="form-control" id="price" placeholder="Enter quantity">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>


        <div class="row" style="margin-top: 20px">
            <div class="col-12 col-s-12 padding-box" style="font-size: 1.8rem; text-align: center;">Thông tin sản phẩm</div>
            <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th rowspan="1" colspan="1">Tên sản phẩm</th>
                        <th rowspan="1" colspan="1">Giá nhâp</th>
                        <th rowspan="1" colspan="1">Số lượng</th>
                        <th rowspan="1" colspan="1">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($listProducts))
                        @foreach ($listProducts as $item)
                            <tr>
                                <td class="align-middle">{{ $item['title'] }}</td>
                                <td class="align-middle">{{ $item['price'] }}</td>
                                <td class="align-middle">{{ $item['quantity'] }}</td>
                                <td class="align-middle">{{ $item['total_price'] }}</td>
                                {{-- <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">{{ $item->id }}</td>
                                <td class="align-middle">{{ $item->price }}</td> --}}
                                {{-- <td class="align-middle">
                                    <img src="{{ asset('uploads/product/'.$item->thumbnail)}}" width="70px" height="70px" alt="Anh dai dien" />
                                </td>
                                <td class="align-middle">{{ $item->total_money }}</td> --}}
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div>

            </div>
        </div>


@endsection

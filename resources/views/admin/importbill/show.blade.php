@extends('admin.layoutAdmin')
@section('title', 'Show Product')

@section('content')
    <h1 class="mb-0">Chi tiết hóa đơn nhập</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title"  readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price"  readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">product_code</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code"  readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" readonly></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="" readonly>
        </div>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-12 col-s-12 padding-box" style="font-size: 1.8rem; text-align: center;">Thông tin sản phẩm</div>
        <div class="col-sm-12">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th rowspan="1" colspan="1">Tên nhà cung cấp</th>
                    <th rowspan="1" colspan="1">Đơn giá</th>
                    <th rowspan="1" colspan="1">Số lượng</th>
                    <th rowspan="1" colspan="1">Tổng tiền</th>
                    <th rowspan="1" colspan="1">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($data_CTHDN_SP))
                    @foreach ($data_CTHDN_SP as $item)
                        <tr>
                            <td class="align-middle">{{ $item->title }}</td>
                            <td class="align-middle">{{ $item->price }}</td>
                            <td class="align-middle">{{ $item->id }}</td>
                            <td class="align-middle">
                                <img src="{{ asset('uploads/product/'.$item->thumbnail)}}" width="70px" height="70px" alt="Anh dai dien" />
                            </td>
                            <td class="align-middle">{{ $item->total_money }}</td>
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

@extends('admin.layoutAdmin')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card-body">
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Hoá đơn nhập hàng</h5>
                <a href="{{route('purchaseorders.create')}}" class="btn btn-primary">+ Thêm</a>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div id="dataTable_filter" class="dataTables_filter">
                            <form action="" method="GET" style="display: flex;">
                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                    </div>
                </div>
             </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-sm-12">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th rowspan="1" colspan="1">Tên nhà cung cấp</th>
                    <th rowspan="1" colspan="1">Ngày nhập</th>
                    <th rowspan="1" colspan="1">Trang thái</th>
                    <th rowspan="1" colspan="1">Tổng tiền</th>
                    <th rowspan="1" colspan="1">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listHDN as $item)
                <tr>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{date('d-m-Y', strtotime($item->order_date))}}</td>
                    <td class="align-middle">{{$item->status == 1 ? 'Con hang' : 'Het hang'}}</td>
                    <td class="align-middle">{{$item->total_money}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('purchaseorders.show', $item->id)}}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="" type="button" class="btn btn-warning">Edit</a>
                            <form action="" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>

        </div>
    </div>
</div>
@endsection

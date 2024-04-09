@extends('admin.layoutAdmin')
@section('title', 'Supplier')
@section('content')
<div class="card-body">
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Danh sách nhà cung cấp</h5>
                <a href="{{route('supplier.create')}}" class="btn btn-primary">+ Thêm</a>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                   <div class="dataTables_length" id="dataTable_length">
                      <label>
                         Show
                         <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                         </select>
                      </label>
                   </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label>Search:
                            <form action="{{ route('supplier.search') }}" method="GET" style="display: flex;">
                                <input type="text" name="q" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </label>
                    </div>
                </div>
             </div>
    <div class="row">
        <div class="col-sm-12">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th rowspan="1" colspan="1">Tên nhà cung cấp</th>
                    <th rowspan="1" colspan="1">Địa chỉ </th>
                    <th rowspan="1" colspan="1">SDT</th>
                    <th rowspan="1" colspan="1">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $rs)
                    <tr class="odd">
                        <td class="sorting_1">
                            {{$rs->name}}
                        </td>
                        <td>{{$rs->address}}</td>
                        <td>{{$rs->phone_number}}</td>
                        <td>{{$rs->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{
                $suppliers->links('pagination::bootstrap-5')
            }}
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                        <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                    </li>
                    <li class="paginate_button page-item active">
                        <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
    </div>
</div> --}}

@endsection

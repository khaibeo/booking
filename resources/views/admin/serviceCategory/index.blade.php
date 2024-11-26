@extends('layouts.backend')

@section('css')
    <style>
        .btn {
            position: relative;
        }

        .table-cell-store {
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
            max-width: 100px;
        }
    </style>
@endsection
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Danh sách danh mục</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.services_category.index') }}" style="color: inherit;">Danh mục</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Danh sách danh mục</h3>
                <div class="block-options">
                    <div class="block-options-item">
                    </div>
                </div>
            </div>

            <div class="block-content d-flex  justify-content-between align-content-center align-items-center">
                {{-- <form method="GET" action="{{ route('admin.services_category.index') }}">
                    <div class="row mb-4">
                        <!-- Tìm kiếm theo tên khách hàng -->
                        <div class="col-md-3">
                            <input type="text" name="customer_name" class="form-control"
                                placeholder="Tìm kiếm tên khách hàng" value="{{ request()->get('customer_name') }}">
                        </div>

                        <!-- Lọc theo cửa hàng -->


                        <!-- Lọc theo trạng thái thanh toán -->

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </div>
                    </div>
                </form> --}}
                <a href="{{ route('admin.services_category.create') }}" class="btn btn-primary">Thêm mới</a>
            </div>

            <div class="block-content">
                <table class="table table-hover" id="bookingsTable">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Tên danh mục</th>
                            <th class="d-none d-sm-table-cell">Ngày tạo</th>
                            <th class="text-center" style="width: 100px;">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviceCategories as $serviceCategory)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="d-none d-sm-table-cell">{{ $serviceCategory->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    {{ \Carbon\Carbon::parse($serviceCategory->created_at)->format('d-m-Y') }}</td>
                                <td class="d-none d-sm-table-cell table-cell-store">
                                    <div class="btn-group">
                                        <!-- Cập nhật trạng thái -->
                                        <a href="{{ route('admin.services_category.edit', $serviceCategory->id) }}"
                                            class="btn btn-sm btn-alt-warning mx-2 d-flex align-items-center" style="height: 30px; line-height: 30px;"
                                            title="Chỉnh sửa">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.services_category.destroy', $serviceCategory->id) }}"
                                            method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xoá?')"  class="btn btn-sm btn-alt-danger mx-2 d-flex align-items-center"
                                                style="height: 30px; line-height: 30px;"
                                                title="Xóa">
                                                <i class="far fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

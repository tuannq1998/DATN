@extends('admin_layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admins.home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.list')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="container">
        @include('admins.product.form')
    </div>

@stop

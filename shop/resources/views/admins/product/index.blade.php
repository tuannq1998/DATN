@extends('admin_layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admins.home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.list')}}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-10">
            <h1 class="h3 mb-2 text-gray-800">Sản Phẩm </h1>
        </div>
        <div class="col-sm-2"><a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right">Thêm sản phẩm</a></div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tất cả danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Nổi bật</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($products))
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}
                                </td>
                                <td>
                                    {{$product->name}}
                                    <ul style="padding-left: 15px">
                                        <li><span><i class="fas fa-dollar-sign"></i></span><span>12.000.000</span></li>
                                        <li><span><i class="fas fa-dollar-sign"></i></span><span>0</span></li>
                                    </ul>
                                </td>
                                <td>{{isset($product->category->name)?$product->category->name : 'N\A'}}</td>
                                <td>
                                    @if($product->status == \App\Models\Product::STATUS_PUBLIC)
                                        <a href="{{route('product.active',$product->id )}}" class="label {{$product->getStatus($product->active)['class']}}">{{$product->getStatus($product->active)['name']}}</a>
                                    @else
                                        <a href="{{route('product.active', $product->id)}}" class="label {{$product->getStatus($product->active)['class']}}">{{$product->getStatus($product->active)['name']}}</a>
                                    @endif
                                </td>
                                <td>
                                    @if($product->hot == \App\Models\Product::HOT_ON)
                                        <a href="{{route('product.hot',$product->id )}}" class="label {{$product->gethot($product->hot)['class']}}">{{$product->gethot($product->hot)['name']}}</a>
                                    @else
                                        <a href="{{route('product.hot',$product->id )}}" class="label {{$product->gethot($product->hot)['class']}}">{{$product->gethot($product->hot)['name']}}</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <a href="{{route('product.destroy',['delete',$product->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>
@stop

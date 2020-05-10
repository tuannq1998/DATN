@extends('admin_layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admins.home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.list')}}">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-10">
            <h1 class="h3 mb-2 text-gray-800">Danh mục </h1>
        </div>
        <div class="col-sm-2"><a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-right">Tạo danh
                mục</a></div>
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
                        <th>Tên danh mục</th>
                        <th>Title Seo</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->title_seo}}</td>
                                <td>
                                    @if($category->c_active == \App\Models\Category::STATUS_SHOWS)
                                        <a href="{{route('category.active',$category->id )}}" class="label {{$category->getStatus($category->active)['class']}}">{{$category->getStatus($category->active)['name']}}</a>
                                    @else
                                        <a href="{{route('category.active',$category->id )}}" class="label {{$category->getStatus($category->active)['class']}}">{{$category->getStatus($category->active)['name']}}</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <a href="{{route('category.destroy',['delete',$category->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

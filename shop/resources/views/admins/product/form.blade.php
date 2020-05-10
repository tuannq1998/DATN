<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm
                    <en class="text-danger">*</en>
                </label>
                <input type="text" class="form-control" name="name"
                       value="{{old('name', isset($product->name)?$product->name:'')}}" placeholder="Tên sản phẩm">
                @if($errors->has('name'))
                    <em class="error-text text-danger">
                        <small>{{$errors->first('name')}}</small>
                    </em>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả
                    <en class="text-danger">*</en>
                </label>
                <textarea name="description" class="form-control" cols="3" rows="3"
                          placeholder="Mô tả ngắn sản phẩm">{{old('description', isset($product->description)?$product->description:'')}}</textarea>
                @if($errors->has('description'))
                    <em class="error-text text-danger">
                        <small>{{$errors->first('description')}}</small>
                    </em>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nội dung
                    <en class="text-danger">*</en>
                </label>
                <textarea name="contents" class="form-control" cols="3" rows="3"
                          placeholder="Nội dung">{{old('contents', isset($product->contents)?$product->contents:'')}}</textarea>
                @if($errors->has('contents'))
                    <em class="error-text text-danger">
                        <small>{{$errors->first('contents')}}</small>
                    </em>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tiêu đề</label>
                <input type="text" class="form-control" name="title_seo"
                       value="{{old('title_seo', isset($product->title_seo)?$product->title_seo:'')}}"
                       placeholder="Tiêu đề">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả</label>
                <input type="text" class="form-control" name="desc_seo"
                       value="{{old('desc_seo', isset($product->desc_seo)?$product->desc_seo:'')}}"
                       placeholder="Mô tả">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Loại sản phẩm
                    <en class="text-danger">*</en>
                </label>
                <select name="category_id" id="" class="form-control">
                    <option value="">--Chọn Loại sản phẩm</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id', isset($product->category_id) ? $product->category_id : '') == $category->id ? "selected ='selected'" : ""}}>{{$category->name}}</option>
                        @endforeach
                    @endif

                </select>
                @if($errors->has('category_id'))
                    <em class="error-text text-danger">
                        <small>{{$errors->first('category_id')}}</small>
                    </em>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá
                    <en class="text-danger">*</en>
                </label>
                <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm"
                       value="{{old('price', isset($product->price)?$product->price:'')}}">
                @if($errors->has('price'))
                    <em class="error-text text-danger">
                        <small>{{$errors->first('price')}}</small>
                    </em>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">% Khuyến mại</label>
                <input type="number" name="sale" class="form-control" value="0" placeholder="% giảm giá"
                       value="{{old('sale', isset($product->sale)?$product->sale:'')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label><input type="checkbox" name="hot">Nổi bật</label>
            </div>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary float-right">Lưu</button>
</form>

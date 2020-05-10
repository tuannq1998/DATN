<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tên danh mục
            <en class="text-danger">*</en>
        </label>
        <input type="text" class="form-control" name="name"
               value="{{old('name', isset($category->name)?$category->name:'')}}" placeholder="Tên danh mục">
        @if($errors->has('name'))
            <em class="error-text text-danger">
                <small>{{$errors->first('name')}}</small>
            </em>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Icon
            <en class="text-danger">*</en>
        </label>
        <input type="text" class="form-control" name="icon" value="{{old('icon', isset($category->icon)?$category->icon:'')}}" placeholder="fas fa-home">
        @if($errors->has('icon'))
            <em class="error-text text-danger">
                <small>{{$errors->first('icon')}}</small>
            </em>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" name="title_seo" value="{{old('title_seo', isset($category->title_seo)?$category->title_seo:'')}}" placeholder="Tiêu đề">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mô tả</label>
        <input type="text" class="form-control" name="desc_seo" value="{{old('desc_seo', isset($category->desc_seo)?$category->desc_seo:'')}}" placeholder="Mô tả">
    </div>
    <div class="form-group">
        <label><input type="checkbox" name="hot">Nổi bật</label>
    </div>
    <button type="submit" class="btn btn-primary float-right">Lưu</button>
</form>

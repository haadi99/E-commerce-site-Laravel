@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto py-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Sub-Category Form</h4>
                    <h6 class="text-center text-success">{{session('message')}}</h6>
                    <hr>
                    <form action="{{route('sub-category.update',['id'=>$subCategory->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal p-t-20">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $subCategory->category->id? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub-Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="exampleInputuname3" value="{{$subCategory->name}}" placeholder="Sub-Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub-Category Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="exampleInputEmail3" placeholder="Sub-Category Description">{{$subCategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Sub-Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                                <img src="{{asset('/')}}{{$subCategory->image}}" height="250" width="300" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" {{$subCategory->status ==1? 'checked': ''}}>Published</label>
                                <label for=""><input type="radio" name="status" value="2" {{$subCategory->status ==2? 'checked': ''}}>Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


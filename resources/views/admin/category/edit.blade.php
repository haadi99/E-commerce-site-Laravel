@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-10 mx-auto py-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Category Form</h4>
                    <h6 class="text-center text-success">{{session('message')}}</h6>
                    <hr>
                    <form action="{{route('category.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal p-t-20">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="exampleInputuname3" value="{{$category->name}}" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="exampleInputEmail3" placeholder="Category Description">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" name="image" class="dropify" />
                                <img src="{{asset('/')}}{{$category->image}}" height="250" width="300" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1" {{$category->status ==1? 'checked': ''}}>Published</label>
                                <label for=""><input type="radio" name="status" value="2" {{$category->status ==2? 'checked': ''}}>Unpublished</label>
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


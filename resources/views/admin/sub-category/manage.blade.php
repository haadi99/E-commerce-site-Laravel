@extends('admin.master')

@section('body')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sub-Category Table</h4>
            <div class="table-responsive m-t-40">
                <h4 class="text-center">{{session("message")}}</h4>
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>SL NO</th>
                        <th>Category Name</th>
                        <th>Sub-Category Name</th>
                        <th>Description</th>
                        <th>Sub-Category Image</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subCategories as $subCategory)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$subCategory->category->name}}</td>
                            <td>{{$subCategory->name}}</td>
                            <td>{{$subCategory->description}}</td>
                            <td>
                                <img src="{{asset('/')}}{{$subCategory->image}}" height="40" width="40" alt="">
                            </td>
                            <td>{{$subCategory->status==1? 'Published': 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('sub-category.edit',['id'=>$subCategory->id])}}" class="btn btn-success btn-sm">
                                    <i class="ti-write"></i>
                                </a>
                                <a href="" onclick="event.preventDefault(); document.getElementById('deleteForm').submit();" class="btn btn-danger btn-sm">
                                    <i class="ti-trash"></i>
                                </a>
                                <form action="{{route('sub-category.delete',['id'=>$subCategory->id])}}" id="deleteForm" enctype="multipart/form-data" method="post">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

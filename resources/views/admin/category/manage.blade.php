@extends('admin.master')

@section('body')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <h4 class="text-center">{{session("message")}}</h4>
                <table id="myTable" class="table table-striped border">
                    <thead>
                    <tr>
                        <th>SK NO</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Category Image</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <img src="{{asset('/')}}{{$category->image}}" height="40" width="40" alt="">
                            </td>
                            <td>{{$category->status==1? 'Published': 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-success btn-sm">
                                    <i class="ti-write"></i>
                                </a>
                                <a href="" onclick="event.preventDefault(); document.getElementById('deleteForm').submit();" class="btn btn-danger btn-sm">
                                    <i class="ti-trash"></i>
                                </a>
                                <form action="{{route('category.delete',['id'=>$category->id])}}" id="deleteForm" enctype="multipart/form-data" method="post">
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

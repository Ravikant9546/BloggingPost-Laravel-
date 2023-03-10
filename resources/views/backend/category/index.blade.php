@extends('layout')
@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Categories
            <a href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Serial No.</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $cat)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$cat->title}}</td>
                            <td>{{$cat->detail}}</td>
                            <td><img src="{{asset('imgs').'/'.$cat->image}}" width="50" /></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{url('admin/category/'.$cat->id.'/edit')}}">Update</a>
                                <a onclick=" return confirm('Are Yor Sure You Want to Delete?')" class="btn btn-danger btn-sm" href="{{url('admin/category/'.$cat->id.'/delete')}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                {{$data->links()}}

            </div>




        </div>

    </div>
    @endsection
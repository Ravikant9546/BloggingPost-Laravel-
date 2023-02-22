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
            <i class="fas fa-table"></i> Posts
            <a href="{{url('admin/post/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>ThumbnailImage</th>
                            <th>Full Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Serial No.</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>ThumbnailImage</th>
                            <th>Full Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $post)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$post->Category->title}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->detail}}</td>
                            <td><img src="{{asset('imgs').'/'.$post->thumb}}" width="100" /></td>
                            <td><img src="{{asset('imgs').'/'.$post->full_img}}" width="100" /></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{url('admin/post/'.$post->id.'/edit')}}">Update</a>
                                <a onclick=" return confirm('Are Yor Sure You Want to Delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
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
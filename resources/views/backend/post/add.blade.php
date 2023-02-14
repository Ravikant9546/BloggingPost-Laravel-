@extends('layout')
@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard </a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Add Post
            <a href="{{url('admin/category')}}" class="float-right btn btn-sm btn-dark">All Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if($errors)
                @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
                @endforeach
                @endif
                @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
                @endif

                <form method="post" action="{{url('admin/post')}}" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Category</th>
                            <td><select class="form-control" name="category">
                                    @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach

                                </select></td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input type="text" name="title" class="form-control" /></td>
                        </tr>
                        <th>Thumbnail</th>
                        <td><input type="file" name="post_thumbnail" class="form-control" /></td>
                        </tr>
                        <th>Full Image</th>
                        <td><input type="file" name="post_image" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea class="form-control" name="detail"></textarea></td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td><textarea class="form-control" name="tags"></textarea></td>
                       
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    @endsection
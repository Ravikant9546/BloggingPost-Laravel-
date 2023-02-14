@extends('layout')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Categories</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('admin/category')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            <div class="mr-5">{{\App\Models\Category::count()}} Categories</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Posts</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{url('admin/post')}}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            <div class="mr-5">{{\App\Models\Post::count()}} Posts</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Recent Post</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">
                                @foreach($latest as $post)
                                <a href="{{url('detail/'.$post->id)}}" >{{$post->title}}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Deleted Posts</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Categories of Post Available
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>Image</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($data as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->title}}</td>
                                <td>{{$cat->detail}}</td>
                                <td><img src="{{asset('imgs').'/'.$cat->image}}" width="50" /></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @endsection
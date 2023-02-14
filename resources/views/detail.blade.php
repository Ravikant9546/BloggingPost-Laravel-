@extends('frontlayout')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <h3 class="card-header"><kbd>{{$detail->title}}</kbd></h3>
            <img src="{{asset('imgs/'.$detail->full_img)}}" class="card-img-top" alt="{{$detail->title}}">
            <div class="card-body">
                {{$detail->detail}}
            </div>
            <div class="card-footer">
                <a href="{{'/category_post/'.$detail->category->id}}">{{$detail->category->title}}</a>
            </div>
        </div>

    </div>
    <!-- Right Sidebar -->
    <div class="col-md-3">

        <div class="card mb-4 shadow">
            <h5 class="card-header">Search</h5>
            <div class="card-body">


                <div class="input-group">
                    <input type="text" class="form-control">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow">
            <h5 class="card-header">Recent Posts</h5>
            <div class="list-group list-group-flush">
                @if($recent_posts)
                @foreach($recent_posts as $post)
                <a href="{{url('detail/'.$post->id)}}" class="list-group-item">{{$post->title}}</a>
                @endforeach
                @endif
            </div>
        </div>



    </div>

</div>
@endsection('content')
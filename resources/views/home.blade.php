@extends('frontlayout')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="row mb-5">
            @if(count($posts)>0)
            @foreach($posts as $post)
            <div class="col-md-4 shadow">
                <div class="card">
                    <img src="{{asset('imgs/'.$post->thumb)}}" class="card-img-top" alt="{{$post->title}}">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{url('detail/'.$post->id)}}">{{$post->title}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class=" alert alert-danger">No Post Found</p>
            @endif

        </div>
        {{$posts->links()}}

    </div>
    <!-- Right Sidebar -->
    <div class="col-md-3">

        <div class="card mb-4 shadow">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <form action="{{url('/')}}">
                <div class="input-group">
                    <input type="text" class="form-control" name="srch">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
                </form>
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
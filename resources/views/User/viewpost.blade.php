<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">AlLiN1bLoG</a>

        </div>
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span>
            </a>

        </li>

    </nav>

    <div class="card mb-4 shadow">
        <h5 class="card-header-dark">Recent Posts</h5>
        <div class="list-group list-group-flush">
            @if($recent_posts)
            @foreach($recent_posts as $post)
            <a href="{{url('detail/'.$post->id)}}" class="list-group-item">{{$post->title}}</a>
            @endforeach
            @endif
        </div>
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
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> Serial No.</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>ThumbnailImage</th>
                        <th>Full Image</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($data as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->category->title}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->detail}}</td>
                        <td><img src="{{asset('imgs').'/'.$post->thumb}}" width="100" /></td>
                        <td><img src="{{asset('imgs').'/'.$post->full_img}}" width="100" /></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            {{$data->links()}}


        </div>






    </div>




    <script src="{{asset('backend')}}/https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/js/scripts.js"></script>
    <script src="{{asset('backend')}}/https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{asset('backend')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="{{asset('backend')}}/https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('backend')}}/js/datatables-simple-demo.js"></script>
</body>

</html>
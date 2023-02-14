<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" />
    <script type="text/javascript" src="{{asset('lib')}}/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">AlLiN1bLoG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/all-categories')}}">View All Categories</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/post')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>View All Posts</span>
                        </a>

                    </li>



                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/admin/login')}}"> Login</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- Get Latest Post -->


    <main class="container mt-4">
        @yield('content')
    </main>
</body>

</html>
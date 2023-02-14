<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/css/styles.css" rel="stylesheet" />
    @if(!Session::has('adminData'))
    <script type="text/javascript">
        window.location.href = "{{url('admin/login')}}";
    </script>
    @endif
</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.html">AlLiN1bLoG</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <div id="wrapper">

            <ul class="sidebar navbar">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Home</span>
                    </a>

                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{url('admin/category')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>View All Categories</span>
                    </a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('admin/category/create')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Add New Categories</span>
                    </a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('admin/post')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>View All Posts</span>
                    </a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('admin/post/create')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Add New Post</span>
                    </a>

                </li>



                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/logout')}}">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
    </nav>
    <div id="content-wrapper">
        <!-- content -->
        @yield('content')


        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
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
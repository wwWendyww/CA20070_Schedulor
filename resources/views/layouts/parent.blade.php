{{--
BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fuggles">
    <link href="https://fonts.bunny.net/css?family=Adamina|abhaya-libre|alegreya-sans-sc" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <title>@yield('title')</title>
</head>

<body>
    <div class="container-fluid">

        <header class="header">
            <nav class="navbar navbar-expand-sm navbar-light ">
                <div class="container-fluid">
                    <a class="navbar-brand logo">ScheduLor</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                        aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarID">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </div>
                        <div class="navbar-nav">
                            <a class="nav-link" aria-current="page" href="/subscription">Subscription Plan</a>
                        </div> 
                        @if(auth()->check())
                        @if(auth()->user()->type=="admin")
                        <div class="navbar-nav">
                            <a class="nav-link" aria-current="page" href="/manageSubscription">Manage Subscription</a>
                        </div> @endif
                        <div class="navbar-nav d-flex flex-fill justify-content-end ">
                            <div class="btn-group">
                                <button class="btn dropdown-toggle" type="button" id="triggerId"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->user_name}}
                                </button>
                                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="triggerId">
                                    @if(auth()->user()->type=="user")
                                    <a class="dropdown-item" href="/profile">Profile </a>
                                    @endif
                                    @if(auth()->user()->type=="admin")
                                    <a class="dropdown-item" href="/adminprofile">Profile </a>
                                    @endif

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/appointment">Appointment
                                        @if(auth()->user()->subscription=="free")
                                        <i class="bi bi-gem"></i>
                                        @endif </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/task">Task List</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </div>

                            <a class="nav-link" aria-current="page" href="/profile"></a>
                        </div>
                        @else
                        <div class="navbar-nav d-flex flex-fill justify-content-end ">
                            <a class="nav-link" aria-current="page" href="/login">Login</a>
                        </div>
                        @endif


                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
        <hr>
        <footer class="footer text-center">
            &copy Wendy Loh Li Wen
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
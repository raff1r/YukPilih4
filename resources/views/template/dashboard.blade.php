<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Scripts -->
    <script src="{{asset('/js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    YukPilih
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/division">Divisions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/poll">Pollings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/user">Users</a>
                            <a class="dropdown-item" href="/changepassword">
                                Change Password    
                            </a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle px-3 bg-primary text-white ml-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{auth()->user()->username}}  
                        </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout">
                                    Logout    
                                </a>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

@yield('content')

        <style>
            .btns {
                width:50px;
                height:50px;
                font-size:30px;
                bottom:20px;
                right:20px;
                left:unset;
            }
            </style>
        </main>
    </div>
</body>
</html>

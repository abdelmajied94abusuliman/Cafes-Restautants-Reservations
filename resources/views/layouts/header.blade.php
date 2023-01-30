     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="{{URL::asset('storage/image/assets/favicon.ico')}}" />
     {{-- _______________________________ --}}
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
     <!-- Google fonts-->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
     <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="CSS/style.css">

 <!-- Core theme CSS (includes Bootstrap)-->
 @vite(['resources/css/style.css', 'resources/js/app.js', ])
</head>
<body id="page-top">
    <!-- Navigation-->


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">

            <a class="navbar-brand" href="#page-top"><img src="{{URL::asset('/storage/image/logo.png')}}" alt="..." width="400%" height="100rem" /></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('yourreservation')}}">Reservation</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>

                    @if (auth()->check())
                       <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                        <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Logout</a>
                        </li>
                    @else
                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>

 <!-- Favicon-->
 <link rel="icon" type="image/x-icon" href="{{URL::asset('/storage/image/assets/favicon.ico')}}" />
 {{-- _______________________________ --}}
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 <!-- Font Awesome icons (free version)-->
 <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
 <!-- Google fonts-->
 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
 <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="../../CSS/style.css">
 <link rel="stylesheet" href="../../CSS/footer.css">

<!-- Core theme CSS (includes Bootstrap)-->
@vite(['resources/css/style.css', 'resources/js/app.js'])
</head>
<body id="page-top">
<!-- Navigation-->


<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">

        <a class="navbar-brand" href="#page-top"><img src="{{URL::asset("storage/image/$data'[image]'")}}" alt="..." style="width:auto; height:75px" /></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
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


    @if (auth()->check())

    <div class="container pt-5 px-4 mt-3">
        <div class="row">
            <div class="col-sm-6 mt-5" >
                <img class="img-fluid rounded" src="{{URL::asset('/storage/image/img_res.png')}}" alt="..."    />
                </div>

                <div class="col-sm-6 col-xl-6 border rounded " style="margin-top:5%; padding:15px; width:750px">

                <h1>Reservation</h1>
                <div class="bg-secondary rounded p-4" style="background-color: #fff !important; ">
                    <h5 class="mb-4">Add New Reservation</h5>
                    <form action="{{route('editYourReservation' , ['reservation'=>$data['id']])}}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Reservation Date</label>
                                <input type="datetime-local" value="{{$data['res_date']}}" name="res_date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <input type="hidden" value="{{$data['category_id']}}" name="category_id" class="form-control">
                        </div>
                        <button type="submit" class="btn "  style="background-color: #fd7e14 !important ;color:#fff">Choose Date</button>
                    </form>
                </div>
            </div>


            @else

                    {{view('auth.login')}}

                    @endif


        </div>
    </div>

    <div style="height: 2%"></div>

 @include('layouts.footer')

</body>

</html>


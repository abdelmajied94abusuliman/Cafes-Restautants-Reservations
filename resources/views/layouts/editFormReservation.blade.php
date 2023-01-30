


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


    {{-- {{dd($table)}} --}}
@if (auth()->check())
<div class="container pt-5 px-4 mt-3">
    <div class="row">
        <div class="col-sm-6 mt-5" >
            <img class="img-fluid rounded" src="{{URL::asset('/storage/image/img_res.png')}}" alt="..."    />
            </div>

            <div class="col-sm-6 col-xl-6 border rounded " style="margin-top:5%">
    <h1>Reservation</h1>
            <div class="bg-secondary rounded p-4" style="background-color: #fff !important; ">
                <h5 class="mb-4">Add New Reservation</h5>
                <form action="{{route('updateReservation' , ['reservation'=>$data['id']])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{$data['first_name']}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{$data['last_name']}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$data['email']}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile</label>
                        <input type="text" name="tel_number" class="form-control" value="{{$data['tel_number']}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guest Number</label>
                        <input type="number" name="guest_number" class="form-control" value="{{$data['guest_number']}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Restautant Name</label>
                        <input type="hidden" name="category_id" class="form-control" value="{{$data['category_id']}}">
                        <input type="text" name="category" class="form-control" disabled value="{{$data['Restaurant']}}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Choose Your Table</label>
                        <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                            <?php $arrayOfTable = [] ?>
                            @foreach ($reservation as $item)
                                @foreach ($tables as $table)
                                    <?php
                                        if ( $item->table_id == $table->id ){
                                            if ($item->table_id == $data['table_id']){
                                                continue;
                                            }
                                            array_push($arrayOfTable, $table->id);
                                            $reservationMaxTime = strtotime($item->res_date) + 7200;
                                            $reservationMinTime = strtotime($item->res_date) - 7200;
                                            $customerTimeChoosed = Session::get('EditReservatio_Date');
                                            if ( $customerTimeChoosed > $reservationMinTime && $customerTimeChoosed < $reservationMaxTime ) { ?>
                                                <option value="{{ $item->id }} " disabled>
                                                    {{ $table->name }} - {{ $table->location }} - {{ $table->guest_number }} Guest - Reserved
                                                </option>
                                            <?php } else {  ?>
                                                <option value="{{ $table->id }}" >
                                                    {{ $table->name  }}  - {{ $table->guest_number }} Guest
                                                </option>
                                        <?php } } ?>
                                @endforeach
                            @endforeach
                            @foreach ($tables as $item)
                                <?php if (!in_array($item->id, $arrayOfTable)) {?>
                                    <option value="{{ $item->id }}">
                                    {{ $item->name }} - {{ $item->location }} - {{ $item->guest_number }} Guest
                                    </option>
                                     <?php } ?>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="user_id" class="form-control">
                        <input type="hidden" name="res_date" value="{{Session::get('EditReservatio_DateAndTime')}}" class="form-control">
                    </div>
                    <button type="submit" class="btn " style="background-color: #fd7e14 !important ;color:#fff">Update Your Reservation</button>
                </form>
            </div>
        </div>

        @else

                {{view('auth.login')}}

                @endif
    </div>
</div>
<div style="height: 8%"></div>


                @include('layouts.footer')

</body>

</html>

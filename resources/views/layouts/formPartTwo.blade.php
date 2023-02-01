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

            <a class="navbar-brand" href="#page-top"><img src="{{URL::asset('/storage/image/logo.png')}}" alt="..." style="width:auto; height:75px" /></a>

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


    {{-- @if (auth()->check()) --}}

<div class="" style="display: flex">
    <div class=""  style="display: flex">

    {{-- {{dd($table)}} --}}
    <div class="col-sm-6 mt-5" style="display: flex" >
    <img class="img-fluid rounded" src="{{URL::asset("storage/image/$categories->image")}}" style="height:300px; margin:50px"  alt="..."    />
    </div>

    <div class="border rounded " style="margin-top:100px !important ; padding:15px; width:50rem;" >
            <h1 class="px-3 pt-3">Reservation</h1>
            <div class="bg-secondary  p-4" style="background-color: #fff !important; ">
                <h5 class="mb-4">Add New Reservation</h5>
                <form action="{{route('LandingPage.store')}}" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="first_name" class="form-control" value="{{Session::get('Reservatio_first_name')}}" style="width:350px">
                            </td>
                            <td>
                                <input type="text" name="last_name" class="form-control" value="{{Session::get('Reservatio_last_name')}}" style="width:350px">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                </div>
                            </th>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="email" value="{{Session::get('Reservatio_email')}}" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="tel_number" value="{{Session::get('Reservatio_tel_number')}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                </div>
                            </th>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Mobile</label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" name="guest_number" value="{{Session::get('Reservatio_guest_number')}}" class="form-control">
                            </td>
                            <td>
                                <input type="hidden" name="category_id" class="form-control" value="{{ $categories->id }}">
                                <input type="text" name="category" class="form-control" disabled value="{{ $categories->name }}">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Guest Number</label>
                                </div>
                            </th>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Restautant Name</label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <select id="table_id" name="table_id" value="{{Session::get('Reservatio_table_id')}}" class="form-multiselect block w-full mt-1">
                                    <?php $arrayOfTable = [] ?>
                                    @foreach ($reservation as $item)
                                        @foreach ($tables as $table)
                                            <?php
                                                if ( $item->table_id == $table->id ){
                                                    array_push($arrayOfTable, $table->id);
                                                    $reservationMaxTime = strtotime($item->res_date) + 7200;
                                                    $reservationMinTime = strtotime($item->res_date) - 7200;
                                                    $customerTimeChoosed = Session::get('Reservatio_Date');
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
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="mb-3">
                                    <label class="form-label">Choose Your Table</label>
                                </div>
                            </th>
                        </tr>
                    </table>

                    <div class="mb-3">
                        <input type="hidden" name="user_id" class="form-control">
                        <input type="hidden" name="res_date" value="{{Session::get('Reservatio_DateAndTime')}}" class="form-control">
                    </div>
                    <button type="submit"style="background-color: #fd7e14 !important ;color:#fff" class="btn">Add reservation</button>
                </form>
                <a href="{{route('reseForm-create' , ['category_id'=>$categories['id']])}}"><button class="btn btn-primary">Back To Date</button></a>
                </form>
            </div>
        </div>

        {{-- @else

            {{view('auth.login')}}

        @endif --}}

    </div>
</div>

<div style="height: 2%"></div>
            @include('layouts.footer')

        <script>

        </script>

</body>

</html>

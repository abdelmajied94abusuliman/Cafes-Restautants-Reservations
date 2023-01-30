<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/logo.png">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    @vite(['resources/css/style.css', 'resources/css/bootstrap.min.css'])

    <style>
        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            /* align-items: center; */
            justify-content: space-between;
            padding-top: 0.5rem;
            padding-bottom: 10.5rem;
        }
        .fa-bars:before {
            content: "\f0c9";
        }
        .btn-primary {
            background-color: rgb(0, 0, 69);
            border-color: rgb(0, 0, 69);
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            height: 100vh;
            overflow-y: auto;
            transition: 0.5s;
            z-index: 999;        }
        input {
            background-color: #fff !important;
        }
        .bg-secondary {
            background-color: rgb(0, 0, 69) !important;
        }
        .category, .reservation, .admin, .user {
            background-color: none;
        }
        .dashboard {
            background-color: silver;
        }
    </style>
</head>

<body>


    @include('layouts.sidebar')



    <!-- Content Start -->
    <div class="content">


        <h1>dashborad</h1>

        {{-- <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" style="background-color: #fff !important; ">
                        <i class="fa fa-chart-line fa-3x text-primary" style="color:rgb(0, 0, 69) !important"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Apartments On Rent In Website</p>
                            <h6 class="mb-0" style="color:black !important; margin-left: 9rem;">54</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" style="background-color: #fff !important; ">
                        <i class="fa fa-chart-bar fa-3x text-primary" style="color:rgb(0, 0, 69) !important"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Apartments On Sell In Website</p>
                            <h6 class="mb-0" style="color:black !important; margin-left: 9rem;">22</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" style="background-color: #fff !important; ">
                        <i class="fa fa-chart-area fa-3x text-primary" style="color:rgb(0, 0, 69) !important"></i>
                        <div class="ms-3">
                            <p class="mb-2">Pending Requests To Rent Apartment</p>
                            <h6 class="mb-0" style="color:black !important; margin-left: 9rem;">4</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4" style="background-color: #fff !important; ">
                        <i class="fa fa-chart-pie fa-3x text-primary" style="color:rgb(0, 0, 69) !important"></i>
                        <div class="ms-3">
                            <p class="mb-2">Pending Requests To Sell Apartment</p>
                            <h6 class="mb-0" style="color:black !important; margin-left: 9rem;">3</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales Chart End -->

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary text-center rounded p-4" style="background-color: #fff !important; ">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0" style="color:black !important">Worldwide Sales</h6>
                        </div>
                        <img src="https://www.imf.org/wp-content/uploads/2021/12/COTW-FDI-update.gif" width="320px">
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary text-center rounded p-4" style="background-color: #fff !important; ">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0" style="color:black !important">Salse & Revenue</h6>
                        </div>
                        <img src="https://exceljet.net/sites/default/files/images/chart/inline/income%20statement%20annual%20final.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Chart End -->


        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary text-center rounded p-4" style="background-color: #fff !important; ">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0" style="color:black !important">Recent Customers</h6>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col" style="color:black !important">Customer Name</th>
                                <th scope="col" style="color:black !important">Number Of Visit</th>
                                <th scope="col" style="color:black !important">Number Of Contact With Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mandala Quilling</td>
                                <td>$530</td>
                                <td>Excellent</td>
                            </tr>
                            <tr>
                                <td>Realistic and real</td>
                                <td>$430</td>
                                <td>Amazing</td>
                            </tr>
                            <tr>
                                <td>Sun and Moon</td>
                                <td>395</td>
                                <td>Very Good</td>
                            </tr>
                            <tr>
                                <td>Acrylic and gold leaf</td>
                                <td>$350</td>
                                <td>Interesting Product</td>
                            </tr>
                            <tr>
                                <td>Resin Art Inspo</td>
                                <td>$285</td>
                                <td>Very Good</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
</div> --}}





</body>

</html>

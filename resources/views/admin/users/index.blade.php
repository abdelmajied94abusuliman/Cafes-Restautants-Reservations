<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%">
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
        body {
            background-color: rgb(230, 228, 228);
            height: 100%;
        }

        .content {

            margin-top: 3%;
            /* margin-left: 18%; */
            width: 100%
        }

        .container-fluid {
            background-color: rgb(230, 228, 228);
        }

        .user {
            color: black !important;
        }


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
        .user {
            background-color: rgb(230, 230, 230);
        }
    </style>
</head>

<body>


    @include('layouts.sidebar')



    <!-- Content Start -->
    <div class="content">

        <div class="container pt-4 px-4" style="margin-bottom: 30px;">
            <div class="row g-4">
                <div class="col-12 offset-md-1">
                    <div class="bg-secondary rounded h-100 p-4" style="background-color: #fff !important; ">
                        <h5 class="mb-4">User Table</h5>
                        <div class="table-responsive">
                            <table class="table" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Make Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($user as $item)
                                        @if ($item->is_admin)
                                            <tr>
                                                <th scope="col">{{$i++}}</th>
                                                <th scope="col">{{$item->name}}</th>
                                                <th scope="col">{{$item->email}}</th>
                                                <th> Admin </th>
                                                <th scope="col"><a href="{{route('admin.user.destroy' , ['user'=>$item->id])}}">Delete</a></th>
                                                <th scope="col"><a href="{{route('admin.user.update' , ['user'=>$item->id])}}">Remove Admin</a></th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container pt-4 px-4" style="margin-bottom: 30px;">
            <div class="row g-4">
                <div class="col-12 offset-md-1">
                    <div class="bg-secondary rounded h-100 p-4" style="background-color: #fff !important; ">
                        <h5 class="mb-4">User Table</h5>
                        <div class="table-responsive">
                            <table class="table" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Make Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($user as $item)
                                        @if (!$item->is_admin)
                                            <tr>
                                                <th scope="col">{{$i++}}</th>
                                                <th scope="col">{{$item->name}}</th>
                                                <th scope="col">{{$item->email}}</th>
                                                <th> User </th>
                                                <th scope="col"><a href="{{route('admin.user.destroy' , ['user'=>$item->id])}}">Delete</a></th>
                                                <th scope="col"><a href="{{route('admin.user.update' , ['user'=>$item->id])}}">Make Admin</a></th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>

{{-- {{use Symfony\Component\HttpFoundation\File\UploadedFile;}} --}}

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
        .dashboard, .category, .admin, .user {
            background-color: none;
        }
        .reservation{
            background-color: silver;
        }
    </style>
</head>

<body>


    @include('layouts.sidebar')


    <!-- Content Start -->
    <div class="content">


        <h1>reservation</h1>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4" style="background-color: #fff !important; ">
                    <h5 class="mb-4">Add New reservation</h5>
                    <form action="{{ route('admin.reservation.store') }}" method="post" enctype="multipart/form-data" files=true>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">first name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">last name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">tel_number</label>
                            <input type="text" name="tel_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">res_date</label>
                            <input type="datetime-local" name="res_date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">guest_number</label>
                            <input type="number" name="guest_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">category Name</label>
                            <select id="category_id" name="category_id"
                                class="form-multiselect block w-full mt-1">
                                {{-- @foreach ($category as $item) --}}
                                    <option value="{{ $category->id }}">
                                        {{ $item->name }}
                                    </option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">table</label>
                            <select id="table_id" name="table_id"
                                class="form-multiselect block w-full mt-1">
                                @foreach ($table as $item)
                                @if ($item->status == 'avaliable')
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}/{{ $item->location }}/{{ $item->guest_number }} Guest
                                    </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="user_id" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Add reservation</button>
                    </form>
                </div>
            </div>

            {{-- <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="img">
                <button type="submit">click</button>
            </form> --}}

</body>

</html>

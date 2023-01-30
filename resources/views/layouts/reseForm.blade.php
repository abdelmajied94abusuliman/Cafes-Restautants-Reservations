@if (auth()->check())


@include('layouts.header')


    <!-- Content Start -->
    <div class="content">



        <h1>Reservation</h1>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4" style="background-color: #fff !important; ">
                    <h5 class="mb-4">Add New reservation</h5>
                    <form action="{{route('goToPartTwo')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">res_date</label>
                                <input type="datetime-local" name="res_date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <input type="hidden" value="{{$categories->id}}" name="category_id" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Choose Date</button>
                    </form>
                </div>
            </div>

            @include('layouts.footer')
            @else

                    {{ view('auth.login')}}

                    @endif



</body>

</html>


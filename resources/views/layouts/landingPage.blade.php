@include('layouts.header')







<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.hyattrestaurants.com/uploaded/restaurant_photos/restaurant_photos-1587155898.jpg" class="d-block w-100" width="100%" height="100%">
        <div class="carousel-caption d-none d-md-block">
            <header class="masthead">
                <div class="container">
                    <div class="masthead-heading text-uppercase">Welcome To Table Share !</div>
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input type="text" name="search" class="search" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    </form>
                </div>
            </header>
        </div>
      </div>



      <div class="carousel-item">
        <img src="https://tashatgo.com/wp-content/uploads/2021/06/3-8-1200x630.jpg" class="d-block w-100 opicty" width="100%" height="100%">
        <div class="carousel-caption d-none d-md-block">
            <header class="masthead">
                <div class="container">
                    <div class="masthead-heading text-uppercase">Welcome To Table Share !</div>
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <input type="text" name="search" class="search" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    </form>
                </div>
            </header>
            </div>
        </div>




      <div class="carousel-item">
        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/83/6d/cd/getlstd-property-photo.jpg?w=800&h=600&s=1" class="d-block w-100" width="100%" height="100%">
        <div class="carousel-caption d-none d-md-block">
         <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Welcome To Table Share !</div>
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <input type="text" name="search" class="search" placeholder="Search...">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>

                </form>
            </div>
        </header>
            </div>
        </div>



    </div>



    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



        <!-- Masthead-->
        {{-- <header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Welcome To Table Share !</div>
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <input type="text" name="search" class="search" placeholder="Search...">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                </form> --}}
                {{-- <div class="masthead-subheading text-uppercase">Eat - Share -TableShare </div> --}}
                {{-- <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Reservation</a> --}}
            </div>
        </header>
        <!-- Services-->



        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cafe & Restaurant</h2>
                    <div class="masthead-subheading text-uppercase">Choose the place you like !</div>

                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row" style="margin-left: 3rem">
                    @foreach ($restautant as $item)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                                <a href="{{route('reseForm-create' , ['category_id'=>$item['id']])}}">
                                    <img class="rounded-circle" src="{{URL::asset("storage/image/$item->image")}}" alt="..." width="300px" height="300px" />
                                </a>
                                <a href="{{route('reseForm-create' , ['category_id'=>$item['id']])}}"><button class="btn btn-primary btn-l text-uppercase location " style="margin-left: 5rem">Book Here</button></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"></div>
                                <div class="portfolio-caption-subheading text-muted"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


        <div class="slider text-center">
            <h2 class="section-heading text-uppercase">Our Partners</h2>
            <section class="customer-logos slider">
                <div class="slide"><img src="{{URL::asset('/storage/image/pepsi2.png')}}" alt="logo"></div>
                <div class="slide"><img src="{{URL::asset('/storage/image/water2.png')}}" alt="logo"></div>
                <div class="slide"><img src="{{URL::asset('/storage/image/alamed.png')}}" alt="logo"></div>
                <div class="slide"><img src="{{URL::asset('/storage/image/mazaya1.png')}}"  alt="logo"></div>
                <div class="slide"><img src="{{URL::asset('/storage/image/marai.png')}}" alt="logo"></div>
                <div class="slide"><img src="{{URL::asset('/storage/image/down.png')}}" alt="logo"></div>
                <div class="slide"><img src="{{URL::asset('/storage/image/redbull.png')}}" alt="logo"></div>

            </section>
        </div>

        <script>

        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover:false,
                responsive: [{
                    breakpoint: 768,
                    setting: {
                        slidesToShow:4
                    }
                }, {
                    breakpoint: 520,
                    setting: {
                        slidesToShow: 3
                    }
                }]
            });
        });

        </script>




        @include('layouts.footer')


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

@include('layouts.header')


<br><br><br><br>

<div style="display: flex">
@foreach ($results as $result)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                                <a href="{{route('reseForm-create' , ['category_id'=>$result['id']])}}">
                                    <img class="" src="{{URL::asset("storage/image/$result->image")}}" alt="..." width="300px" height="300px" />
                                </a>
                                <a href="{{route('reseForm-create' , ['category_id'=>$result['id']])}}"><button class="btn btn-primary btn-l text-uppercase location " style="margin-left: 5rem">Book Here</button></a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"></div>
                                <div class="portfolio-caption-subheading text-muted"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
</div>
  @include('layouts.footer')


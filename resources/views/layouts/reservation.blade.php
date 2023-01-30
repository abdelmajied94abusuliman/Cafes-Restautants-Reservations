@include('layouts.header')

@if (auth()->check())


<h1>Your Reservation</h1>



<div class="container-fluid pt-4 px-4" style="margin-bottom: 30px;">
     <div class="row g-4">
         <div class="col-12">
             <div class="bg-secondary rounded h-100 p-4" style="background-color: #fff !important; ">
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Date</th>
                                 <th scope="col">Restaurant</th>
                                 <th scope="col">Table</th>
                                 <th scope="col">Guest</th>
                                 <th scope="col">Location</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Edit</th>
                                 <th scope="col">Delete</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $i = 1; ?>
                             @foreach ($data as $item)
                             @if ( $item['StatusRes'] != 'Deleted')
                                 <tr>
                                     <th scope="col">{{$i++}}</th>
                                     <th scope="col">{{$item['Name']}}</th>
                                     <th scope="col">{{$item['Date']}}</th>
                                     <th scope="col">{{$item['Restaurant']}}</th>
                                     <th scope="col">{{$item['Table']}}</th>
                                     <th scope="col">{{$item['Guest']}}</th>
                                     <th scope="col">{{$item['Location']}}</th>
                                     <th scope="col" id="change">{{$item['StatusRes']}}</th>
                                     <th scope="col"><a href="{{route('firstFormEdit' , ['reservation'=>$item['id']])}}"><button style="background-color: green; color:white; padding:5px; border-radius:4px">Edit</button></a></th>
                                     <th scope="col"><a href="{{route('delete' , ['reservation'=>$item['id']])}}"><button style="background-color: red; color:white; padding:5px; border-radius:4px">Delete</button></a></th>
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

@else

    {{view('auth.login')}}

@endif

<div style="height: 17%"></div>

@include('layouts.footer')

    </body>

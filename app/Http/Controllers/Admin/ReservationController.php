<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Table;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reservation = Reservation::with('User')->get();
        $reservation = Reservation::with('User' , 'Table' , 'Category')->get();
        // $reservation = Reservation::with('table')->with('category')->with('user')->get();
        // dd($reservation);
        // $reservationssss = Category::with('getReservationCategory')->get();
        // dd($reservationssss);
        $data = [];
        foreach ( $reservation as $singleData ){
            // dd($singleData->Category->name);
            // $haneen = $singleData->Category->name;
            // dd($haneen);
            $data[] = [
                'id'=> $singleData->id,
                'Name' => $singleData->first_name,
                'Date' => $singleData->res_date,
                'Restaurant' => $singleData->Category->name,
                'Table' => $singleData->Table->name,
                'Guest' => $singleData->Table->guest_number,
                'Location' => $singleData->Table->location,
                'Status' => $singleData->status,
            ];
        };




        // dd($data);


        return view('admin.reservations.index' , ["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        $category = Category::find($category_id);
        $table = Table::get()->where('category_id' , $category_id);
        return view("/reseForm" , ['category'=>$category , 'table'=>$table]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $xx = Carbon::parse();
        // dd($request->input('table_id'));
        $reservation = new Reservation;


        $reservation->first_name = $request->input('first_name');
        $reservation->last_name = $request->input('last_name');
        $reservation->email = $request->input('email');
        $reservation->tel_number = $request->input('tel_number');
        $reservation->res_date = $request->input('res_date');
        $reservation->guest_number = $request->input('guest_number');
        $reservation->category_id = $request->input('category_id');
        $reservation->table_id = $request->input('table_id');
        $reservation->user_id = $request->user()->id;


        $reservation->save();

        $reservation = Reservation::where('user_id' , $request->user()->id)->get();

        dd($reservation);

        // return view('layouts.userReservation' , compact('reservation'));
        return redirect('/userReservation', ['reservation'=>$reservation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($reservation)
    {
        $reser = Reservation::find($reservation);
        Reservation::where('id' , $reservation)->update([
            'status'=>'Canceled',
        ]);
        return redirect('admin/reservation');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reservation)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($reservation)
    {
        $reser = Reservation::find($reservation);
        Reservation::where('id' , $reservation)->update([
            'status'=>'Reserved',
        ]);
        Table::where('id' , $reservation)->update([
            'status'=>'Reserved',
        ]);
        return redirect('admin/reservation');
    }
}

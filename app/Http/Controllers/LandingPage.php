<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LandingPage extends Controller
{

    public function index()
    {
        $restautant = Category::get();
        return view('layouts/landingPage' , ["restautant"=>$restautant]);
    }

    public function reservation_show()
    {
        // $restautant = Reservation::where('user_id' , auth()->user()->id)->get();
        $restautant = Reservation::where('user_id' , auth()->user()->id)->with('Category' , 'Table' , 'User')->get();
        $data = [];

        foreach ( $restautant as $singleData ){
            // $timestamp = (strtotime($singleData->res_date));
            // $date = date('Y.j.n', $timestamp);
            // $time = date('H:i:s', $timestamp);
            // dd($time);

            $data[] = [
                'id'=> $singleData->id,
                'Name' => $singleData->first_name,
                'Date' => $singleData->res_date,
                'Restaurant' => $singleData->Category->name,
                'Table' => $singleData->Table->name,
                'Guest' => $singleData->Table->guest_number,
                'Location' => $singleData->Table->location,
                'StatusRes' => $singleData->status,
                'StatusTab' => $singleData->Table->status,
            ];
        };
        // dd($data);
        return view('layouts.reservation' , ["data"=>$data]);
    }

    public function create($category_id)
    {
        $categories = Category::find($category_id);
        $tables = Table::get()->where('category_id' , $category_id);
        $reservation = Reservation::get()->where('category_id' , $category_id);
        // dd($table);
        return view("layouts.reseForm" , ['categories'=>$categories , 'tables'=>$tables , 'reservation'=>$reservation]);
    }

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

        $user_reservation = Reservation::where('user_id' , $request->user()->id)->get();

        // dd($user_reservation);

        // return view('layouts.userReservation' , compact('reservation'));
        return redirect('/yourreservation');
    }

    public function delete($reservation)
    {
        $reser = Reservation::find($reservation);
        Reservation::where('id' , $reservation)->update([
            'status'=>'Deleted',
        ]);
        return redirect('/yourreservation');
    }



    public function editReservation(Request $request , $reservation)
    {
        $a= $request->input('res_date');
        $b = strtotime($request->input('res_date'));
        Session::put('EditReservatio_DateAndTime' , $a);
        Session::put('EditReservatio_Date' , $b);
        $reser = Reservation::with('Category', 'User' , 'Table')->get()->where('id' , $reservation);
        foreach ( $reser as $singleData ){
            $data = [
                'id'=> $singleData->id,
                'first_name' => $singleData->first_name,
                'last_name'=> $singleData->last_name,
                'email'=>$singleData->email,
                'tel_number'=>$singleData->tel_number,
                'res_date' => $singleData->res_date,
                'Restaurant' => $singleData->Category->name,
                'category_id' => $singleData->Category->id,
                'Table' => $singleData->Table->name,
                'table_id' => $singleData->Table->id,
                'guest_number' => $singleData->Table->guest_number,
                'Location' => $singleData->Table->location,
                'Status' => $singleData->status,
            ];
        };

        $tables = Table::get()->where('category_id' , $data['category_id']);
        $reservation = Reservation::get();
        return view('layouts.editFormReservation' , compact('data' , 'tables' , 'reservation'));
    }


    public function updateReservation(Request $request , $reservation)
    {
        $reser = Reservation::find($reservation);
        Reservation::where('id' , $reservation)->update([
            'first_name'=> $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'tel_number' => $request->input('tel_number'),
            'res_date' => $request->input('res_date'),
            'guest_number' => $request->input('guest_number'),
            'category_id' => $request->input('category_id'),
            'table_id' => $request->input('table_id'),
            'user_id' => $request->user()->id,
            'status'=>'Pending',
        ]);
        return redirect('/yourreservation');
    }

    public function sessionDate(Request $request)
    {
        // echo $request->input('res_date').'<br>';
        $y= $request->input('res_date');
        $x = strtotime($request->input('res_date'));
        $category_id = $request->input('category_id');
        Session::put('Reservatio_Date' , $x);
        Session::put('Reservatio_DateAndTime' , $y);
        // return $x;
        return redirect("/formPartTwo/$category_id/createPartTwo");
    }

    public function createPartTwo($category_id)
    {
        // return $category_id;
        // return 'Form 2 Form 2 Form 2 Form 2 Form 2';
        $categories = Category::find($category_id);
        $tables = Table::get()->where('category_id' , $category_id);
        $reservation = Reservation::get()->where('category_id' , $category_id);
        // dd($table);
        return view("layouts.formPartTwo" , ['categories'=>$categories , 'tables'=>$tables , 'reservation'=>$reservation]);
    }

    public function firstFormEdit($reservation){
        $reser = Reservation::with('Category', 'User' , 'Table')->get()->where('id' , $reservation);
        foreach ( $reser as $singleData ){
            $data = [
                'id'=> $singleData->id,
                'first_name' => $singleData->first_name,
                'last_name'=> $singleData->last_name,
                'email'=>$singleData->email,
                'tel_number'=>$singleData->tel_number,
                'res_date' => $singleData->res_date,
                'Restaurant' => $singleData->Category->name,
                'category_id' => $singleData->Category->id,
                'Table' => $singleData->Table->name,
                'table_id' => $singleData->Table->id,
                'guest_number' => $singleData->Table->guest_number,
                'Location' => $singleData->Table->location,
                'Status' => $singleData->status,
            ];
        };
        $tables = Table::get()->where('category_id' , $data['category_id']);
        return view('layouts.firstFormEdit' , compact('data' , 'tables'));
    }
}

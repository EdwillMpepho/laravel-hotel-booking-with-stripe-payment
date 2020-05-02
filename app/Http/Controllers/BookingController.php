<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Booking;
use App\TotalPrice;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = DB::select('select type,price from rooms');
        $bookings = DB::select('select * from bookings');
        return view('pages.bookings')->with(['rooms' => $rooms,'bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = DB::select('select id,type,price from rooms');
        return view('pages.addbooking')->with('rooms',$rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
             'start_date' => 'date',
             'end_date'   => 'date',
             'nrOfDays'   => 'required',
             'price'      => 'numeric',
             'room_id'    => 'required',
             'name'       => 'required|min:4|max:191',
             'email'      => 'required|email',
             'telno'      => 'required|min:10'
        ]);

        // getting data from inputs
        $name = $request->input('name');
        $telno = $request->input('telno');
        $nrOfDays = $request->input('nrOfDays');
        $email = $request->input('email');
        $start_date = $request->input('start');
        $end_date = $request->input('end');
        $room_id = $request->input('room_id');
        //get a price via room id
        $price = $this->getPrice($room_id);
        //get a total Price from a model
        $totalPrice = new TotalPrice();
        //get totalprice
        $totalamount = $totalPrice->getTotalPrice($nrOfDays,$price);
        $updated_at = now();
        $created_at = now();

        // check if there are available rooms
        $room_available = DB::select('select id,type,price from rooms where id in
         (select room_id from bookings where start_date between :start_date and :end_date )',
         ['start_date' => $start_date, 'end_date' => $end_date]);

         if ($room_available) {
           return redirect('/booking/create')->with('error_message',
           'Sorry the room you are booked is booked');
         }

        // Insert data into bookings
        $booking = DB::insert('insert into bookings(id,start_date,end_date,nrOfDays,price,room_id,
        created_at,updated_at,name,telno,email) values(?,?,?,?,?,?,?,?,?,?,?)',[null,$start_date,$end_date,$nrOfDays,$price,$room_id,
        $created_at,$updated_at,$name,$telno,$email]);

        // check if booking is successful
        if ($booking) {
           return redirect('/booking ')->with('success_message',
                            'Booking was successful,thank you for choosing us');
         }else {
           return redirect('/booking/create')->with('error_message','Booking was not successful');
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return 123;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // get the room price
    public function getPrice($id)
    {
       $room = Room::find($id);
       return $room->price;
    }
}

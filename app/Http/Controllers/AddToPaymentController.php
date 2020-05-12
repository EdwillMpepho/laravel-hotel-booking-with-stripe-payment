<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use DB;
use Cart;

class AddToPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = DB::select('select * from bookings where user_id =:user_id',['user_id' => auth()->user()->id]);
        return view('pages.addToPayment')->with('bookings',$bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bookings = DB::select('select * from bookings where user_id =:user_id and id =:id',
        ['user_id' => auth()->user()->id,'id'=>$id]);
        return view('pages.addBookingForm')->with('bookings',$bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $id = $request->input('booking_id');
         $price = $request->input('price');
         $name = $request->input('name');
         $telno = $request->input('telno');
         $email = $request->input('email');
         $startDate = $request->input('start_date');
         $endDate = $request->input('end_date');
         $nrOfDays = $request->input('nrOfDays');

         Cart::add($id, 'Booking ', 1, $price)->associate('App\Booking');

         return redirect('/addtopayment')->with('success_message','Booking is successfully added');
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
}

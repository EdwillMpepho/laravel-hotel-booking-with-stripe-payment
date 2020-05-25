@extends('layouts.app')
@section('content')
   <h1>Show Each Booking</h1>
   <hr/>
   <div class="row">
       <div class="col-xs-12">
           @if(count($bookings) > 0)
              <ul>
                <h2>Bookings</h2>
                  @foreach ($bookings as $booking)
                    <li><h3><strong>Full Name(s):{{ $booking->name }}</strong></h3></li>
                    <li><h3><strong>Telephone Nr:{{ $booking->telno }}</strong></h3></li>
                    <li><h3><strong>Email address:{{ $booking->email }}</strong></h3></li>
                    <li><h3><strong>Check In Date:{{ $booking->start_date }}</strong></h3></li>
                    <li><h3><strong>Check Out Date:{{ $booking->end_date }}</strong></h3></li>
                    <li><h3><strong>Nr of Days:{{ $booking->nrOfDays }}</strong></h3></li>
                    <li><h3><strong>Price exl(Tax):${{ $booking->price }}</strong></h3></li>
                  @endforeach
                  <!-- add this booking to payment cart -->
                  @if($booking->user_id == Auth::user()->id)
                   <a class="btn btn-primary" href="/addtopayment/create/{{ $booking->id }}">Proceed for Payment</a>
                   @else
                      <p>You are not anuthorized to proceed with this booking</p>
                  @endif
                </ul>
                <!-- check if user is authorized -->
                @if($booking->user_id == Auth::user()->id)
                 <!-- delete booking -->
                <div class="cancel-bookings">
                   <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                       {{ csrf_field() }}
                       <input type="hidden" name="_method" value="delete">
                       <button type="submit" class="btn btn-danger">Cancel Bookings</button>
                    </form>
                </div>
                @else
                    <p>You are not anuthorized to delete this booking</p>
                @endif
                <!-- check if user is authorized  -->
                @if($booking->user_id == Auth::user()->id)
                <!-- edit this booking -->
                  <div class="edit-bookings">
                  <a href="/booking/{{ $booking->id }}/edit" class="btn btn-warning">Edit Booking</a>
                  </div>
                  @else
                  <p>You are not anuthorized to edit this booking</p>
                @endif
            @else
               <p>There is no bookings</p>
           @endif
       </div>
   </div>
@endsection

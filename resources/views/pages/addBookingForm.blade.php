@extends('layouts.app')
@section('content')
 <h1>Add Bookings Payment</h1>
    @if (count($bookings) > 0)
        @foreach ($bookings as $booking)
          <div class="row">
              <div class="col-xs-12">
                    <form action="{{ route('booking.store')}}" method="POST">
                        {{ csrf_field() }}
                     <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                     <div class="form-group">
                         Full Name:
                        <input type="text" name="name" value="{{ $booking->name }}" class="form-control" readonly>
                     </div>
                     <div class="form-group">
                        Telephone Nr:
                       <input type="text" name="telno" value="{{ $booking->telno }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Email Address:
                       <input type="email" name="email" value="{{ $booking->email }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Check In Date:
                       <input type="text" name="start_date" value="{{ $booking->start_date }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Check Out Date:
                       <input type="text" name="end_date" value="{{ $booking->end_date }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Number Of Days:
                       <input type="text" name="nrOfDays" value="{{ $booking->nrOfDays }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Price:
                       <input type="text" name="price" value="{{ $booking->price }}" class="form-control" readonly>
                    </div>
                    <input type="submit" value="Add Booking" class="btn btn-primary">
                   </form>
              </div>
          </div>
        @endforeach
    @else
        <p>No bookings for this payment</p>
    @endif
@endsection

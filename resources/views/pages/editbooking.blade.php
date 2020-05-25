@extends('layouts.app')
@section('content')
<div class="add-booking">
    <h5>Rooms Available</h5>
      <hr/>
       @if (count($rooms) > 0)
           <ul class="rooms-available">
              @foreach($rooms as $room)
                <li>
                   <strong>Room Type:</strong>{{$room->type}}<strong>R</strong>{{$room->price}}
                </li>
               @endforeach
            </ul>
       @endif
       @if (count($bookings) > 0)
       @foreach ($bookings as $booking)
       <!-- check if user is authorized to edit -->
       @if(Auth::user()->id === $booking->user_id)
        <p><span class="notice">Notice:you cannot book for today!!</span></p>
        <p><span class="notice">Notice:Once you pay you cannot change rooms-available</span></p>
         <div class="frm-add">
           <form action="{{route('booking.update',$booking->id )}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="PATCH">
              <input type="hidden" name="room_id" value="{{ $booking->room_id }}">
              <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
               <p>
                  <label>Full Name:</label>
               <input type="text" id="name" name="name" value="{{ $booking->name }}"  required>
                  <label>Tel Nr:</label>
                    <input type="tel" id="telno" name="telno" value={{ $booking->telno }} pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
               </p>
               <p>
                  <label>Email Address:</label>
                  <input type="email" id="email" name="email" value="{{ $booking->email }}"  required>
                  <label>Number OF Days:</label>
                  <input type="text" id="nrOfDays"  name="nrOfDays" value="{{ $booking->nrOfDays }}" readonly required>
               </p>
               <p>
                  <label>Check In Date:</label>
                 <input type="date"  id="start" name="start" value="{{ $booking->start_date}}" onchange="clearMessage()" required/>
                  <label>Check Out Date:</label>
                 <input type="date" id="end" name="end" value="{{ $booking->end_date }}" onchange="getNrOfDays()" required>
               </p>
               <p>
                    <input type="submit" name="submit" value="save" class="btn btn-default btn-lg">
                    <a href="/booking" class="btn btn-info btn-lg">Cancel</a>
               </p>
           </form>
           <!-- display an error message if there is an error -->
           <p id="message">
           </p>
        </div>
        @else
          <h2>You are not authorized to do the operation,Please register in order to do operations</h2>
        @endif
        @endforeach
     @else
         <p>This booking is not found</p>
     @endif
   </div>
@endsection

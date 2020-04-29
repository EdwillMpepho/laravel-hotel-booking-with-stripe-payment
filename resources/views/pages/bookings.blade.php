@extends('layouts.app')
@section('content')
    <h1 style="margin:10px auto;">Bookings</h1>
    <hr/>
      <div class="hotel-bookings">
        <a href="booking/create" class="btn btn-primary">Add Booking</a>
        @if(count($rooms) > 0)
             <h4>Rooms available</h4>
              <ul class="rooms-available">
                  @foreach($rooms as $room)
                    <li>
                        <strong>Room Type:</strong>{{$room->type}}<strong>R</strong>{{$room->price}}
                    </li>
                  @endforeach
              </ul>
             @if(count($bookings) > 0)
                <p>Bookings are available</p>
             @else
                <p>No bookings are available</p>
             @endif
        @else
             <p>No rooms available</p>
        @endif
      </div>
@endsection

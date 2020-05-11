@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-xs-12">
     <h1 style="margin:10px auto;">Bookings</h1>
    <hr/>
      <div class="hotel-bookings">
          @if(Auth::user())
          <a href="booking/create" class="btn btn-primary">Add Booking</a>
          @endif
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
                <table class="table table-bordered">
                  <tr>
                      <th>Full Name</th>
                      <th>Room Number</th>
                      <th>Check In Date</th>
                      <th>Check Out Date</th>
                      <th>Total Price</th>
                      <th>Add To Payment</th>
                  </tr>
                  @foreach ($bookings as $booking)
                   <tr>
                      <td>{{ $booking->name }}</td>
                      <td>{{ $booking->room_id }}</td>
                      <td>{{ $booking->start_date }}</td>
                      <td>{{ $booking->end_date }}</td>
                      <td>{{ $booking->price }}</td>
                      <td>
                        <a href="booking/{{ $booking->id }}" class="btn btn-info">Proceed</a>
                      </td>
                   </tr>
                  @endforeach
                </table>
             @else
                <p>No bookings are available</p>
             @endif
        @else
             <p>No rooms available</p>
        @endif
      </div>
    </div>
  </div>
@endsection

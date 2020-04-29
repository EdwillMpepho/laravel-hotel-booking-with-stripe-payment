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
        @else
           <h4>Sorry, The hotel is full</h4>
       @endif
       <div class="frm-add">
           <form action="{{route('booking.store')}}" method="POST">
              {{ csrf_field() }}
               <p>
                  <label>Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="enter your name and surname"  required>
                  <label>Tel Nr:</label>
                    <input type="tel" id="telno" name="telno" placeholder="enter telno" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
               </p>
               <p>
                  <label>Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="enter email"  required>
                  <label>Number OF Days:</label>
                     <input type="text" id="startDate" value="2" name="startDate" readonly required>
               </p>
               <p>
                 <label>Start Date:</label>
                   <input type="date" id="startDate" name="startDate" placeholder="start date" required>
                   <label>End Date:</label>
                   <input type="date" id="endDate" name="endDate" placeholder="start date" required>
               </p>
               <p>
                   <label>Select Room:</label>
                   <select id="type" name="type">
                       <option value="">please select your room</option>
                       @foreach ($rooms as $room)
                       <option value="{{$room->id}}">{{$room->type}}:{{$room->price}}</option>
                       @endforeach
                   </select>
                </p>
                <p>
                    <input type="submit" name="submit" value="save" class="btn btn-default btn-lg">
                </p>
           </form>
       </div>
   </div>
@endsection

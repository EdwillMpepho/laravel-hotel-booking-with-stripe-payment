@extends('layouts.app')
@section('content')
  <h1>Add Bookings For Payment</h1>
  <hr/>
    @if(Cart::count() > 0)
       <div class="row">

       </div>
    @else
        <p>There are no bookings</p>
    @endif
@endsection

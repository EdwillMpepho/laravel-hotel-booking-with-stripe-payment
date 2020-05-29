@extends('layouts.app')
@section('content')
  <h1>Make Payment</h1>
  <hr/>
   <div class="row">
        <div class="col-md-8">
        @if(Cart::count() > 0 )
            @if (count($bookings) > 0)
        @foreach ($bookings as $booking)
          <div class="row">
              <div class="col-md-8">
                  <!-- Final Payment to stripe -->
              <form action="{{ route('finalbooking.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                     <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                     <input type="hidden" name="room_id" value="{{ $booking->room_id }}">
                     <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
                     <input type="hidden" name="start_date" value="{{ $booking->start_date }}" >
                     <input type="hidden" name="end_date" value="{{ $booking->end_date }}" >
                     <input type="hidden" name="nrOfDays" value="{{ $booking->nrOfDays }}" >
                     <input type="hidden" name="price" value="{{ $booking->price }}" >
                     <div class="form-group">
                        <label for="card-element">
                          Credit or debit card
                        </label>
                        <div id="card-element">
                          <!-- A Stripe Element will be inserted here. -->
                        </div>
                          <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                      </div>
                      <div class="form-group">
                        Name on the card:
                      <input type="text" name="name" value="{{ $booking->name }}"  id="name" class="form-control"  required readonly>
                    </div>
                    <div class="form-group">
                        Address:
                       <input type="text" name="address" id="address" class="form-control"  required>
                    </div>
                     <div class="form-group">
                        Telephone Nr:
                       <input type="text" name="telno" id="telno" value="{{ $booking->telno }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Email Address:
                       <input type="email" name="email" value="{{ $booking->email }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        Total Price(Inc:tax):
                      <input type="text" name="total" value="{{ Cart::total() }}"  id="total" class="form-control"  required readonly>
                    </div>
                    <input type="submit" id="btnPayment" value="Make Payment" class="btn btn-primary">
                   </form>
              </div>
          </div>
        @endforeach
    @else
        <p>No bookings for this payment</p>
    @endif
    @endif
        </div>
   </div>
@endsection
<style>
 /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

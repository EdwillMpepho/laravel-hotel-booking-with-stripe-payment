@extends('layouts.app')
@section('content')
  <h1>Add Bookings For Payment</h1>
  <hr/>
    @if(Cart::count() > 0)
       <div class="row">
          <div class="col-xs-12">
              <table class="table table-striped">
                  <tr>
                      <th>Transaction</th>
                      <th>Full Names</th>
                      <th>Telephone</th>
                      <th>Check In Date</th>
                      <th>Check Out Date</th>
                      <th>Price</th>
                      <th>SubTotal</th>
                      <th>Tax</th>
                      <th>Total</th>
                      <td>Check Out</td>
                  </tr>
                  @foreach (Cart::content() as $row)
                   <tr>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->model->name }}</td>
                      <td>{{ $row->model->telno }}</td>
                      <td>{{ $row->model->start_date }}</td>
                      <td>{{ $row->model->end_date }}</td>
                      <td>{{ $row->price }}</td>
                      <td>{{ Cart::subtotal() }}</td>
                      <td>{{ Cart::tax() }}</td>
                      <td>{{ Cart::total() }}</td>
                      <td>
                       <a class="btn btn-info" href="/payment/{{ $row->model->id }}">Check Out</a>
                      </td>
                   </tr>
                  @endforeach
              </table>
              <a class="btn btn-default btn-lg" href="#">Go Back</a>
          </div>
       </div>
    @else
        <p>There are no bookings</p>
    @endif
@endsection

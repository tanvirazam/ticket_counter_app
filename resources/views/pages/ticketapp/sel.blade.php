@extends('layout.app')

@section('content')
    <div style="margin-top: 120px; margin-bottom:90px;" class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Ticket available is {{ $trips_id->available_ticket }}</h4>
                <h2>if do you want to buy a ticket first registrantion here</h2>
                <form action="{{ route('sale.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="trip_id" value="{{ $trips_id->id }}">
                    <label for="date" class="d-flex">Trip Date:</label>
                    <input type="date" value="{{ $trips_id->date }}" name="date">
                    <h3 class="text-primary mt-4 mb-4 fs-9">User Inforamtion</h3>
                    <input size="50" type="text" class="form-control mb-4" name="name" placeholder="name ..">
                    <input type="text" class="form-control mb-4" name="address" placeholder="address ..">
                    <input type="text" class="form-control mb-4" name="phone" placeholder="phone ..">
                    <button type="submit" class="btn btn-primary">purchas ticket</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')
@section('content')
    <div style="margin-top: 120px;" class="container">
        <div class="row">
            <h3 class="text-danger">Ticket Information:</h3>
            <div class="col-md-6">
                <div class="border">
                    <h3 class="fs-7">Date:: {{ $trip->date }}</h3>
                <h3>Set number:: {{ $sel->set_number }}</h3>
                <h3>Name::{{ $final->name }}</h3>
                <h2>Address:: {{ $final->address }}</h2>
                <h3>Phone:: {{ $final->phone }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

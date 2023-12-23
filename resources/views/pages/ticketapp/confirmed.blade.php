@extends('layout.app')
@section('content')
    <div style="margin-top: 120px;" class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>trip id {{ $trips->id }}</h3>

                @foreach ($user_id as $user)
                    {{ $user->id }}
                @endforeach
                

                <form action="{{ route('buy.ticket') }}" method="POST">
                    @csrf
                    <input class="form-control mb-4" type="date" value="{{ $trips->date }}" name="date">
                    <label class="d-flex" for="">How many ticket do you want to buy:</label>
                    <input type="number" class="form-control" name="ticket" placeholder="ticket">
                    <input type="hidden" name="user_id" value="{{ $user_id->id }}">
                    <input type="hidden" name="trip_id" value="{{ $trips->id }}">
                    <button type="submit" class="btn btn-primary mt-4">Confirm</button>
                </form>
            </div>
        </div>
    </div>
@endsection

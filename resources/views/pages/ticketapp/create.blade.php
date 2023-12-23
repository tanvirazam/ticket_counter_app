@extends('layout.app')
@section('content')
    <div style="margin-top: 120px;margin-bottom: 90px;" class="container">
        @if (session('success'))
            <h3 class="alert alert-primary"> {{ session('success') }}</h3>
        @endif
        @if (session('wrong'))
            <h3 class="alert alert-danger"> {{ session('wrong') }}</h3>
        @endif

        @if (session('done'))
            {{ session('done') }}
        @endif
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('create.store') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="location" placeholder="Location Name..">
                    <button type="submit" class="btn btn-primary mt-4">submit</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-8 mt-4">
                    <h4>Select Your Destination</h4>
                    <form action="{{ route('destination') }}" method="POST">

                        @csrf
                        <label for="start location">Select start location</label>
                        <select name="start_location" id="">
                            <option value="">--select location--</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        <h2 class="fs-7">TO</h2>
                        <label for="start location">Select end location</label>
                        <select name="end_location" id="">
                            <option value="">--select location--</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>

                        <label for="date" class="d-flex">Select trip date:</label>
                        <input type="date" name="date" required>

                        <button type="submit" class="btn btn-primary ml-4">search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create()
    {
        $locations = Location::get();

        return view('pages.ticketapp.create', [
            'locations' => $locations,
        ]);
    }
    public function create_store(Request $request)
    {
        $result = Location::create([
            'name' => $request->location,
        ]);
        return redirect()->route('create');
    }
    public function destination(Request $request)
    {
        $start_id = $request->start_location;
        $end_id = $request->end_location;
        $date = $request->date;

        $available_ticket = Trip::first();

        $search = Trip::where('from_id', $start_id)
            ->where('end_id', $end_id)
            ->whereDate('date', $date)
            ->first();

        if ($search == true) {
            if ($available_ticket->available_ticket > 0) {
                return redirect()->route('sel', [
                    'trip_id' => $search,
                ])->with('success', 'Ticket Found !');

            } else {
                return redirect()->route('create')->with('wrong', 'Ticket Not Found !');
            }
        } else {
            return redirect()->route('create')->with('wrong', 'Ticket Not Found !');
        }


    }

    public function sel($trip_id)
    {
        $trips_id =Trip::where('id', $trip_id)
        ->first();
      
       
        return view('pages.ticketapp.sel', [
            'trips_id' => $trips_id,
            
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Sele;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function sale_store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('confirmed', [
            'trip_id' => $request->trip_id,
        ])->with('success', 'registration successfully');
    }

    public function confirmed($trip_id)
    {
        $trips = Trip::where('id', $trip_id)
            ->first();
        $user_id = User::all();
        return view('pages.ticketapp.confirmed', [
            'trips' => $trips,
            'user_id' => $user_id,
        ]);
    }

    public function buy_ticket(Request $request)
    {
        $re = Trip::where('id', $request->trip_id)
            ->decrement('available_ticket', $request->ticket)
        ;

        // return $result;
        Sele::create([
            'trip_id' => $request->trip_id,
            'user_id' => $request->user_id,
            'set_number' => $request->ticket,
            'date' => $request->date,
        ]);
        return redirect()->route('success')->with('done', 'ticket buy successfully done !');
    }

    public function success()
    {
        $resutl = Sele::with(
            'user',
            'trip'

        )->get();

        $sele=Sele::all();

        foreach($sele as $sel){
            $sel->set_number;
        }

        foreach ($resutl as $res) {
            $final = $res->user;
            $trip= $res->trip;
        }
        
        return view('pages.ticketapp.success', [
            'final'=>$final,
            'trip'=> $trip,
            'sel'=> $sel,
        ]);
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\Bookings;
use App\Models\Destinations;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $destinations = Destinations::orderBy('DestinationName', 'asc')->get(['id','DestinationName']);
        return view('book',compact('destinations'));
    }


    public function store(Request $request)
    {
        $user =auth()->user();

        if($user->activeBooking()>0){
            return redirect('/book')->with('error','A booking is already active.');
        }else{
            $this-> validate($request,[
                'destination_id'=> 'required',
                'date_from'=>'required',
                'date_to'=>'required'
            ]);
            $booking=new Bookings([
                'user_id' =>$user->id,
                'destination_id'=> $request->get('destination_id'),
                'date_from'=> $request->get('date_from'),
                'date_to'=> $request->get('date_to'),
            ]);
            $booking->save();
            return redirect('/book')->with('success','Your booking has been made successfully!');
        }
    }
}

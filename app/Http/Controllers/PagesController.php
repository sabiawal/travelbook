<?php

namespace App\Http\Controllers;
use App\Models\Bookings;
use App\Models\Messages;
use App\Models\Destinations;
use Illuminate\Http\Request;
class PagesController extends Controller
{
    public function admin()
    {
        $messages = Messages::all()->toArray();
        $bookings = Bookings::with('destination')->get();
        return view('admin/index',compact('messages','bookings'));
    }
    public function message()
    {
        $destination = Destinations::all()->toArray();
        return view('welcome',compact('destination'));
    }
    public function welcome()
    {
        $destination = Destinations::all()->toArray();
        return view('welcome',compact('destination'));
    }

    public function store(Request $request)
    {
        $this-> validate($request,[
            'Name' => 'required',
            'Email'=> 'required',
            'Contact' => 'required',
            'Message'=> 'required'
        ]);
        $message=new Messages([
            'Name'=> $request->get('Name') ,
            'Email'=> $request->get('Email') ,
            'Contact'=> $request->get('Contact') ,
            'Message'=> $request->get('Message')
        ]);
        $message->save();
        $destination = Destinations::all()->toArray();
        return view('welcome',compact('destination'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinations;
use App\Models\Messages;
use App\Models\Bookings;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $destination = Destinations::all()->toArray();
        return view('home',compact('destination'));
        // $messages = Messages::all()->toArray();
        // $bookings = Bookings::all()->toArray();
        // return view('admin/index',compact('messages','bookings'));
    }
}

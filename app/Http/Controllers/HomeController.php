<?php

namespace App\Http\Controllers;
use App\Models\Driver;
use App\Models\vehicle;
use App\Models\Checkpoint;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Http\Request;

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
        {
            $driver = Driver::count();
            $vehicle = Vehicle::count();
            $user = User::count();
            $checkpoint = Checkpoint::count();
            $delivery = Delivery::count();
            $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            foreach ($month as $key) {
                $deliveryData[] = Delivery::whereMonth('tgl', $key)->count();
            }
            $status = Delivery::where('status', '=', 'Pending')->count();
            $statusondev = Delivery::where('status', '=', 'On Delivery')->count();
            $statusdelivered = Delivery::where('status', '=', 'Delivered')->count();
            // $administrasiLayanan = Layanan::where('type', 'Administrasi')->count();
            // $publicLayanan = Layanan::where('type', 'Public')->count();
            return view('home', compact('vehicle', 'driver', 'user', 'checkpoint', 'delivery', 'deliveryData', 'status', 'statusondev', 'statusdelivered'));
        }
    }
}

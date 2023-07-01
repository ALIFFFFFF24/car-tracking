<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function reportSopir() {
        $drivers = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.status as sts','vehicles.nopol as nopol')
        ->get();

        return view('reports.drivers',compact('drivers'));
    }

    public function reportKendaraan() {
        $vehicles = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.status as sts','vehicles.nopol as nopol','vehicles.nama_kendaraan as nama')
        ->get();

        return view('reports.vehicles',compact('vehicles'));
    }

    public function reportDelivery() {
        $deliveries = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.*')
        ->get();

        return view('reports.delivery',compact('deliveries'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use PDF;
use DB;
class PdfGeneratorController extends Controller
{
    public function pdfSopir()
    {
        
        $drivers = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.status as sts','vehicles.nopol as nopol')
        ->get();

        $data = [
            'title' => 'Daftar Kegiatan Sopir PT. ABC Tahun',
            'date' => date('Y'),
            'drivers' => $drivers
        ];

        $pdf = PDF::loadView('pdf.laporanSopir', $data);

        return $pdf->download('laporan-sopir.pdf');
    }

    public function pdfDeliveryOrder(Request $request)
    {
        $deliveries = DB::table('deliveries')
        ->join('checkpoints', 'deliveries.id_tujuan' , '=', 'checkpoints.id')
        ->select('deliveries.*', 'checkpoints.tujuan as tujuan')
        ->where('deliveries.id', '=', $request->id)
        ->first();
    
        $data = [
            'deliveries' => $deliveries
        ];
    
        $pdf = PDF::loadView('pdf.suratJalan', $data);
    
        return $pdf->download('surat-jalan.pdf');
    }


    public function pdfSopirPeriode(Request $request)
    {
        // dd("Tanggal Awal : ".$request->date1, "Tanggal Akhir : ".$request->date2);
        $drivers = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.status as sts','vehicles.nopol as nopol')
        ->whereBetween('deliveries.created_at', [$request->date1, $request->date2])
        ->get();

        $data = [
            'title' => 'Daftar Kegiatan Sopir PT. ABC Periode',
            'date1' => $request->date1,
            'date2' => $request->date2,
            'drivers' => $drivers
        ];

        $pdf = PDF::loadView('pdf.laporanSopirPeriode', $data);

        return $pdf->download('laporan-sopir-periode.pdf');
    }

    public function pdfKendaraanPeriode(Request $request)
    {
        $vehicles = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.status as sts','vehicles.nopol as nopol')
        ->whereBetween('deliveries.created_at', [$request->date1, $request->date2])
        ->get();

        $data = [
            'title' => 'Daftar Kendaraan PT. ABC Periode',
            'date1' => $request->date1,
            'date2' => $request->date2,
            'vehicles' => $vehicles
        ];

        $pdf = PDF::loadView('pdf.laporanKendaraanPeriode', $data);

        return $pdf->download('laporan-kendaraan-periode.pdf');
    }

    public function pdfDeliveryPeriode(Request $request)
    {
        $deliveries = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.*')
        ->whereBetween('deliveries.created_at', [$request->date1, $request->date2])
        ->get();

        $data = [
            'title' => 'Daftar Surat Jalan PT. ABC Periode',
            'date1' => $request->date1,
            'date2' => $request->date2,
            'deliveries' => $deliveries
        ];

        $pdf = PDF::loadView('pdf.laporanDeliveryPeriode', $data);

        return $pdf->download('laporan-delivery-periode.pdf');
    }

    public function pdfKendaraan()
    {
        
        $vehicles = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.tgl as tgl','deliveries.status as sts','vehicles.nopol as nopol')
        ->get();

        $data = [
            'title' => 'Daftar Kendaraan PT. ABC Tahun',
            'date' => date('Y'),
            'vehicles' => $vehicles
        ];

        $pdf = PDF::loadView('pdf.laporanKendaraan', $data);

        return $pdf->download('laporan-kendaraan.pdf');
    }

    public function pdfDelivery()
    {
        
        $deliveries = DB::table('deliveries')
        ->join('drivers', 'deliveries.id_sopir' , '=', 'drivers.id')
        ->join('vehicles', 'deliveries.id_kendaraan' , '=', 'vehicles.id')
        ->select('drivers.*','deliveries.*')
        ->get();

        $data = [
            'title' => 'Daftar Surat Jalan PT. ABC Tahun',
            'date' => date('Y'),
            'deliveries' => $deliveries
        ];

        $pdf = PDF::loadView('pdf.laporanDelivery', $data);

        return $pdf->download('laporan-delivery.pdf');
    }
}

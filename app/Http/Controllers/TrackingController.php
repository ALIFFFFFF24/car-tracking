<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkpoint;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
class TrackingController extends Controller

{
    public function show($id)
    {
        $id_tujuan = DB::table('deliveries')
        ->select('deliveries.id_tujuan')
        ->where('deliveries.id','=',$id)
        ->first();
        $data= json_decode( json_encode($id_tujuan), true);
        $checkpoints = DB::table('checkpoints')
            ->select('checkpoints.*')
            ->where('checkpoints.id', '=', $data)
            ->first();
        $delivery = DB::table('deliveries')
        ->join('checkpoints', 'checkpoints.id', '=', 'deliveries.id_tujuan')
        ->select('deliveries.*','checkpoints.tujuan as tujuan')
        ->where('deliveries.id','=',$id)
        ->first();
        $trackings = DB::table('trackings')
        ->select('trackings.*')
        ->where('trackings.id_delivery','=',$id)
        ->first();
        return view('trackings.index')->with(
            [
                'checkpoints' => $checkpoints,
                'delivery' => $delivery,
                'trackings' => $trackings,
            ]
        );
    }

    public function saveOrUpdateData(Request $request)
{
    $data = $request->all(); // Mengambil semua data dari request
    $existingData = Tracking::where('id', $data['id'])->first(); // Mengambil data yang sudah ada berdasarkan kunci (key)

    if ($existingData) {
        // Jika data sudah ada, lakukan pembaruan
        $existingData->update($data);
    } else {
        // Jika data belum ada, buat data baru
        Tracking::create($data);
    }

    return redirect()->route('deliveries.index')
                        ->with('success','Trackings update successfully');
}

}

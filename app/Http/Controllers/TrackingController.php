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
    public function show($id_tujuan)
    {
        $delivery = DB::table('deliveries')->where('deliveries.id_tujuan', '=', $id_tujuan)->first();
        $track = DB::table('trackings')->where('trackings.id_tujuan', '=', $id_tujuan)->first();
        $trackings = Checkpoint::find($id_tujuan)
            ->where('checkpoints.id', '=', $id_tujuan)
            ->first();
        return view('trackings.index')->with(
            [
                'trackings' => $trackings,
                'delivery' => $delivery,
                'track' => $track,
            ]
        );
    }

    public function store(Request $request, Tracking $trackings): RedirectResponse
    { 
            Tracking::UpdateorCreate(
            ['id'=>$trackings],
            [
            'id_tujuan' => $request->id_tujuan,
            'checkpoint1' => $request->checkpoint1,
            'tanggal1' => $request->tanggal1,
            'checkpoint2' => $request->checkpoint2,
            'tanggal2' => $request->tanggal2,
            'checkpoint3' => $request->checkpoint3,
            'tanggal3' => $request->tanggal3,
            'checkpoint4' => $request->checkpoint4,
            'tanggal4' => $request->tanggal4,
            'checkpoint5' => $request->checkpoint5,
            'tanggal5' => $request->tanggal5,
        ]);
    
        return redirect()->route('deliveries.index')
                        ->with('success','Trackings updated successfully');
    }

    public function saveOrUpdateData(Request $request)
{
    $data = $request->all(); // Mengambil semua data dari request

    $existingData = Tracking::where('key', $data['key'])->first(); // Mengambil data yang sudah ada berdasarkan kunci (key)

    if ($existingData) {
        // Jika data sudah ada, lakukan pembaruan
        $existingData->update($data);
        $message = 'Data berhasil diperbarui.';
    } else {
        // Jika data belum ada, buat data baru
        Tracking::create($data);
        $message = 'Data berhasil disimpan.';
    }

    return response()->json(['message' => $message], 200);
}

}

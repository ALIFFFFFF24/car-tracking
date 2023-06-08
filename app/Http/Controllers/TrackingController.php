<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkpoint;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
class TrackingController extends Controller
{
    public function show($id_tujuan)
    {
        $trackings = Checkpoint::find($id_tujuan)
            ->where('checkpoints.id', '=', $id_tujuan)
            ->first();
        return view('trackings.index')->with(
            [
                'trackings' => $trackings
            ]
        );
    }
}

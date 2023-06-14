<?php    
namespace App\Http\Controllers;

use App\Models\Checkpoint;
use App\Models\Delivery;
use App\Models\Driver;
use App\Models\vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DeliveryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $users_id =  Auth::user()->id;
        $drivers = DB::table('deliveries')
        ->join('drivers', 'drivers.id', '=', 'deliveries.id_sopir')
        ->join('vehicles', 'vehicles.id', '=', 'deliveries.id_kendaraan')
        ->join('checkpoints', 'checkpoints.id', '=', 'deliveries.id_tujuan')
        ->select('deliveries.*', 'drivers.nama_sopir as sopir', 'vehicles.nama_kendaraan as kendaraan', 'checkpoints.tujuan as tujuan')
        ->where('deliveries.id_sopir', '=', $users_id)
        ->latest()
        ->get();
        $deliveries = DB::table('deliveries')
        ->join('drivers', 'drivers.id', '=', 'deliveries.id_sopir')
        ->join('vehicles', 'vehicles.id', '=', 'deliveries.id_kendaraan')
        ->join('checkpoints', 'checkpoints.id', '=', 'deliveries.id_tujuan')
        ->select('deliveries.*', 'drivers.nama_sopir as sopir', 'vehicles.nama_kendaraan as kendaraan', 'checkpoints.tujuan as tujuan')
        ->latest()
        ->get();
        return view('deliveries.index',compact('deliveries','drivers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $drivers = Driver::all();
        $vehicles = vehicle::all();
        $checkpoints = Checkpoint::all();
        return view('deliveries.create',compact('drivers','vehicles','checkpoints'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'id_kendaraan' => 'required',
            'id_sopir' => 'required',
            'kondisi' => 'required',
            'berat_barang' => 'required',
            'jenis_barang' => 'required',
            'tgl' => 'required',
            'jml_barang' => 'required',
            'id_tujuan' => 'required',
        ]);
    
        $status = 'Pending';
        Delivery::create(
            [
                'id_kendaraan' => $request->id_kendaraan,
                'id_sopir' => $request->id_sopir,
                'kondisi' => $request->kondisi,
                'berat_barang' => $request->berat_barang,
                'jenis_barang' => $request->jenis_barang,
                'tgl' => $request->tgl,
                'jml_barang' => $request->jml_barang,
                'id_tujuan' => $request->id_tujuan,
                'status' => $status,
                'created_at' => now()
            ]
        );
    
        return redirect()->route('deliveries.index')
                        ->with('success','Deliveries created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver): View
    {
        return view('drivers.show',compact('driver'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery): View
    {
        
        $drivers = Driver::all();
        $vehicles = vehicle::all();
        return view('deliveries.edit',compact('delivery','drivers','vehicles'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery): RedirectResponse
    {
         request()->validate([
            'id_kendaraan' => 'required',
            'id_sopir' => 'required',
            'kondisi' => 'required',
            'berat_barang' => 'required',
            'jenis_barang' => 'required',
            'tgl' => 'required',
            'jml_barang' => 'required',
            'tujuan' => 'required',
            'status' => 'required',
        ]);
    
        $delivery->update($request->all());
    
        return redirect()->route('deliveries.index')
                        ->with('success','Deliveries updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery): RedirectResponse
    {
        $delivery->delete();
    
        return redirect()->route('deliveries.index')
                        ->with('success','Deliveries deleted successfully');
    }

    public function approval($id)
    {
        $deliveries = Delivery::find($id);
        if ($deliveries->status == 'Pending') {
            $deliveries->status = 'Approved';
            $deliveries->save();
        } 
        return redirect()->back();
    }

    
}
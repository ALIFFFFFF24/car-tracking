<?php    
namespace App\Http\Controllers;
    
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
class VehicleController extends Controller
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
        $vehicles = DB::table('vehicles')
        ->latest()
        ->get();
        return view('vehicles.index',compact('vehicles'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('vehicles.create');
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
            'nopol' => ['required', 'unique:vehicles'],
            'warna_kendaraan' => 'required',
            'nama_kendaraan' => ['required', 'unique:vehicles'],
        ]);
    // Get the last order id
$lastVehicleId = Vehicle::orderBy('id', 'desc')->first()->id ?? 0;

// Get last 3 digits of last order id
$lastIncreament = substr($lastVehicleId, -3);

// Make a new order id with appending last increment + 1
$newOrderId = 'VHC' . date('Ymd') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);
        Vehicle::create([
            'id' => $newOrderId,
            'nopol' => $request->nopol,
            'warna_kendaraan' => $request->warna_kendaraan,
            'nama_kendaraan' => $request->nama_kendaraan,
            'created_at' => now()
        ]);
    
        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle): View
    {
        return view('vehicles.show',compact('vehicle'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {

        $vehicle = DB::table('vehicles')
        ->where('id', '=', $id)
        ->first();
        return view('vehicles.edit',compact('vehicle'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle): RedirectResponse
    {
         request()->validate([
            'nopol' => 'required',
            'warna_kendaraan' => 'required',
            'nama_kendaraan' => 'required',
        ]);
    
        $vehicle->update($request->all());
    
        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        $vehicle->delete();
    
        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle deleted successfully');
    }
}
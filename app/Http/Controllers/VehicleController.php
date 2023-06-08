<?php    
namespace App\Http\Controllers;
    
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    
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
        $vehicles = Vehicle::latest()->paginate(5);
        return view('vehicles.index',compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
    
        Vehicle::create($request->all());
    
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
    public function edit(Vehicle $vehicle): View
    {
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
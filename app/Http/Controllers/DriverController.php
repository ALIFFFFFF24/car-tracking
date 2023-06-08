<?php    
namespace App\Http\Controllers;
    
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
class DriverController extends Controller
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
        $drivers = Driver::latest()->paginate(5);
        return view('drivers.index',compact('drivers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $users = User::all();
        return view('drivers.create', compact('users'));
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
            'user_id' => ['required', 'unique:drivers'],
            'no_telp' => 'required',
        ]);
    
        $driver = DB::table('users')->select('name')->where('id', $request->id_user)->get();
        foreach ($driver as $d) {
            $namaDriver = $d->name;
        };

        Driver::create(
            [
                'user_id' => $request->user_id,
                'nama_sopir' => $namaDriver,
                'no_telp' => $request->no_telp,
                'created_at' => now()
            ]
        );

        return redirect()->route('drivers.index')
                        ->with('success','Driver created successfully.');
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
    public function edit(Driver $driver): View
    {
        
        return view('drivers.edit',compact('driver'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver): RedirectResponse
    {
         request()->validate([
            'id_user' => 'required',
            'nama_sopir' => 'required',
            'no_telp' => 'required',
        ]);
    
        $driver->update($request->all());
    
        return redirect()->route('drivers.index')
                        ->with('success','Driver updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver): RedirectResponse
    {
        $driver->delete();
    
        return redirect()->route('drivers.index')
                        ->with('success','Driver deleted successfully');
    }
}
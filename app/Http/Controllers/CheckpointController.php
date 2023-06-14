<?php    
namespace App\Http\Controllers;

use App\Models\Checkpoint;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    
class CheckpointController extends Controller
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
        $checkpoints = Checkpoint::latest()->paginate(5);
        return view('checkpoints.index',compact('checkpoints'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('checkpoints.create');
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
            'tujuan' => ['required', 'unique:checkpoints'],
        ]);
    
        Checkpoint::create($request->all());
    
        return redirect()->route('checkpoints.index')
                        ->with('success','Checkpoints created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Checkpoint $checkpoint): View
    {
        return view('checkpoints.show',compact('checkpoint'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkpoint $checkpoint): View
    {
        return view('checkpoints.edit',compact('checkpoint'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkpoint $checkpoint): RedirectResponse
    {
         request()->validate([
            'tujuan' => 'required',
        ]);
    
        $checkpoint->update($request->all());
    
        return redirect()->route('checkpoints.index')
                        ->with('success','Checkpoints updated successfully');
    }
    
    
    public function destroy(Checkpoint $checkpoint): RedirectResponse
    {
        $checkpoint->delete();
    
        return redirect()->route('checkpoints.index')
                        ->with('success','Checkpoints deleted successfully');
    }
}
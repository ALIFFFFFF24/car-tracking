@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vehicles</h2>
            </div>
            <div class="pull-right py-3">
                @can('master-create')
                <a class="btn btn-success" href="{{ route('vehicles.create') }}"> Create New Vehicle</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Vehicle Id</th>
            <th>Vehicle Registration Number</th>
            <th>Vehicle Color</th>
            <th>Vehicle name</th>
            <th width="280px">Action</th>
        </tr>
        @php $i = 0; @endphp
     @foreach ($vehicles as $vehicle)
     <tr>
         <td>{{ ++$i }}</td>
         <td>{{ $vehicle->id }}</td>
         <td>{{ $vehicle->nopol }}</td>
         <td>{{ $vehicle->warna_kendaraan }}</td>
         <td>{{ $vehicle->nama_kendaraan }}</td>
         <td>
                <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a> --}}
                    @can('master-edit')
                    <a class="btn btn-primary" href="{{ route('vehicles.edit',$vehicle->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('master-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
         </td>
     </tr>
     @endforeach
    </table>
@endsection
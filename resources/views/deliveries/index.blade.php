@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Delivery Order</h2>
            </div>
            <div class="pull-right py-3">
                @can('master-create')
                <a class="btn btn-success" href="{{ route('deliveries.create') }}"> Create New Delivery Order</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @can('master-list')
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Delivery Order Id</th>
            <th>Vehicle</th>
            <th>Driver</th>
            <th>Destination</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @php $i = 0; @endphp
     @foreach ($deliveries as $delivery)
     <tr>
         <td>{{ ++$i }}</td>
         <td>{{ $delivery->id }}</td>
         <td>{{ $delivery->kendaraan }}</td>
         <td>{{ $delivery->sopir }}</td>
         <td>{{ $delivery->tujuan }}</td>
         <td>{{ $delivery->status }}</td>
         <td>
            <form action="{{ route('deliveries.destroy',$delivery->id) }}" method="POST">
                @php
            $app = ($delivery->status == "Pending") ? 'hidden' : '';
            @endphp
                <a {{$app}} class="btn btn-info" href="{{ route('deliveries.show',$delivery->id) }}">Track Delivery</a>
                @can('master-edit')
                <a class="btn btn-primary" href="{{ route('deliveries.edit',$delivery->id) }}">Edit</a>
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
    @endcan

    @can('sopir-list')
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Delivery Order Id</th>
            <th>Vehicle</th>
            <th>Driver</th>
            <th>Destination</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @php $i = 0; @endphp
     @foreach ($drivers as $driver)
     <tr>
         <td>{{ $i++ }}</td>
         <td>{{ $driver->id }}</td>
         <td>{{ $driver->kendaraan }}</td>
         <td>{{ $driver->sopir }}</td>
         <td>{{ $driver->tujuan }}</td>
         <td>{{ $driver->status }}</td>
         <td>
            @php
            $app = ($driver->status == "Pending") ? '' : 'hidden';
            @endphp
            <a {{$app}} href="{{ route('deliveries.approval', $driver->id) }}" class="btn btn-outline-success">Deliver</a>
            @php
            $track = ($driver->status == "On Delivery") ? '' : 'hidden';
            @endphp
             <a {{$track}} href="{{ route('trackings.show', $driver->id) }}" class="btn btn-danger">Track Delivery</a>
        </td>
     </tr>
     @endforeach
    </table>
    @endcan
@endsection
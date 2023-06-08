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
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Delivery Order Id</th>
            <th>Kendaraan</th>
            <th>Sopir</th>
            <th>Tujuan</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
     @foreach ($deliveries as $delivery)
     <tr>
         <td>{{ ++$i }}</td>
         <td>{{ $delivery->id }}</td>
         <td>{{ $delivery->kendaraan }}</td>
         <td>{{ $delivery->sopir }}</td>
         <td>{{ $delivery->tujuan }}</td>
         <td>{{ $delivery->status }}</td>
         <td>
            @can('master-list')
                <form action="{{ route('deliveries.destroy',$delivery->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('deliveries.show',$delivery->id) }}">Show</a> --}}
                    @can('master-edit')
                    <a class="btn btn-primary" href="{{ route('deliveries.edit',$delivery->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('master-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
                @endcan  
                @can('sopir-list')
                    @php
                    $app = ($delivery->status == "Pending") ? '' : 'hidden';
                    @endphp
                    <a {{$app}} href="{{ route('deliveries.approval', $delivery->id) }}" class="btn btn-outline-success">Approve</a>
                    @php
                    $track = ($delivery->status == "Approved") ? '' : 'hidden';
                    @endphp
                     <a {{$track}} href="{{ route('trackings.show', $delivery->id_tujuan) }}" class="btn btn-danger">Track Delivery</a>
                    @endcan
         </td>
     </tr>
     @endforeach
    </table>
@endsection
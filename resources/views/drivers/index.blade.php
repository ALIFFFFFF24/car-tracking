@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Drivers Management</h2>
            </div>
            <div class="pull-right py-3">
                @can('master-create')
                <a class="btn btn-success" href="{{ route('drivers.create') }}"> Create New Driver</a>
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
            <th>User Id</th>
            <th>Driver Name</th>
            <th>Phone Number</th>
            <th width="280px">Action</th>
        </tr>
    @php $i = 0; @endphp
     @foreach ($drivers as $driver)
     <tr>
         <td>{{ ++$i }}</td>
         <td>{{ $driver->user_id }}</td>
         <td>{{ $driver->nama_sopir }}</td>
         <td>{{ $driver->no_telp }}</td>
         <td>
                <form action="{{ route('drivers.destroy',$driver->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('drivers.show',$driver->id) }}">Show</a> --}}
                    @can('master-edit')
                    <a class="btn btn-primary" href="{{ route('drivers.edit',$driver->id) }}">Edit</a>
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
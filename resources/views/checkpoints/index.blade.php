@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Checkpoints Management</h2>
            </div>
            <div class="pull-right py-3">
                @can('master-create')
                <a class="btn btn-success" href="{{ route('checkpoints.create') }}">Create New Checkpoints</a>
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
            <th>tujuan</th>
            <th>Checkpoint Id</th>
            <th>Checkpoint 1</th>
            <th>Checkpoint 2</th>
            <th>Checkpoint 3</th>
            <th>Checkpoint 4</th>
            <th>Checkpoint 5</th>
            <th width="280px">Action</th>
        </tr>
     @foreach ($checkpoints as $checkpoint)
     <tr>
         <td>{{ ++$i }}</td>
         <td>{{ $checkpoint->id }}</td>
         <td>{{ $checkpoint->tujuan }}</td>
         <td>{{ $checkpoint->checkpoint1 }}</td>
         <td>{{ $checkpoint->checkpoint2 }}</td>
         <td>{{ $checkpoint->checkpoint3 }}</td>
         <td>{{ $checkpoint->checkpoint4 }}</td>
         <td>{{ $checkpoint->checkpoint5 }}</td>
         <td>
                <form action="{{ route('checkpoints.destroy',$checkpoint->id) }}" method="POST">
                    {{-- <a class="btn btn-info" href="{{ route('deliveries.show',$delivery->id) }}">Show</a> --}}
                    @can('master-edit')
                    <a class="btn btn-primary" href="{{ route('checkpoints.edit',$checkpoint->id) }}">Edit</a>
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
    {!! $checkpoints->links() !!}
@endsection
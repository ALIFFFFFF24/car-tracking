@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Driver</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('drivers.update',$driver->id) }}" method="POST">
     @csrf
        @method('PUT')
         <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone Number :</strong>
            <input type="text" name="no_telp" value="{{ $driver->no_telp }}" class="form-control" placeholder="Phone Number">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-end">
        <a class="btn btn-danger" href="{{ route('drivers.index') }}">Back</a>
          <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
    </form>
@endsection
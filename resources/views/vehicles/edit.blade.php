@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Vehicle</h2>
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
    <form action="{{ route('vehicles.update',$vehicle->id) }}" method="POST">
     @csrf
        @method('PUT')
         <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Vehicle Registration Number :</strong>
              <input type="text" name="nopol" value="{{ $vehicle->nopol }}" class="form-control" placeholder="Vehicle Registration Number">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Color :</strong>
            <input type="text" name="warna_kendaraan" value="{{ $vehicle->warna_kendaraan }}" class="form-control" placeholder="Vehicle Color">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Name :</strong>
            <input type="text" name="nama_kendaraan" value="{{ $vehicle->nama_kendaraan }}" class="form-control" placeholder="Vehicle Name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-end">
        <a class="btn btn-danger" href="{{ route('vehicles.index') }}">Back</a>
          <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Vehicles</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicles.index') }}"> Back</a>
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
    <form action="{{ route('vehicles.store') }}" method="POST">
     @csrf
         <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Vehicle Registration Number :</strong>
              <input type="text" name="nopol" class="form-control" placeholder="Vehicle Registration Number">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Vehicle Color :</strong>
              <input class="form-control" name="warna_kendaraan" type="text" class="form-control"  placeholder="Vehicle Color">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Name :</strong>
            <input class="form-control" type="text" name="nama_kendaraan" class="form-control"  placeholder="Vehicle Name">
        </div>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
    </form>
@endsection
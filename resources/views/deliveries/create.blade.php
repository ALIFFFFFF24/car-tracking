@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Delivery Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('deliveries.index') }}">Back</a>
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
    <form action="{{ route('deliveries.store') }}" method="POST">
     @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vehicle :</strong>
                    <select class="form-control main w-50" name="id_kendaraan">
                      <option selected>-- Choose Vehicles --</option>
                      @foreach ($vehicles as $v)
                              <option value="{{$v->id}}">{{$v->nama_kendaraan}}</option>
                              @endforeach
                  </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Driver :</strong>
                    <select class="form-control main w-50" name="id_sopir">
                      <option selected>-- Choose Driver --</option>
                      @foreach ($drivers as $d)
                              <option value="{{$d->id}}">{{$d->nama_sopir}}</option>
                              @endforeach
                  </select>
                </div>
            </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Condition :</strong>
            <input class="form-control w-50" type="text" name="kondisi" class="form-control"  placeholder="Condition">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Weight :</strong>
            <input class="form-control w-50" type="number" name="berat_barang" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Categories :</strong>
            <input class="form-control w-50" type="text" name="jenis_barang" class="form-control"  placeholder="Item Categories">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date :</strong>
            <input class="form-control w-50" type="date" name="tgl" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Amount :</strong>
            <input class="form-control w-50" type="number" name="jml_barang" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Destination :</strong>
            <select class="form-control main w-50" name="id_tujuan">
                <option selected>-- Choose Destination --</option>
                @foreach ($checkpoints as $c)
                        <option value="{{$c->id}}">{{$c->tujuan}}</option>
                        @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input class="form-control w-50" type="text" name="status" class="form-control"  placeholder="Pending" disabled>
        </div>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
    </form>
@endsection
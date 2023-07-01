@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Deliveries</h2>
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
    <form action="{{ route('deliveries.update',$delivery->id) }}" method="POST">
     @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vehicle :</strong>
                    <select class="form-control main w-50" name="id_kendaraan">
                            <option selected>-- Choose Vehicle --</option>
                                                @foreach($vehicles as $v)
                                                @php $sel = ($v->id == $delivery->id_kendaraan) ? 'selected' : ''; @endphp
                                                <option value="{{ $v->id }}" {{ $sel }}>{{ $v->nama_kendaraan }}</option>
                                                @endforeach
                        </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Driver :</strong>
                    <select class="form-control main w-50" name="id_sopir">
                        <option selected>-- Choose Driver --</option>
                        @foreach($drivers as $d)
                        @php $sel = ($d->id == $delivery->id_sopir) ? 'selected' : ''; @endphp
                        <option value="{{ $d->id }}" {{ $sel }}>{{ $d->nama_sopir }}</option>
                        @endforeach
                  </select>
                </div>
            </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Condition :</strong>
            <input class="form-control w-50" type="text" name="kondisi" class="form-control"  placeholder="Condition" value="{{$delivery->kondisi}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Weight :</strong>
            <input class="form-control w-50" type="number" name="berat_barang" class="form-control" value="{{$delivery->berat_barang}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Categories :</strong>
            <input class="form-control w-50" type="text" name="jenis_barang" class="form-control"  placeholder="Item Categories" value="{{$delivery->jenis_barang}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date :</strong>
            <input class="form-control w-50" type="date" name="tgl" class="form-control" value="{{$delivery->tgl}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Amount :</strong>
            <input class="form-control w-50" type="number" name="jml_barang" class="form-control" value="{{$delivery->jml_barang}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Destination :</strong>
            <select class="form-control main w-50" name="id_tujuan">
                <option selected>-- Choose Destination --</option>
                @foreach ($checkpoints as $c)
                @php $sel = ($c->id == $delivery->id_tujuan) ? 'selected' : ''; @endphp
                        <option {{$sel}} value="{{$c->id}}">{{$c->tujuan}}</option>
                        @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input class="form-control w-50" type="text" name="status" class="form-control"  placeholder="Status" value="{{$delivery->status}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-end">
        <a class="btn btn-danger" href="{{ route('deliveries.index') }}">Back</a>
          <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
    </form>
@endsection
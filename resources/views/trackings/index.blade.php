@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<form action="{{ route('trackings.saveOrUpdateData') }}" method="POST">
@csrf
<h1>Delivery Destination : {{$delivery->tujuan}}</h1>
<p>Departure Date : {{$delivery->tgl}}</p>
@empty($checkpoints->checkpoint1)
@else
<div class="row py-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Checkpoint 1</label>
            <input class="form-control" name="checkpoint1" type="text" value="{{$checkpoints->checkpoint1}}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Arrival Date</label>
            <input class="form-control" type="date" name="tanggal1" value="{{$trackings->tanggal1}}">
        </div>
    </div>
</div>
@endempty
@empty($checkpoints->checkpoint2)
@else
<div class="row py-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Checkpoint 2</label>
            <input class="form-control"  name="checkpoint2" type="text" value="{{$checkpoints->checkpoint2}}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Arrival Date</label>
            <input class="form-control" type="date"  name="tanggal2" value="{{$trackings->tanggal2}}">
        </div>
    </div>
</div>
@endempty
@empty($checkpoints->checkpoint3)
@else
<div class="row py-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Checkpoint 3</label>
            <input class="form-control"  name="checkpoint3" type="text" value="{{$checkpoints->checkpoint3}}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Arrival Date</label>
            <input class="form-control" type="date"  name="tanggal3" value="{{$trackings->tanggal3}}">
        </div>
    </div>
</div>
@endempty
@empty($checkpoints->checkpoint4)
@else
<div class="row py-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Checkpoint 4</label>
            <input class="form-control"  name="checkpoint4" type="text" value="{{$checkpoints->checkpoint4}}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Arrival Date</label>
            <input class="form-control" type="date"  name="tanggal4" value="{{$trackings->tanggal4}}">
        </div>
    </div>
</div>
@endempty
@empty($checkpoints->checkpoint5)
@else
<div class="row py-3">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Checkpoint 5</label>
            <input class="form-control" name="checkpoint5" type="text" value="{{$checkpoints->checkpoint5}}">
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="name" class="form-label lead">Arrival Date</label>
            <input class="form-control" type="date"  name="tanggal5" value="{{$trackings->tanggal5}}">
        </div>
    </div>
</div>
@endempty
<div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-end">
    <a class="btn btn-danger" href="{{ route('deliveries.index') }}">Back</a>
    <input type="hidden" name="id_tujuan" value="{{$delivery->id_tujuan}}">
    <input type="hidden" name="id" value="{{$trackings->id}}">
    <button type="submit" class="btn btn-success">Submit</button>
    <a class="btn btn-info" href="{{ route('pdf.pdfDeliveryOrder', $delivery->id) }}">Delivery Order</a>

</div>
</form>
@endsection
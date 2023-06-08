@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Delivery Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <th>Delivery Order Id</th>
            <th>Vehicle Id</th>
            <th>Driver Id</th>
            <th>Destination</th>
            <th>Status</th>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Delivery Order Id :</strong>
            {{ $delivery->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Id :</strong>
            {{ $delivery->id_kendaraan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Driver Id :</strong>
            {{ $delivery->id_sopir }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Condition :</strong>
            {{ $delivery->kondisi }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Weight :</strong>
            {{ $delivery->berat_barang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Categories :</strong>
            {{ $delivery->jenis_barang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Item Categories :</strong>
            {{ $delivery->kondisi }}
        </div>
    </div>
</div>
@endsection
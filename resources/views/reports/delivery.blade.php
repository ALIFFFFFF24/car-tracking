@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Deliveries Report</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="col-8 py-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Print Report
     </button>

     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
  <h1 class="modal-title fs-5" id="exampleModalLabel">Print Delivery Report</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col">
            <label for="print-all">Print All Data</label><br>
            <a class="btn btn-success" href="{{ url('/pdf-delivery') }}">Print Report</a>
        </div>
    </div>
    <hr>
    <div class="row g-3 align-items-center">
            <label for="print-all">Print Delivery Report Periodically</label><br>
            <form class="form-group" action="/pdf-delivery-periode/{date1}/{date2}">
                @csrf
                <div class="col-auto">
                    <label for="print-all">from : </label><br>
                    <input type="date" id="date1" class="form-control" name="date1">
                  </div>
                  <div class="col-auto">
                    <label for="print-all">to : </label><br>
                    <input type="date" id="date2" class="form-control" name="date2">
                  </div>
                  <button type="submit" class="btn btn-info">Print Report</button>
            </form>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Delivery Order Id</th>
        <th>Date</th>
        <th>Item Condition</th>
        <th>Item Weight</th>
        <th>Item Categories</th>
        <th>Item Amount</th>
        <th>Delivery Status</th>
    </tr>
    @php $i=1; @endphp
    @foreach ($deliveries as $delivery)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$delivery->id}}</td>
            <td>{{$delivery->tgl}}</td>
            <td>{{$delivery->kondisi}}</td>
            <td>{{$delivery->berat_barang}}</td>
            <td>{{$delivery->jenis_barang}}</td>
            <td>{{$delivery->jml_barang}}</td>
            <td>{{$delivery->status}}</td>
        </tr>
    @endforeach
</table>
@endsection
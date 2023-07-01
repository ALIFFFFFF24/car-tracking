@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Delivery Detail</h2>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col">
                <p>Destination : {{$delivery->tujuan}}</p>
                <p>Departure Date : {{$delivery->tgl}}</p>
                <p>Status : {{$delivery->status}}</p>
            </div>
        </div>
    <table class="table table-bordered">
        <tr>
            @empty($checkpoints->checkpoint1)
            @else
            <th>{{ $checkpoints->checkpoint1 }}</th>
            @endempty
            @empty($checkpoints->checkpoint2)
            @else
            <th>{{ $checkpoints->checkpoint2 }}</th>
            @endempty
            @empty($checkpoints->checkpoint3)
            @else
            <th>{{ $checkpoints->checkpoint3 }}</th>
            @endempty
            @empty($checkpoints->checkpoint4)
            @else
            <th>{{ $checkpoints->checkpoint4 }}</th>
            @endempty
            @empty($checkpoints->checkpoint5)
            @else
            <th>{{ $checkpoints->checkpoint5 }}</th>
            @endempty
        </tr>
     <tr>
        @empty($trackings->tanggal1)
        @else
         <td>{{ $trackings->tanggal1 }}</td>
        @endempty
         @empty($trackings->tanggal2)
         @else
         <td>{{ $trackings->tanggal2 }}</td>
         @endempty
         @empty($trackings->tanggal3)
         @else
         <td>{{ $trackings->tanggal3 }}</td>
         @endempty
         @empty($trackings->tanggal4)
         @else
         <td>{{ $trackings->tanggal4 }}</td>
         @endempty
         @empty($trackings->tanggal5)
         @else
         <td>{{ $trackings->tanggal5 }}</td>
         @endempty

     </tr>
    </table>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-end">
        <a class="btn btn-danger" href="{{ route('deliveries.index') }}">Back</a>
        @php $app = ($delivery->status == "On Delivery") ? '' : 'hidden';  @endphp
        <a {{$app}} class="btn btn-success" href="{{ route('deliveries.finish',$delivery->id) }}">Finish Delivery</a>
        <a class="btn btn-info" href="{{ route('pdf.pdfDeliveryOrder', $delivery->id) }}">Delivery Order</a>
  </div>
@endsection
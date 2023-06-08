@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Checkpoints</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('checkpoints.index') }}">Back</a>
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
    <form action="{{ route('checkpoints.store') }}" method="POST">
     @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tujuan :</strong>
                    <input class="form-control" type="text" name="tujuan" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Checkpoint 1 :</strong>
                    <input class="form-control" type="text" name="checkpoint1" class="form-control">
                </div>
            </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Checkpoint 2 :</strong>
            <input class="form-control" type="text" name="checkpoint2" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Checkpoint 3 :</strong>
            <input class="form-control" type="text" name="checkpoint3" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Checkpoint 4 :</strong>
            <input class="form-control" type="text" name="checkpoint4" class="form-control" >
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Checkpoint 5 :</strong>
            <input class="form-control" type="text" name="checkpoint5" class="form-control">
        </div>
    </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
    </form>
@endsection
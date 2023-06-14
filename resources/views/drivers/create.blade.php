@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Drivers</h2>
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
    <form action="{{ route('drivers.store') }}" method="POST">
     @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User :</strong>
                    <select class="form-control main w-25" name="user_id">
                      <option selected>-- Choose User --</option>
                      @foreach ($users as $u)
                              <option value="{{$u->id}}">{{$u->name}}</option>
                              @endforeach
                  </select>
                </div>
            </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone Number :</strong>
            <input class="form-control" type="text" name="no_telp" class="form-control"  placeholder="Phone Number">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-end">
        <a class="btn btn-danger" href="{{ route('drivers.index') }}">Back</a>
          <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
    </form>
@endsection
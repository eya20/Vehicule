@extends('marques.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Mark</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('marque.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('marque.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="nom" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center" style="margin:12px">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
@extends('vehicules.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New car</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vehicule.index') }}"> Back</a>
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
   
<form action="{{ route('vehicule.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="nom" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Marque:</strong>
                <select name="marque"  class="form-control">
                @foreach ($marques as $marque)
                    <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Modéle:</strong>
                <select name="modele"  class="form-control">
                @foreach ($modeles as $modele)
                    <option value="{{ $modele->id }}">{{ $modele->nom }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center" style="margin:12px">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
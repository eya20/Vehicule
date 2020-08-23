@extends('vehicules.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit car</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehicule.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('vehicule.update',$vehicule->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="nom" value="{{ $vehicule->nom }}" class="form-control" placeholder="Title">
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
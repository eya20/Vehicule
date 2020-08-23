@extends('modeles.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Modele</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('modele.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $modele->nom }}
            </div>
        </div>
        <h4 style="margin:5px"> {{ $modele->nom }} Cars </h4>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nom</th>
        </tr>
        @foreach ($vehicules as $vehicule)
        <tr>
            <td>{{ $vehicule->id }}</td>
            <td>{{ $vehicule->nom }}</td>
        </tr>
        @endforeach
    </table>
        </div>
        
    </div>
@endsection
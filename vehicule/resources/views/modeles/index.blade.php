@extends('modeles.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Models</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('modele.create') }}" style="margin:12px"> Create new Model</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($modeles as $modele)
        <tr>
            <td>{{ $modele->id }}</td>
            <td>{{ $modele->nom }}</td>
            <td>
                <form action="{{ route('modele.destroy',$modele->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('modele.show',$modele->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('modele.edit',$modele->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
      
@endsection
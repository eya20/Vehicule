@extends('vehicules.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Cars</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vehicule.create') }}" style="margin:12px"> Create new car</a>
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
        @foreach ($vehicules as $vehicule)
        <tr>
            <td>{{ $vehicule->id }}</td>
            <td>{{ $vehicule->nom }}</td>
            <td>
                <form action="{{ route('vehicule.destroy',$vehicule->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('vehicule.show',$vehicule->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('vehicule.edit',$vehicule->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
      
@endsection
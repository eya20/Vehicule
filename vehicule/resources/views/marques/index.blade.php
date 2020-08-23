@extends('marques.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Marks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('marque.create') }}" style="margin:12px"> Create new mark</a>
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
        @foreach ($marques as $marque)
        <tr>
            <td>{{ $marque->id }}</td>
            <td>{{ $marque->nom }}</td>
            <td>
                <form action="{{ route('marque.destroy',$marque->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('marque.show',$marque->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('marque.edit',$marque->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
      
@endsection
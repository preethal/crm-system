@extends('layouts.app')

@extends('clients.layout')
@extends('clients.menu')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Client</a>
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
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Photo</th>

        @can('isAdmin')
            <th width="280px">Action</th>
        @endcan
        </tr>
        @foreach ($clients as $client)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->details }}</td>
             <td><img src="{{url('/uploads/').'/' .$client->file}}" width="25%" height="25%"></td>

          @can('isAdmin')
            <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
   
                    <!--<a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Show</a>-->
    
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          @endcan

        </tr>
        @endforeach
    </table>
  
    {!! $clients->links() !!}
      
@endsection
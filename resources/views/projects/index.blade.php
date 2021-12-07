@extends('clients.layout')
@extends('clients.menu')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
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
            <th>Id</th>
            <th>Project Name</th>
            <th>Project description</th>
            <th>Status</th>
            <th>Client Name</th>
            <th>Task</th>
         @can('isAdmin')
            <th width="280px">Action</th>
        @endcan
        </tr>
        @foreach ($projects as $project)

        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->status }}</td>
            <td>{{$project->client->name}}</td>
            <td>{{ $project->task }}</td>
        @can('isAdmin')
            <td>
                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
   
                    <!--<a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>-->
    
                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
         @endcan

        </tr>
        @endforeach
    </table>
  
    {!! $projects->links() !!}
      
@endsection
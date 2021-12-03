@extends('clients.layout')
@extends('clients.menu')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
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
            <th>Task Name</th>
            <th>Status</th>
            <th>Emloyeee</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
              

        <tr>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->status }}</td>
             <td>{{ $task->role->role }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                  <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $tasks->links() !!}
      
@endsection
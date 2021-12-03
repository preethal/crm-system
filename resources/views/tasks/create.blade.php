@extends('clients.layout')
@extends('clients.menu')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Task</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
        </div>
    </div>
</div>
   

   
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Task Name:</strong>
                <input type="text" name="task_name" class="form-control" placeholder=" Task Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
             <input type="text" name="status" class="form-control" placeholder=" Status">            
         </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Name:</strong>
                <select name="role_id">
                    <option value="">select</option>
                     @foreach($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                     @endforeach 
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
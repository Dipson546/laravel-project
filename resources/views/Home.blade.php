<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="bg-info">
<div class="conatiner w-25 mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
        <h3>Todo list</h3>
<form action="{{ route('store') }}" method="POST" autocomplete="off">
    @csrf
    <div class="input-group">
    <input type="text" name="content" class="form-control" placeholder="Add your new Todo List" >
    <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button> 
    </div>
</form>
{{-- if tasks  count --}}
@if (count($todolists))
<ul class="list-group list-group-fluse mt-3">
@foreach ($todolists as $todolist)
      <li class="list-group-item">
        <form action="{{ route('destroy', $todolist->id) }}" method="POST">
            {{ $todolist->content }}
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
        </form>
    </li>
    @endforeach

 </ul>
 @else
 <p class="texr-center mt-3">NO Task</p>

    @endif
</div>
<div class="card-footer">
 you have {{ count($todolists) }} pending tasks
</div>


</div>
</div>


</body>
</html>
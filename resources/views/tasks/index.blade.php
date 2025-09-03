<!DOCTYPE html>
<html>
<head>
    <title>Laravel To-Do App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container mt-5">

    <h1 class="mb-4">📝 My To-Do List</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="d-flex mb-4">
        @csrf
        <input type="text" name="title" class="form-control me-2" placeholder="Add new task">
        <button class="btn btn-primary">Add</button>
    </form>

    <ul class="list-group">
    @foreach ($tasks as $task)
        <li class="list-group-item d-flex justify-content-between align-items-center 
            {{ $task->is_completed ? 'bg-light' : '' }}">
            
            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm {{ $task->is_completed ? 'btn-success' : 'btn-warning' }}">
                        {{ $task->is_completed ? '✔' : '○' }}
                    </button>
                </form>

                <span class="{{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                    {{ $task->title }}
                </span>
            </div>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Remove</button>
            </form>
        </li>
    @endforeach
    </ul>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    <h2>Tareas</h2>

    @foreach($tasks as $key => $task)
        <div class="task">
            <p>{{ $task['name'] }}</p>
            <p>Fecha de vencimiento: {{ $task['due_date'] }}</p>
            <p>Estado: {{ $task['completed'] ? 'Completada' : 'Pendiente' }}</p>
            <form method="POST" action="{{ route('tasks.update', $key) }}">
            @method('PUT')
            @csrf
            <button type="submit">Marcar como {{ $task['completed'] ? 'pendiente' : 'completa' }}</button>
            </form>
            <form method="POST" action="{{ route('tasks.destroy', $key) }}" style="display: inline;">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    @endforeach


    <h2>Agregar Tarea</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <label for="name">Nombre de la tarea:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="due_date">Fecha de vencimiento:</label>
        <input type="date" id="due_date" name="due_date">
        <br>
        <button type="submit">Agregar tarea</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Gestor de tareas</h1>

        <h2 class="mt-4">Tareas</h2>

        @foreach($tasks as $key => $task)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-tittle">{{ $task['name'] }}</h5>
                    <p class="card-text">Fecha de vencimiento: {{ $task['due_date'] }}</p>
                    <p class="card-text">Estado: {{ $task['completed'] ? 'Completada' : 'Pendiente' }}</p>
                    <form method="POST" action="{{ route('tasks.update', $key) }}">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Marcar como {{ $task['completed'] ? 'pendiente' : 'completa' }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('tasks.delete', $key) }}" style="display: inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach


        <h2 class="mt-4">Agregar Tarea</h2>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de la tarea:</label>
                <input type="text" placeholder="Ej: Pasear al perro" class="form-control col-7" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="due_date">Fecha de vencimiento:</label>
                <input type="date" class="form-control col-7" id="due_date" name="due_date"  required>
            </div>    
            <button type="submit" class="btn btn-success mb-4">Agregar tarea</button>
        </form>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

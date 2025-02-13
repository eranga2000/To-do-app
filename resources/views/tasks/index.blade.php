<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <!-- Include FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Center the content vertically and horizontally */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 300px;
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Style the form input */
input[type="text"] {
    width: 80%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 16px;
}

/* Style the submit button */
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    height: 40px;
}

button:hover {
    background-color: #45a049;
}

/* Style the task list */
ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    font-size: 18px;
    color: #333;
}

li span {
    margin-left: 10px;
    font-size: 14px;
    color: #888;
}

/* Style the action buttons with icons */
.actions {
    display: flex;
    gap: 10px;
}

.actions form button {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: grey;
}

.actions form button:hover {
    color: #4CAF50;
}

.completed {
    color: #888;
    text-decoration: line-through;
}
.form-group{
    display: flex;
    
    
}
    </style>

   
</head>
<body>

<div class="container">
    <h1>To-Do List</h1>

    <!-- Form to add a new task -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
        <input type="text" name="name" placeholder="Enter a new task" required>
        <button type="submit"><i class="fas fa-plus"></i></button>
        </div>
    </form>

    <!-- Display the tasks -->
    <ul>
        @foreach ($tasks as $task)
            <li class="{{ $task->completed ? 'completed' : '' }}">
                {{ $task->name }}
                <div class="actions">
                    @if (!$task->completed)
                        <!-- Mark as completed -->
                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" title="Mark as completed">
                                <i class="fas fa-check-circle"></i>
                            </button>
                        </form>
                    @else
                        <span>(Completed)</span>
                    @endif
                    <!-- Delete task -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete task">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

</body>
</html>

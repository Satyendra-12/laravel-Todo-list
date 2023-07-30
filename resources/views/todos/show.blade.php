<!DOCTYPE html>
<html>
<head>
    <title>Todo Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .todo-card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            padding: 20px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        .todo-card p {
            margin: 10px 0;
        }

        .todo-card a {
            display: inline-block;
            margin-right: 10px;
            text-decoration: none;
            background-color: #4CAF50;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 4px;
        }

        .todo-card a:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        /* Style for the delete button */
        .todo-card form button[type="submit"] {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545; /* Red color for Delete button */
            color: #ffffff;
            cursor: pointer;
        }

        .todo-card form button[type="submit"]:hover {
            background-color: #c82333; /* Darker red color on hover */
        }
        
    </style>
    
</head>
<body>
    <div class="todo-card">
        <h1>Todo Details</h1>
        <p><strong>Title:</strong> {{ $todo->title }}</p>
        <p><strong>Description:</strong> {{ $todo->description }}</p>
        <a href="{{ route('todos.edit', $todo) }}">Edit</a>
        <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
        </form>
        <a href="{{ route('todos.index') }}" class="back-link">Back to List</a>
    </div>
    
</body>
</html>

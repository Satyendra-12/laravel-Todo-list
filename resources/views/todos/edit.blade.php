<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .todo-card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        .todo-card h1 {
            text-align: center;
        }

        .todo-card label {
            display: block;
            margin-bottom: 5px;
        }

        .todo-card input[type="text"],
        .todo-card textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .todo-card button[type="submit"] {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #ffffff;
            cursor: pointer;
        }

        .todo-card button[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #ffffff;
        }

        .back-link:hover {
            background-color: #45a049;
        }

        .update-button-container {
            display: flex;
            justify-content: flex-end;
        }

        .update-button-container button[type="submit"] {
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="todo-card">
        <h1>Edit Todo</h1>
        <form action="{{ route('todos.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title"><strong>Title:</strong></label>
            <input type="text" name="title" value="{{ $todo->title }}" required>

            <label for="description"><strong>Description:</strong></label>
            <textarea rows=8 cols=10 name="description">{{ $todo->description }}</textarea>

            <div class="update-button-container">
                <button type="submit">Update</button>
            </div>
        </form>
        <a href="{{ route('todos.index') }}" class="back-link">Back to List</a>
    </div>
    
</body>
</html>

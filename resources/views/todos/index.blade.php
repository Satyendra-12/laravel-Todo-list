<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .todo-card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .add-todo-link {
            display: inline-block;
            margin-top: 10px;
            background-color: #007bff; /* Blue color for the button */
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }

        .add-todo-link:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }

        .actions a {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
        }

        .actions a.view {
            background-color: #007bff; /* Blue color for View link */
        }

        .actions a.edit {
            background-color: #28a745; /* Green color for Edit link */
        }

        .actions form {
            display: inline; /* Remove line break between form and button */
        }

        .actions form button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545; /* Red color for Delete button */
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
        }

        .actions form button:hover {
            background-color: #c82333;
        }
/* .w-5{ for pagination hide  < >
display:none
} */
    </style>
</head>
<body>
    <div class="todo-card">
        <h1>Todo List</h1>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->description }}</td>
                    <td class="actions">
                        <a href="{{ route('todos.show', $todo) }}" class="view">View</a>
                        <a href="{{ route('todos.edit', $todo) }}" class="edit">Edit</a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('todos.create') }}" class="add-todo-link">Add New Todo</a>
    </div>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <a href="{{ route('admin.type.create') }}">Add Type</a>
        <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($type as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->name }}</td>
                    <td>
                        <form action="{{ route('admin.type.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                            @csrf
                            @method('DELETE')
                                <button type="submit">
                                    Delete
                                </button>
                        </form>
                        <a href="{{ route('admin.type.edit', $t->id) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</body>
</html>
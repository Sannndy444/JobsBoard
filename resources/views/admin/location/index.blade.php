<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>
    <a href="{{ route('admin.location.create') }}">Add Location</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($location as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->name }}</td>
                    <td>{{ $l->description }}</td>
                    <td>
                        <form action="{{ route('admin.location.destroy', $l->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                            @csrf
                            @method('DELETE')
                                <button type="submit">
                                    Delete
                                </button>
                        </form>
                        <a href="{{ route('admin.location.edit', $l->id) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <a href="{{ route('admin.company.create') }}">add company</a> <br>

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
            @forelse ($company as $c)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $c->name }}
                    </td>
                    <td>
                        {{ $c->description }}
                    </td>
                    <td>
                        <form action="{{ route('admin.company.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                            @csrf
                            @method('DELETE')
                                <button type="submit" >
                                    Delete
                                </button>
                        </form> 
                        <a href="{{ route('admin.company.edit', $c->id) }}">
                            Edit
                        </a>
                    </td>
                    @empty
                        <td>
                            No Data
                        </td>
                    @endforelse
                </tr>
                    
        </tbody>
    </table>
</body>
</html>
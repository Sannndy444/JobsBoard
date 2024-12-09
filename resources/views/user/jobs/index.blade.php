<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-user-navbar></x-user-navbar>
    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Location</th>
                <th>Company</th>
                <th>Type</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $j)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $j->title }}
                    </td>
                    <td>
                        {{ $j->image }}
                    </td>
                    <td>
                        {{ $j->description }}
                    </td>
                    <td>
                        {{ $j->company->name }}
                    </td>
                    <td>
                        {{ $j->location->name }}
                    </td>
                    <td>
                        {{ $j->type->name }}
                    </td>
                    <td>
                        {{ $j->salary }}
                    </td>
                    <td>
                        <form action="{{ route('user.jobs.assign', $j->id) }}" method="GET">
                            <button type="submit">Assign Job</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
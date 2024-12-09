<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jobs</th>
                <th>User</th>
                <th>Resume</th>
                <th>Cover Letter</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($application as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->work->title }}</td>
                    <td>{{ $a->user->name }}</td>
                    <td>
                        @if ($a->resume)
                            <img src="{{ asset('/storage/' . $a->resume) }}" alt="Jobs Image" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>
                        @if ($a->cover_letter)
                            <img src="{{ asset('/storage/' . $a->cover_letter) }}" alt="Jobs Image" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>
                        {{ $a->status }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
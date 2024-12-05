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
    <a href="{{ route('admin.location.index') }}">back</a>

    <form action="{{ route('admin.location.store') }}" method="POST">
        @csrf
            <label for="locationName">Location Name</label>
            <input type="text" name="locationName" id="locationName" required>
                <br>
            <label for="locationDescription">Location Description</label>
            <input type="text" name="locationDescription" id="locationDescription" required>
                <br>
            <button type="submit">
                Add Location
            </button>
    </form>

    
</body>
</html>
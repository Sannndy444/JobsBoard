<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <a href="{{ route('admin.location.index') }}">back</a>

    <form action="{{ route('admin.location.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
            <label for="locationName">Location Name</label>
            <input type="text" name="locationName" id="locationName" value="{{ old('name', $location->name) }}" required>
                <br>
            <label for="locationDescription">Location Description</label>
            <input type="text" name="locationDescription" id="locationDescription" value="{{ old('name', $location->description) }}" required>
                <br>
            <button type="submit">
                Edit
            </button>
    </form>
</body>
</html>
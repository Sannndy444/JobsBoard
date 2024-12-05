<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Type</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <a href="{{ route('admin.type.index') }}">Back</a>
        <br>

    <form action="{{ route('admin.type.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')
            <label for="typeName">Type Name</label>
            <input type="text" name="typeName" id="typeName" value="{{ old('name', $type->name) }}" required>
                <br>
            <button type="submit">
                Update
            </button>
    </form>
</body>
</html>
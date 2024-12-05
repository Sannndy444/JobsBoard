<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Type</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <a href="{{ route('admin.type.index') }}">Back</a>
        <br>
    <form action="{{ route('admin.type.store') }}" method="POST">
        @csrf
            <label for="typeName">Type Name</label>
            <input type="text" name="typeName" id="typeName" required>
                <br>
            <button type="submit">
                Add Type
            </button>
    </form>
</body>
</html>
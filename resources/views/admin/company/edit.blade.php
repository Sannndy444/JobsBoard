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

    <form action="{{ route('admin.company.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="companyName">Company Name</label>
        <input type="text" name="companyName" id="companyName" value="{{ old('name', $company->name) }}" required>
            <br>
        <label for="companyDescription">Company Description</label>
        <input type="text" name="companyDescription" id="companyDescription" value="{{ old('description', $company->description) }}" required>
            <br>
        <button type="submit">
            Update
        </button>


    </form>
</body>
</html>
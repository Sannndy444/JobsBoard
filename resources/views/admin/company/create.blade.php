<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Company</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <form action="{{ route('admin.company.store') }}" method="POST">
        @csrf
            <label for="companyName">Company Name</label>
            <input type="text" id="companyName" name="companyName"> <br>
            <label for="companyDescription">Company Description</label>
            <textarea name="companyDescription" id="companyDescription"></textarea> <br>
            <button type="submit">Add</button>
    </form>
</body>
</html>
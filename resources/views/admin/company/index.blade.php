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

    <a href="{{ route('admin.company.create') }}">add company</a>
</body>
</html>
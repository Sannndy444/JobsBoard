<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-lg p-6 text-white">
                    Jobs
                </div>
                <div class="content-center pr-3">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <a href="{{ route('admin.jobs.create') }}">Add Jobs</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
        </div>
    </div>
</body>
</html>
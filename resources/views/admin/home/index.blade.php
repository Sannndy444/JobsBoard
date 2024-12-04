<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-grey overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container flex justify-center items-center gap-4 p-5">
                    <div class="w-full h-full p-9 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <p class="text-white">
                            User
                        </p>
                    </div>
                    <div class="w-full h-full p-9 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <p class="text-white">
                            Jobs
                        </p>
                    </div>
                    <div class="w-full h-full p-9 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <p class="text-white">
                            Company
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    
</body>
</html>
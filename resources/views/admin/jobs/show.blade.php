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

    <!-- Header -->
    <header class="bg-gray-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">Detail Information</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @foreach ($job as $j)
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">{{ $j->title }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        This is the detailed information for the selected item. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Aenean vehicula fermentum leo, nec sagittis nisi feugiat ac. Nulla sit amet nulla a libero gravida dignissim.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        Additional details can be added here. Duis ut sapien velit. Donec vel est sed purus tincidunt fringilla. Mauris 
                        ullamcorper risus sed lorem viverra feugiat.
                    </p>
            </div>
        @endforeach
        

        <!-- Button Section -->
        <div class="flex justify-between mt-10">
            <a href="/previous-page" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Back
            </a>
            <a href="/next-page" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                Next
            </a>
        </div>
    </main>

</body>
</html>
</body>
</html>
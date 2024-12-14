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
        
            <div class="bg-white shadow-lg rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">{{ $jobs->title }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Company Name : {{ $jobs->company->name }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        Type : {{ $jobs->type->name }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        Location : {{ $jobs->location->name }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        Max Assign : {{ $jobs->max_assign }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        Salary : ${{ $jobs->salary }}/m
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        {{ $jobs->description }}
                    </p>
                </div>
                <div>
                    <img src="{{ asset('/storage/JobsImage/' . $jobs->image) }}" alt="" class="w-full h-auto max-w-full max-h-[200px] object-cover">
                </div>
            </div>
       
        

        <!-- Button Section -->
        <div class="flex justify-between mt-10">
            <a href="{{ route('admin.jobs.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Back
            </a>
            <a href="{{ route('admin.jobs.edit', $jobs->id) }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                Edit
            </a>
        </div>
    </main>

</body>
</html>
</body>
</html>
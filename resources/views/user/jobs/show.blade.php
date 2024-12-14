
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-user-navbar></x-user-navbar>

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
                        Salary : ${{ $jobs->salary }}
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
            <a href="{{ route('user.jobs.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Back
            </a>
            @if ($existingAssign)
                <button class="focus:outline-none text-white bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600">
                        Jobs Already Assign
                </button>
            @else
                <form action="{{ route('user.jobs.assign', $jobs->id) }}" method="GET">
                    @csrf
                    @method('GET')
                    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Assign Job
                    </button>
                </form>
            @endif
        </div>
    </main>
</body>
</html>
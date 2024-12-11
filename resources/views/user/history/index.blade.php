<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <div class="container mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-center mb-6">Applications</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($application as $a)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $a->work->title }}</h2>
                    <h3 class="text-md font-semibold mb-2">{{ $a->work->location->name }}</h3>
                    <h3 class="text-md font-semibold mb-2">{{ $a->work->company->name }}</h2>
                    <h3 class="text-md font-semibold mb-2">{{ $a->work->type->name }}</h3>

                    <div class="mt-4">
                        @if ($a->status->value == 'pending')
                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-yellow-100 text-ywllow-600">
                                {{ ucfirst($a->status->value) }}
                            </span>
                        @elseif ($a->status->value == 'accepted')
                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-600">
                                {{ $a->status->value }}
                            </span>
                        @elseif ($a->status->value == 'rejected')
                            <span class="px-3 py-1 text-sm font-medium rounded-full bg-red-100 text-red-600">
                                {{ $a->status->value }}
                            </span>
                        @endif
                        
                    </div>
                </div>
            @empty
                No Data
            @endforelse
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-user-navbar></x-user-navbar>

    <div class="container mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-center mb-6">History Assign Job</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($application as $a)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $a->work->title }}</h2>
                    <h3 class="text-md font-semibold mb-2">{{ $a->work->location->name }}</h3>
                    <h3 class="text-md font-semibold mb-2">{{ $a->work->company->name }}</h2>
                    <h3 class="text-md font-semibold mb-2">{{ $a->work->type->name }}</h3>
                    <h3 class="text-md font-semibold mb-2">Salary : ${{ $a->work->salary }}</h2>

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

                    <div class="mt-4">
                        @if ($status)
                            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Interview Information
                            </button>

                            <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Details Interview
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Interview</label>
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                {{ $a->date }}
                                            </p>
                                        </div>
                                        <div class="p-4 md:p-5 space-y-4">
                                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time Interview</label>
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                {{ $a->time }}
                                            </p>
                                        </div>
                                        <div class="p-4 md:p-5 space-y-4">
                                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Interview</label>
                                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                {{ $a->link }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
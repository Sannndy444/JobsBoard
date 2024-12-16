<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <x-admin-navbar></x-admin-navbar>

    <div class="container mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-center mb-6">Applications</h1>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Error Alert!</span> {{ $error }}
            </div>
        </div>
        @endforeach
        @endif
        @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($application as $a)
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold mb-2">{{ $a->work->title }}</h2>
                <p class="text-sm text-gray-600 mb-2">User: <span class="font-medium">{{ $a->user->name }}</span></p>

                <div class="mb-2">
                    <p class="text-sm font-medium">Resume:</p>
                    <a href="{{ route('application.download.resume', $a->resume) }}" class="text-blue-500 hover:underline">
                        Download
                    </a>
                </div>

                <div class="mb-2">
                    <p class="text-sm font-medium">Cover Letter:</p>
                    <a href="{{ route('application.download.cover', $a->cover_letter) }}" class="text-blue-500 hover:underline">
                        Download
                    </a>
                </div>

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
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Accept
                                </h3>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form action="{{ route('application.accepted', $a->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PATCH')
                                    <div class="absolute inset-y-11.1 start-5 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker name="date" id="default-datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    <div>
                                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select time</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input type="time" name="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required />
                                        </div>
                                    </div>
                                    <div>
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Interview</label>
                                        <input type="text" name="link" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://" required />
                                    </div>
                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex">
                    @if ($statusAccept->contains($a->id))
                    <button class="focus:outline-none text-white bg-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Accepted
                    </button>
                    <button class="focus:outline-none text-white bg-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Rejected
                    </button>
                    </form>
                    @elseif ($statusPending ->contains($a->id))
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                        Accepted
                    </button>
                    <form action="{{ route('application.rejected', $a->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are you sure to rejected?')">
                            Rejected
                        </button>
                        @else
                        <button class="focus:outline-none text-white bg-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            Accepted
                        </button>
                        <button class="focus:outline-none text-white bg-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                            Rejected
                        </button>
                        @endif


                        <!-- @if ($statusAccept)
                    <button class="focus:outline-none text-white bg-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Accepted
                    </button>
                    @elseif ($statusPending)
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                        Pending
                    </button>
                    @else
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                        Accepted
                    </button>
                    @endif

                    @if ($statusReject)
                    <button class="focus:outline-none text-white bg-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Rejected
                    </button>
                    @else
                    <form action="{{ route('application.rejected', $a->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are you sure to rejected?')">
                            Rejected
                        </button>
                    </form>
                    @endif -->


                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
<script>

</script>

</html>
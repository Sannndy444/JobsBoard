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
            <br>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
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
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Success!</span> {{ session('success') }}
                        </div>
                    </div>
            @endif
        </div>
        
    </div>
    
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($jobs as $j)
                    <div class="flex flex-wrap p-2 gap-4">
                        <!-- Card 1 -->
                        <div class="flex flex-col bg-white shadow-md rounded-lg p-4 w-full md:w-[250px] min-h-[200px]">
                            <h2 class="text-lg font-semibold">{{ $j->title }}</h2>
                            <p class="text-gray-600 flex-grow">
                            {{ $j->company->name }}
                            </p>
                            <p class="text-gray-600 flex-grow">
                            {{ $j->type->name }}
                            </p>
                            <form action="{{ route('admin.jobs.show', $j->id) }}">
                                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">
                                    Show More
                                </button>
                            </form>
                            <form action="{{ route('admin.jobs.destroy', $j->id) }}">
                                <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg">
                                    Delete
                                </button>
                            </form>
                            
                        </div>
                    </div>
                @endforeach
                    

                <!-- <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Company</th>
                            <th>Type</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $j)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $j->title }}
                                </td>
                                <td>
                                    @if ($j->image)
                                        <img src="{{ asset('/storage/JobsImage/' . $j->image) }}" style="width: 100px; height: 100px; overlay: hidden;">
                                    @endif
                                </td>
                                <td>
                                    {{ $j->description }}
                                </td>
                                <td>{{ $j->location->name }}</td>
                                <td>{{ $j->company->name }}</td>
                                <td>{{ $j->type->name }}</td>
                                <td>{{ $j->salary }}</td>
                                <td>
                                    <form action="{{ route('admin.jobs.destroy', $j->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.jobs.edit', $j->id) }}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        /* Card Layout */
        .job-card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .job-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .job-card:hover {
            transform: translateY(-10px);
        }

        .job-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ddd;
        }

        .job-card-content {
            padding: 15px;
        }

        .job-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .job-card p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }

        .job-card .details {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #777;
        }

        .job-card .details span {
            display: block;
        }
    </style>
</head>
<body>
    <x-user-navbar></x-user-navbar>
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

    <br>

    <div class="job-card-container">
        @foreach ($jobs as $j)
                <div class="job-card">
                    <img src="{{ asset('/storage/JobsImage/' . $j->image) }}" alt="Job Image">
                    <div class="job-card-content">
                        <h3>{{ $j->title }}</h3>
                        <p class="max-w-xs truncate">{{ $j->description }}</p>
                        <div class="details">
                            <span>Max Assign: {{ $j->max_assign }}</span>
                            <span>{{ $j->company->name }}</span>
                        </div>
                        <div class="details">
                            <span>Type: {{ $j->type->name }}</span>
                            <span>Salary: ${{ $j->salary }}</span>
                        </div>
                        <button >
                            <a href="{{ route('user.jobs.show', $j->id) }}">
                                <button class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Show More
                                </button>
                            </a>
                        </button>
                        @php
                            // Ambil jumlah lamaran untuk pekerjaan ini
                            $currentWorkCount = $workCounts->get($j->id)->total ?? 0; // jika tidak ada lamaran, default ke 0
                        @endphp
                        @if ($currentWorkCount < $j->max_assign)
                            <form action="{{ route('user.jobs.assign', $j->id) }}" method="GET">
                                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Assign Job
                            </button>
                            </form>
                        @elseif ($existingAssign->has($j->id))
                            <button class="focus:outline-none text-white bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600">
                                Jobs Already Assign
                            </button>
                        @else
                            <button class="focus:outline-none text-white bg-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600">
                            Job Applicants Are Full
                            </button>
                        @endif
                    </div>
                </div>
        @endforeach
    </div>
</body>
</html>

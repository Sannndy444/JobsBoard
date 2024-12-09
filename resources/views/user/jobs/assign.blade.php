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

    <form action="{{ route('user.jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="work_id" value="{{ $jobs }}">
            <label for="jobsResume">Jobs Resume</label>
            <input type="file" name="resume" id="jobsResume">
                <br>
            <label for="jobsCoverLetter">Jobs Cover Letter</label>
            <input type="file" name="cover_letter" id="jobsCoverLetter">
                <br>
            <label for="jobsStatus">Jobs Status</label>
            <input type="text" name="status" id="jobsStatus">
                <br>
            <button type="submit">
                Assign Jobs
            </button>
    </form>
</body>
</html>
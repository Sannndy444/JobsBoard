<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-user-navbar></x-user-navbar>

    <div class="container mx-auto py-10 px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Assign Jobs</h1>

            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{ route('user.jobs.index') }}" class="text-blue-600 hover:underline">&larr; Back</a>

            <form action="{{ route('user.jobs.store') }}" method="POST" class="mt-6 space-y-4" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $jobs }}" name="work_id">
                <div>
                    <label for="resume" class="block text-sm font-medium text-gray-700">Resume</label>
                    <input type="file" name="resume" id="resume" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="coverLetter" class="block text-sm font-medium text-gray-700">Cover Letter</label>
                    <input type="file" name="cover_letter" id="coverLetter" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Assign Jobs
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

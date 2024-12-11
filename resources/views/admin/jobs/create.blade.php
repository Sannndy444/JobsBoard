<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-admin-navbar></x-admin-navbar>

    <div class="container mx-auto py-10 px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Add New Job</h1>

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

            <a href="{{ route('admin.jobs.index') }}" class="text-blue-600 hover:underline">&larr; Back</a>

            <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label for="jobsTitle" class="block text-sm font-medium text-gray-700">Job Title</label>
                    <input type="text" name="jobsTitle" id="jobsTitle" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="jobsImage" class="block text-sm font-medium text-gray-700">Job Image</label>
                    <input type="file" name="jobsImage" id="jobsImage" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label for="jobsDescription" class="block text-sm font-medium text-gray-700">Job Description</label>
                    <textarea name="jobsDescription" id="jobsDescription" rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div>
                    <label for="jobsCompany" class="block text-sm font-medium text-gray-700">Company</label>
                    <select name="jobsCompany" id="jobsCompany" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option selected>Choose Company</option>
                        @foreach ($company as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jobsLocation" class="block text-sm font-medium text-gray-700">Location</label>
                    <select name="jobsLocation" id="jobsLocation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option selected>Choose Location</option>
                        @foreach ($location as $l)
                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jobsType" class="block text-sm font-medium text-gray-700">Job Type</label>
                    <select name="jobsType" id="jobsType" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option selected>Choose Type</option>
                        @foreach ($type as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jobsMax" class="block text-sm font-medium text-gray-700">Max Assign</label>
                    <input type="number" name="jobsMax" id="jobsMax" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="jobsSalary" class="block text-sm font-medium text-gray-700">Salary</label>
                    <input type="number" name="jobsSalary" id="jobsSalary" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Add Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

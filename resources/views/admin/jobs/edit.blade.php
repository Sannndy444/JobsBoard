<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-admin-navbar></x-admin-navbar>

    <div class="container mx-auto py-10 px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Edit Job</h1>

            <a href="{{ route('admin.jobs.index') }}" class="text-blue-600 hover:underline">&larr; Back</a>

            <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="jobsTitle" class="block text-sm font-medium text-gray-700">Jobs Title</label>
                    <input type="text" name="jobsTitle" id="jobsTitle" value="{{ old('title', $job->title) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="jobsImage" class="block text-sm font-medium text-gray-700">Jobs Image</label>
                    <input type="file" name="jobsImage" id="jobsImage"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="jobsDescription" class="block text-sm font-medium text-gray-700">Jobs Description</label>
                    <textarea name="jobsDescription" id="jobsDescription" rows="4" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $job->description) }}</textarea>
                </div>

                <div>
                    <label for="jobsCompany" class="block text-sm font-medium text-gray-700">Jobs Company</label>
                    <select name="jobsCompany" id="jobsCompany" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($company as $company)
                            <option value="{{ $company->id }}" {{ $company->id == old('company', $company->id) ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jobsLocation" class="block text-sm font-medium text-gray-700">Jobs Location</label>
                    <select name="jobsLocation" id="jobsLocation" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($location as $location)
                            <option value="{{ $location->id }}" {{ $location->id == old('location', $location->id) ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jobsType" class="block text-sm font-medium text-gray-700">Jobs Type</label>
                    <select name="jobsType" id="jobsType" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($type as $type)
                            <option value="{{ $type->id }}" {{ $type->id == old('type', $type->id) ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jobsSalary" class="block text-sm font-medium text-gray-700">Jobs Salary</label>
                    <input type="number" name="jobsSalary" id="jobsSalary" value="{{ old('salary', $job->salary) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

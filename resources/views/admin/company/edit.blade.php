<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <x-admin-navbar></x-admin-navbar>

    <div class="container mx-auto py-10 px-4">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Edit Company</h1>

            <a href="{{ route('admin.company.create') }}" class="text-blue-600 hover:underline">&larr; Back</a>

            <form action="{{ route('admin.company.update', $company->id) }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" name="companyName" id="companyName" value="{{ old('name', $company->name) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="companyDescription" class="block text-sm font-medium text-gray-700">Company Description</label>
                    <textarea name="companyDescription" id="companyDescription" rows="4" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $company->description) }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update Company
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

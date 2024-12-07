
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>
        <br>
    <a href="{{ route('admin.jobs.index') }}">Back</a>
        <br>

        <br>

        <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <label for="jobsTitle">Jobs Title</label>
                <input type="text" name="jobsTitle" id="jobsTitle" value="{{ old('title', $job->title) }}">
                    <br>
                <label for="jobsImage">Jobs Image</label>
                <input type="file" name="jobsImage" id="jobsImage" value="{{ old('image', $job->image) }}">
                    <br>
                <label for="jobsDescription">Jobs Description</label>
                <input type="text" name="jobsDescription" id="jobsDescription" value="{{ old('description', $job->description) }}">
                    <br>
                <select name="jobsCompany" required>
    @foreach($company as $company)
        <option value="{{ $company->id }}" {{ $company->id == old('company', $company->id) ? 'selected' : '' }}>
            {{ $company->name }}
        </option>
    @endforeach
</select>

<select name="jobsLocation" required>
    @foreach($location as $location)
        <option value="{{ $location->id }}" {{ $location->id == old('location', $location->id) ? 'selected' : '' }}>
            {{ $location->name }}
        </option>
    @endforeach
</select>

<select name="jobsType" required>
    @foreach($type as $type)
        <option value="{{ $type->id }}" {{ $type->id == old('type', $type->id) ? 'selected' : '' }}>
            {{ $type->name }}
        </option>
    @endforeach
</select>
                    <br>
                <label for="jobsSalary">Jobs Salary</label>
                <input type="number" name="jobsSalary" id="jobsSalary" value="{{ old('salary', $job->salary) }}">
                    <br>
                <button type="submit">
                    Update
                </button>
        </form>
</body>
</html>
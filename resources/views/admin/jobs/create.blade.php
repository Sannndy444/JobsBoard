<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jobs</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-admin-navbar></x-admin-navbar>

    <div class="row mt-2">
                    <div class="col">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

    <a href="{{ route('admin.jobs.index') }}">Back</a> <br>

    <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="jobsTitle">Jobs Title</label>
            <input type="text" name="jobsTitle" id="jobsTitle" required>
                <br>
            <label for="jobsImage">Jobs Image</label>
            <input type="file" name="jobsImage" id="jobsImage" required>
                <br>
            <label for="jobsDescription">Jobs Description</label>
            <textarea name="jobsDescription" id="jobsDescription"></textarea>
                <br>
            <label for="jobsCompany">Jobs Company</label>
            <select name="jobsCompany" id="jobsCompany">
                <option selected>Choose Company</option>
                    @foreach ($company as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
            </select>
                <br>
            <label for="jobsLocation">Jobs Location</label>
            <select name="jobsLocation" id="jobsLocation">
                <option selected>Choose Location</option>
                    @foreach ($location as $l)
                        <option value="{{ $l->id }}">{{ $l->name }}</option>
                    @endforeach
            </select>
                <br>
            <label for="jobsType">Jobs Type</label>
            <select name="jobsType" id="jobsType">
                <option selected>Choose Type</option>
                    @foreach ($type as $t)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
            </select>
                <br>
            <label for="jobsSalary">Jobs Salary</label>
            <input type="number" name="jobsSalary" id="jobsSalary" required>
                <br>
            <button type="submit">
                Add Jobs
            </button>
    </form>
</body>
</html>
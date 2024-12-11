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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($application as $a)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $a->work->title }}</h2>
                    <p class="text-sm text-gray-600 mb-2">User: <span class="font-medium">{{ $a->user->name }}</span></p>

                    <div class="mb-2">
                        <p class="text-sm font-medium">Resume:</p>
                        @if ($a->resume)
                            @forelse ($file as $f)
                                <a href="{{ route('application.download', $f->resume) }}">Download</a>
                            @empty
                                No
                            @endforelse
                        @else
                            <p class="text-gray-500">No resume uploaded</p>
                        @endif
                    </div>

                    <div class="mb-2">
                        <p class="text-sm font-medium">Cover Letter:</p>
                        @if ($a->cover_letter)
                            @forelse ($file as $f)
                                <a href="{{ route('application.download', $f->cover_letter) }}">Download</a>
                            @empty
                                No
                            @endforelse
                        @else
                            <p class="text-gray-500">No resume uploaded</p>
                        @endif
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
                    <div class="mt-4">
                        <form action="{{ route('application.accepted', $a->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">
                                Accepted
                            </button>
                        </form>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('application.rejected', $a->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">
                                Rejected
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

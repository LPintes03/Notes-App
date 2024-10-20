<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources\css\card.css')
    @vite('resources/css/sidebar.css')
    <title>Note</title>
</head>

<body>
    <x-app-layout>


        <div class="notes">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <div class="d-flex justify-content-between mb-3">
                            <h4>My Notes</h4>
                            <a href="{{ route('createNote') }}" class="btn btn-dark">New Note</a>
                        </div>

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($notes as $note)

                            <div class="container">
                                <div class="card">
                                    <div class="face face1">
                                        <div class="content">
                                            <h3 href="{{ route('viewNote', ['id' => $note->id]) }}" style="color: #493628; text-decoration: none;">{{ $note->title }}</h3>

                                        </div>
                                    </div>
                                    <div class="face face2">
                                        <div class="content">
                                            <p>{{ $note->description }}</p>
                                            <div class="card-footer d-flex justify-content-between">
                                                <a href="{{ route('editNote', ['id' => $note->id]) }}" style="color: #493628; text-decoration: none;">View</a>
                                                <a href="{{ route('deleteNote', ['id' => $note->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                                <small class="text-body-secondary">{{ \Carbon\Carbon::parse($note->updated_at)->format('d/m/Y g:i A') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
</body>

</html>
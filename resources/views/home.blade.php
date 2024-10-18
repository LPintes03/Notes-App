home

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note</title>
</head>

<body>
    <<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
        </div>
        </nav>

        <h1>Note App
        </h1>


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
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ route('editNote', ['id' => $note->id]) }}" style="color: #493628; text-decoration: none;">
                                        <h5 class="card-title">{{ $note->title }}</h5>
                                    </a>
                                    <p class="card-text">{{ $note->description }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('editNote', ['id' => $note->id]) }}" class="btn btn-danger" >Edit</a>
                                    <a href="{{ route('deleteNote', ['id' => $note->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    <small class="text-body-secondary">{{ \Carbon\Carbon::parse($note->updated_at)->format('d/m/Y g:i A') }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
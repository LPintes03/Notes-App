<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources\css\card.css')
    <title>Document</title>
</head>

<body>
    <div class="title">Ink Vault</div>
    <div class="date"> <a href="{{ route('createNote') }}" class="btn btn-dark" style="color: #493628; text-decoration: none;">New Note</a></div>
    <div class="columns -mt-2">
        @foreach ($notes as $index => $note)
       
            <div>
            <h1>{{ $note->title }}</h1>
            <p>{{ $note->description }}</p>
            <p>{{ $note->content }}</p>
            <img src="https://static.codepen.io/assets/marketing/challenges/amd-pacman-jpg-603c12d2572aceb1bfbf7cb8e426160dfb4cce641bc01bfe7a42a7829fcbca41.jpg">
            <div class="d-flex justify-content-between">
                <a href="{{ route('editNote', ['id' => $note->id]) }}" style="color: #493628; text-decoration: none;">View</a>
                <a href="{{ route('deleteNote', ['id' => $note->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')"style="color: #493628; text-decoration: none;">Delete</a>
                <small class="text-body-secondary">{{ \Carbon\Carbon::parse($note->updated_at)->format('d/m/Y g:i A') }}</small>
            </div>
    </div>

   
    @endforeach
    </div>
    <div class="footer">Codepen Times</div>
</body>

</html>
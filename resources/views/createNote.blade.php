<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InkVault</title>
</head>

<body>
    <x-app-layout>
        <h1>Note App</h1>

        <form action="{{ route('createNoteSubmission') }}" method="POST" id="noteForm">
            @csrf
            @method('POST')

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>
            </div>

            <div>
                <label for="content">Content:</label>
                <input type="text" id="content" name="content" required>
            </div>

            <button type="submit">Submit</button>
        </form>

        <form action="{{ route('home') }}" method="GET">
            <button type="submit">Back</button>
        </form>
    </x-app-layout>

</body>

</html>
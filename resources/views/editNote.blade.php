<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InkVault</title>
</head>

<body>
    <h1>Note App</h1>

    <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{ $note->description }}" required>
        </div>

        <div>
            <label for="content">Content:</label>
            <input type="text" id="content" name="content" value="{{ $note->content }}" required>
        </div>


        <button type="submit">Update</button>
        </form>

</body>

</html>

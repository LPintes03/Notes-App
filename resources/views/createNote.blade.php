<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Summernote -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources\css\create.css')
    @vite('resources\css\notification.css')
    <title>InkVault</title>
</head>



<body class="light-mode">


    <div class="columns ">

        <form action="{{ route('createNoteSubmission') }}" method="POST" id="noteForm">
            @csrf
            @method('POST')
            <a href="{{ route('home') }}" class="button-54" role="button">Back</a>
            <div>
                <input type="text" name="title" class="title" id="title" value="Untitled document" maxlength='60'></input>
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div>
                <input type="text" name="description" class="sub-title" placeholder=" Description..." maxlength='150'></input>
                @if ($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div>
                <textarea type="text" name="content" class="content" id="content" maxlength='10000'></textarea>
                @if ($errors->has('content'))
                <div class="error">{{ $errors->first('content') }}</div>
                @endif
            </div>


            <!-- HTML !-->
            <button type="submit" class="button-54" role="button">Submit</button>
        </form>
    </div>


    <script>
        // theme.js

        function myFunction() {
            var element = document.body;
            element.classList.toggle("dark-mode");

            // Save the theme preference
            if (element.classList.contains("dark-mode")) {
                localStorage.setItem("theme", "dark");
            } else {
                localStorage.setItem("theme", "light");
            }
        }

        function loadTheme() {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme === "dark") {
                document.body.classList.add("dark-mode");
            }
        }

        // Load the theme when the page is loaded
        document.addEventListener("DOMContentLoaded", loadTheme);
    </script>

</body>

</html>
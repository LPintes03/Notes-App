<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/5.0/getting-started/introduction/"></script>

    <!-- Theme -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-indigo.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @vite('resources\css\create.css')
    @vite('resources/css/theme.css')
    @vite('resources\css\notification.css')
    <title>InkVault</title>
</head>



<body>
    <div class="title">Ink Vault </div>
    <div class="sidebar">
        <a href="{{ route('home') }}"><i class='bx bxs-chevron-left'></i><span>Back</span></a>
        <a href="{{ route('viewTrash', ['id' ]) }}" class="w3-bar-item w3-button"><i class='bx bxs-trash'></i><span>Trash</span></a>
        <a id="theme-toggle" class="theme" onclick="myFunction()"><i class='bx bx-palette'></i><span>Theme</span></a>
    </div>

    <div class="view">

        <div class="content">
            <form action="{{ route('createNoteSubmission') }}" method="POST">
                @csrf
                @method('POST')
                <div>
                    <input type="text" name="title" class="h1" id="title" value="Untitled document" maxlength='60'></input>
                    @if ($errors->has('title'))
                    <span class="error">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div>
                    <input type="text" name="description" class="description" placeholder=" Description..." maxlength='150'></input>
                    @if ($errors->has('description'))
                    <div class="error">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div>
                    <textarea type="text" name="content" class="scroll-container"id="content" maxlength='10000'></textarea>
                    @if ($errors->has('content'))
                    <div class="error">{{ $errors->first('content') }}</div>
                    @endif
                </div>
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
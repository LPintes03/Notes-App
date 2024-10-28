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
    @vite('resources/css/view.css')
    @vite('resources/css/theme.css')
    @vite('resources/css/notification.css')

    <title>Ink Vault</title>
</head>


<body >
    @if (session('status'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 1500,
        });

        Toast.fire({
            icon: 'success',
            title: "{{ session('status') }}",
        });
    </script>
    @endif


    <div class="title">Ink Vault </div>
    <div class="sidebar">
        <a href="{{ route('home') }}"><i class='bx bxs-chevron-left'></i><span>Back</span></a>
        <a href="{{ route('viewTrash', ['id' ]) }}" class="w3-bar-item w3-button"><i class='bx bxs-trash'></i><span>Trash</span></a>
        <a id="theme-toggle" class="theme" onclick="myFunction()"><i class='bx bx-palette'></i><span>Theme</span></a>
    </div>


    <div class="view">

        <div class="content">
            <small class="date">{{ \Carbon\Carbon::parse($note->updated_at)->format('F/j/Y g:i A') }}</small>
            <a class="right" href="{{ route('deleteNote', ['id' => $note->id]) }}" onclick="confirmation(event)"><i class='bx bxs-trash'></i></a>
            <a class="right" href="{{ route('editNote', ['id' => $note->id]) }}"><i class='bx bxs-edit'></i></a>

            <h1> {{ $note->title }}</h1>
            <p>{{ $note->description }}</p>
            <textarea readonly class="scroll-container">{{ $note->content }}</textarea>
            <!-- <img src="https://24ai.tech/en/wp-content/uploads/sites/3/2023/10/01_product_1_sdelat-izobrazhenie-1-1-5-scaled.jpg"> -->

        </div>

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


        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure to Delete this post",
                    text: "You will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {

                        window.location.href = urlToRedirect;
                    }

                });
        }
    </script>
</body>

</html>
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
    <!-- Vite CSS -->
    @vite('resources/css/home.css')
    @vite('resources/css/theme.css')
    @vite('resources/css/sidebar.css')
    @vite('resources/css/notification.css')

    <title>Ink Vault</title>
</head>


<body>
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

        })
        Toast.fire({
            icon: 'success',
            title: "{{session('status')}}",
        })
    </script>
    @endif

    <div class="title">Ink Vault</div>
    <div class="sidebar">
        <a href="{{ route('home') }}" class="w3-bar-item w3-button"><i class='bx bxs-home'></i></i><span>Home</span></a>
        <a href="#" class="active"><i class='bx bxs-trash'></i><span>Trash</span></a>
        <a class="theme" onclick="myFunction()"><i class='bx bx-palette'></i><span>Theme</span></a>
    </div>
    <div id="main-content">
        <form action="/action_page.php">
            <input type="text" name="search" id="search" placeholder="Search Notes" class="form-control" onfocus="this.value=''">
            <div id="search_list"></div>
        </form>

        <div class="columns -mt-2">

            @foreach ($notes as $note)
            <div class="content">
                <ul class="nav">
                    <div class="kebab">
                        <figure></figure>
                        <figure class="middle"></figure>
                        <p class="cross"></p>
                        <figure></figure>
                        <ul class="dropdown">
                            <!-- Restore Note Link -->
                            <li><a href="{{ route('restoreNote', ['id' => $note->id]) }}"><i class='bx bx-reset'></i>Restore</a></li>
                            <!-- Form for Force Delete -->
                            <li>
                                <form id="delete-form-{{ $note->id }}" action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="action" value="forceDelete">
                                </form>
                                <a href="#" onclick="confirmation(event, '{{ $note->id }}')"><i class='bx bxs-trash-alt'></i> Delete</a>
                            </li>

                            </li>
                        </ul>
                    </div>
                </ul>

                <small class="date">{{ \Carbon\Carbon::parse($note->deleted_at)->format('F/j/Y g:i A') }}</small>
                <h1>{{ $note->title }} </h1>
                <p>{{ $note->description }}</p>
                <p>{{ $note->content }} </p>

            </div>
            @endforeach
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


        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "search",
                    type: "GET",
                    data: {
                        'search': query
                    },
                    success: function(data) {
                        if (data.trim() !== '') {
                            $('#search_list').html(data).show(); // Show the dropdown with results
                        } else {
                            $('#search_list').hide(); // Hide if no results
                        }
                    }
                });
            });

            // Hide the search suggestions when clicking outside
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#search').length) {
                    $('#search_list').hide();
                }
            });

            // Show again when the user clicks back on the search input
            $('#search').on('focus', function() {
                if ($('#search_list').html().trim() !== '') {
                    $('#search_list').show(); // Show again if there are results
                }
            });
        });
        // Loop through all kebab menus
        document.querySelectorAll('.kebab').forEach(function(kebab) {
            var middle = kebab.querySelector('.middle'),
                cross = kebab.querySelector('.cross'),
                dropdown = kebab.querySelector('.dropdown');

            // Toggle dropdown on kebab click
            kebab.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevents the click from closing immediately
                middle.classList.toggle('active');
                cross.classList.toggle('active');
                dropdown.classList.toggle('active');
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function(event) {
                if (!kebab.contains(event.target) && !dropdown.contains(event.target)) {
                    middle.classList.remove('active');
                    cross.classList.remove('active');
                    dropdown.classList.remove('active');
                }
            });
        });


        function confirmation(ev, noteId) {
            ev.preventDefault();

            swal({
                title: "Are you sure to delete this post?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // Submit the form for the specified note ID
                    document.getElementById('delete-form-' + noteId).submit();
                }
            });
        }
    </script>

</body>

</html>
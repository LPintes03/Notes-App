<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/sidebar.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>

<body>

    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bx-codepen"></i>
                <span>InkVault</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
            <img src="https://easy-peasy.ai/cdn-cgi/image/quality=80,format=auto,width=700/https://fdczvxmwwjwpwbeeqcth.supabase.co/storage/v1/object/public/images/e3ef9712-44cb-40f7-940e-ec15fd343917/5eace28e-5cad-41e0-98b3-e849d44c31f6.png" alt="me" class="user-img">
            <div>
                <p class="bold">Mika Rei</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-book"></i>
                    <span class="nav-item">Notebook 1</span>
                </a>
                <span class="tooltip">Notebook 1</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-log-out"></i>
                    <span class="nav-item">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h1>InkVault</h1>
            <h2>Right</h2>
        </div>
    </div>

</body>

<script>
    let btn = document.querySelector('#btn')
    let sidebar = document.querySelector('.sidebar')

    btn.onclick = function() {
        sidebar.classList.toggle('active')
    };
</script>

</html>
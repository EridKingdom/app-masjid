<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.18, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="assets/images/logo-app-128x152.png" type="image/x-icon">
    <meta name="description" content="">

    <title>Masjid</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@400;700&display=swap">
    </noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css?v=N4qxfg">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css?v=N4qxfg" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <section data-bs-version="5.1" class="menu menu2 cid-ubOPQL1iFt" once="menu" id="menu-5-ubOPQL1iFt">
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
            <div class="container">
                <div class="sidebar-tombol">
                    <button class="sidebar-tombol" type="button" onclick="toggleSidebar()">
                        &#9776; <!-- HTML entity for hamburger icon -->
                    </button>
                    <script>
                        function toggleSidebar() {
                            const sidebar = document.querySelector('.sidebar');
                            if (sidebar.style.display === 'block') {
                                sidebar.style.display = 'none';
                            } else {
                                sidebar.style.display = 'block';
                            }
                        }
                    </script>
                </div>
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <img src="assets/images/logo2-269x103.png" alt="Logo" style="height: 3.2rem;">
                    </span>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-cari">
                            <form class="cari" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success tombolcari" type="submit">
                                    <i class="fas fa-search"></i> <!-- Ikon pencarian dari Font Awesome -->
                                </button>
                            </form>
                        </li>
                    </ul>

                    <div class="icons-menu">
                        <a class="iconfont-wrapper" href="#">
                            <span class="p-2 mbr-iconfont mobi-mbri-phone mobi-mbri"></span>
                        </a>
                        <a class="iconfont-wrapper" href="#">
                            <span class="p-2 mbr-iconfont mobi-mbri-letter mobi-mbri"></span>
                        </a>
                    </div>

                </div>
            </div>
        </nav>
        <div class="sidebar" style="display: none;"> <!-- Adjust margin-top to match the navbar height, initially hidden -->
            <a class="nav-link link text-black text-primary display-4" href="<?= base_url('/'); ?>">Beranda</a>
            <a class="nav-link link text-black text-primary display-4" href="<?= base_url('/masjid'); ?>">Masjid</a>
            <a class="nav-link link text-black text-primary display-4" href="<?= base_url('/zakat'); ?>">Zakat</a>
            <a class="nav-link link text-black text-primary display-4" href="page3.html">Infak Anak yatim</a>
            <div class="sidebar-login">
                <a class="sidebar-login-tombol" href="<?= base_url('/login'); ?>">Login</a>
            </div>
        </div>
        <script>
            function toggleSidebar() {
                const sidebar = document.querySelector('.sidebar');
                if (sidebar.style.display === 'none') {
                    sidebar.style.display = 'block';
                    sidebar.animate([{
                        opacity: 0
                    }, {
                        opacity: 1
                    }], {
                        duration: 300,
                        fill: 'forwards'
                    });
                } else {
                    sidebar.animate([{
                        opacity: 1
                    }, {
                        opacity: 0
                    }], {
                        duration: 300,
                        fill: 'forwards'
                    }).onfinish = () => {
                        sidebar.style.display = 'none';
                    };
                }
            }
        </script>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarToggler = document.querySelector('.sidebar-toggler');
            const sidebar = document.querySelector('.sidebar'); // Pastikan selector ini sesuai dengan sidebar Anda

            sidebarToggler.addEventListener('click', function() {
                sidebar.classList.toggle('active'); // 'active' adalah class yang menunjukkan sidebar
            });
        });
    </script>
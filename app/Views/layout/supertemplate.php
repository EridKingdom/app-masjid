<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.18, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo-app-128x152.png" type="image/x-icon">
    <meta name="description" content="">

    <title>Masjid</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@400;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@400;700&display=swap">
    </noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="<?= base_url(); ?>/assets/mobirise/css/mbr-additional.css?v=N4qxfg">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/mobirise/css/mbr-additional.css?v=N4qxfg" type="text/css">
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
                        <img src="<?= base_url(); ?>/assets/images/logo2-269x103.png" alt="Logo" style="height: 3.2rem;">
                    </span>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <?php if (isset($showSearch) && $showSearch === true) : ?>
                            <li class="nav-cari">
                                <form class="cari" role="search" action="<?= base_url('/Daftar-Masjid'); ?>" method="GET">
                                    <input class="form-control me-2" type="search" name="keyword" placeholder="CARI MASJID..." aria-label="Search">
                                    <button class="btn btn-outline-success tombolcari" type="submit">
                                        <i class="fas fa-search"></i> <!-- Ikon pencarian dari Font Awesome -->
                                    </button>
                                </form>
                            </li>
                        <?php endif; ?>
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
            <div class="sidebar-content">
                <h3 class="text-black text-primary display-4 text-center">Super ADMIN Panel</h3>
                <a class="nav-link link text-black text-primary display-4" href="<?= base_url('/dashboardSuper'); ?>">Dashboard</a>
                <a class="nav-link link text-black text-primary display-4" href="<?= base_url('/Daftar-Masjid'); ?>">Data Masjid</a>
                <a class="nav-link link text-black text-primary display-4" href="#">Pendaftaran</a>
                <a class="nav-link link text-black text-primary display-4" href="#">Pengajuan Akun</a>
            </div>
            <div class="sidebar-login">
                <a class="sidebar-login-tombol" href="<?= base_url('/login'); ?>">Admin Logout</a>
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

            // sidebarToggler.addEventListener('click', function() {
            //     sidebar.classList.toggle('active'); // 'active' adalah class yang menunjukkan sidebar
            // });
        });
    </script>

    <?= $this->renderSection('content'); ?>


    <section data-bs-version="5.1" class="footer4 cid-ubOPQL6frt" once="footers" id="footer04-2">





        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">© 2024 Imam Masjid. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/smoothscroll/smooth-scroll.js"></script>
    <script src="<?= base_url(); ?>/assets/ytplayer/index.js"></script>
    <script src="<?= base_url(); ?>/assets/dropdown/js/navbar-dropdown.js"></script>
    <script src="<?= base_url(); ?>/assets/theme/js/script.js"></script>
    <script src="<?= base_url(); ?>/assets/formoid/formoid.min.js"></script>
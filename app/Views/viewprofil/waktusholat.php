<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waktu Sholat</title>
    <!-- Menyertakan CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item {
            height: 100vh;
            /* Adjust the height as needed */
            background-size: cover;
            background-position: center;
        }

        .card-header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .prayer-time {
            text-align: center;
            margin: 10px;
        }

        .prayer-time span {
            display: block;
            font-size: 1.2em;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Optional: Add a dark overlay */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .content {
            position: relative;
            z-index: 2;
            width: 60%;
            margin-top: 200px;
        }

        .carousel-container {
            position: relative;
        }

        .masjid-info {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            color: white;
            z-index: 10;
            /* Ensure it is above other elements */
        }

        .masjid-info img {
            width: 100px;
            height: 100px;
            border-radius: 100%;
            margin-right: 10px;
            object-fit: cover;
        }

        .masjid-info h1 {
            font-size: 3.5em;
            margin: 10;
        }

        .card-sholat {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 80%;
        }

        .card-waktu-sholat {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 200px;
            margin: 0 10px;
            margin-left: 150vh;
            margin-bottom: 10vh;
        }

        .cardjam {
            background-color: green;
            border-radius: 10px;
            color: white;
            margin-bottom: 20px;
            padding: 10px;
        }

        .cardjam h3 {
            font-size: 1.5em;
            margin: 0;
        }

        .cardjam p {
            font-size: 1.2em;
            margin: 0;
        }

        .prayer-time {
            margin: 10px 0;
        }

        .prayer-time span:first-child {
            display: block;
            font-size: 1.2em;
            font-weight: bold;
        }

        .prayer-time span:last-child {
            display: block;
            font-size: 1.1em;
        }

        .opstion {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 10;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            margin-right: 45vh;
        }

        .opstion p {
            text-align: justify;
        }


        @media (max-width: 768px) {
            .opstion {
                display: none;
            }
        }

        .p {
            margin-top: 0;
            margin-bottom: 1rem;
            max-width: 120vh !important;
        }
    </style>
</head>

<body>
    <section data-bs-version="5.1" class="slider3 cid-ueOcGCqmku" id="slider03-1o">
        <div class="carousel-container">
            <div class="masjid-info">
                <img src="<?= base_url('img/' . esc($masjid['sampul'])); ?>" alt="Sampul Masjid">
                <h1><?= esc($masjid['nama_masjid']); ?></h1>
            </div>
            <div class="carousel slide" id="ueOkfUJH6x" data-interval="5000" data-bs-interval="5000">
                <?php
                // Menentukan apakah ada gambar untuk ditampilkan
                $hasImages = !empty($masjid['gambar1']) || !empty($masjid['gambar2']) || !empty($masjid['gambar3']);
                ?>
                <div class="carousel-inner">
                    <?php if ($hasImages || !empty($tb_kegiatan)) : ?>
                        <div class="carousel-item active">
                            <div class="item-wrapper">
                                <img class="d-block w-100" src="<?= base_url('img/' . esc($masjid['gambar1'])); ?>" alt="First Image">
                            </div>
                        </div>
                        <?php if (!empty($masjid['gambar2'])) : ?>
                            <div class="carousel-item">
                                <div class="item-wrapper">
                                    <img class="d-block w-100" src="<?= base_url('img/' . esc($masjid['gambar2'])); ?>" alt="Second Image">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($masjid['gambar3'])) : ?>
                            <div class="carousel-item">
                                <div class="item-wrapper">
                                    <img class="d-block w-100" src="<?= base_url('img/' . esc($masjid['gambar3'])); ?>" alt="Third Image">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php foreach ($tb_kegiatan as $kegiatan) : ?>
                            <?php if (!empty($kegiatan['gambar_kegiatan'])) : ?>
                                <div class="carousel-item">
                                    <div class="item-wrapper">
                                        <img class="d-block w-100" src="<?= base_url('imgpostingan/' . esc($kegiatan['gambar_kegiatan'])); ?>" alt="<?= esc($kegiatan['judul_kegiatan']); ?>">
                                        <div class="opstion">
                                            <h5><?= esc($kegiatan['judul_kegiatan']); ?></h5>
                                            <p><?= esc(explode("\n", $kegiatan['deskripsi_kegiatan'])[0]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                            <p>No images available.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" data-bs-slide="prev" href="#ueOkfUJH6x">
                <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
                <span class="sr-only visually-hidden">Previous</span>
            </a>
            <a class="carousel-control carousel-control-next" role="button" data-slide="next" data-bs-slide="next" href="#ueOkfUJH6x">
                <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
                <span class="sr-only visually-hidden">Next</span>
            </a>
            <div class="overlay">
                <div class="contentsolat">
                    <div class="card-sholat">
                        <div class="card-waktu-sholat">
                            <div class="cardjam">
                                <h3 id="current-time"></h3>
                                <p id="current-day"></p>
                            </div>
                            <span class="prayer-time">Jadwal Sholat :</span>
                            <div class="prayer-time">
                                <span>SHUBUH</span>
                                <span id="subuh-time">5:12</span>
                            </div>
                            <div class="prayer-time">
                                <span>DZUHUR</span>
                                <span id="zuhur-time">12:33</span>
                            </div>
                            <div class="prayer-time">
                                <span>ASHAR</span>
                                <span id="asar-time">15:50</span>
                            </div>
                            <div class="prayer-time">
                                <span>MAGHRIB</span>
                                <span id="magrib-time">18:37</span>
                            </div>
                            <div class="prayer-time">
                                <span>'ISYA</span>
                                <span id="isya-time">19:45</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menyertakan JS Bootstrap dan dependensi -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour12: false
            });
            const dayString = now.toLocaleDateString('id-ID', {
                weekday: 'long'
            }).toUpperCase();

            document.getElementById('current-time').textContent = timeString;
            document.getElementById('current-day').textContent = dayString;
        }

        // Update time immediately and then every second
        updateTime();
        setInterval(updateTime, 1000);

        function fetchPrayerTimes() {
            const apiURLLocation = "https://api.myquran.com/v2/sholat/kota/cari/";
            const apiURLPrayer = "https://api.myquran.com/v2/sholat/jadwal/";
            const todayDate = new Date();
            const formatDate = todayDate.getFullYear() + '-' + todayDate.getMonth() + '-' + todayDate.getDate();
            let kota = '<?= $masjid['kota_kab'] ?>';
            if (!kota) kota = 'Kota Padang';

            console.log("Fetching prayer times for city:", kota); // Logging

            fetch(apiURLLocation + kota)
                .then(response => response.json())
                .then(data => {
                    const idKota = data.status ? data.data[0].id : '0314';
                    console.log("City ID found:", idKota); // Logging
                    fetch(apiURLPrayer + idKota + '/' + formatDate)
                        .then(response => response.json())
                        .then(d => {
                            console.log("Prayer times response:", d); // Logging
                            if (d.status) {
                                displayPrayerTimes(d.data);
                            } else {
                                console.error('Error in prayer times response:', d);
                            }
                        })
                        .catch(error => console.error('Error fetching prayer times:', error));


                })
                .catch(error => console.error('Error fetching city ID:', error));
        }

        function displayPrayerTimes(data) {
            const times = data.jadwal;
            console.log("Displaying prayer times:", times); // Logging

            // Check if elements exist before setting their text content
            if (document.getElementById('subuh-time')) {
                document.getElementById('subuh-time').textContent = times.subuh;
            }
            if (document.getElementById('zuhur-time')) {
                document.getElementById('zuhur-time').textContent = times.dzuhur;
            }
            if (document.getElementById('asar-time')) {
                document.getElementById('asar-time').textContent = times.ashar;
            }
            if (document.getElementById('magrib-time')) {
                document.getElementById('magrib-time').textContent = times.maghrib;
            }
            if (document.getElementById('isya-time')) {
                document.getElementById('isya-time').textContent = times.isya;
            }
        }

        // Call fetchPrayerTimes on window load to display the times immediately
        window.onload = fetchPrayerTimes;
    </script>
</body>

<footer style="background-color: black; color: white; padding: 10px 0; position: fixed; bottom: 0; width: 100%;">
    <marquee behavior="scroll" direction="left">
        <?php foreach ($tb_kegiatan as $kegiatan) : ?>
            <span style="margin-right: 50px;"><?= esc($kegiatan['judul_kegiatan']); ?></span>
        <?php endforeach; ?>
    </marquee>
</footer>

</html>
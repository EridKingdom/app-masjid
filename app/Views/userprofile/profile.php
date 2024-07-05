<?= $this->extend('layout/admintemplate'); ?>
<?= $this->Section('content'); ?>

<section data-bs-version="5.1" class="slider3 cid-ueOcGCqmku" id="slider03-1o">

    <div class="carousel slide" id="ueOkfUJH6x" data-interval="5000" data-bs-interval="5000">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Mengambil data user dari session
                $session = session();
                $userData = $session->get('user_data');
                $id_user = $userData['id_user'] ?? null;

                // Fetch the masjid data from the database
                $masjid = [];
                $tb_kegiatan = [];
                if ($id_user) {
                    $db = \Config\Database::connect();
                    // Pastikan kolom yang digunakan dalam query sesuai dengan kolom yang ada di tabel db_data_masjid
                    $query = $db->query("SELECT id AS id_masjid, nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3, sampul FROM db_data_masjid WHERE id_user = ?", [$id_user]);
                    $result = $query->getRowArray();
                    if ($result) {
                        $masjid = $result;
                        $id_masjid = $masjid['id_masjid']; // Pastikan $id_masjid diinisialisasi dengan benar
                    } else {
                        echo "No data found for the given user ID.";
                    }

                    // Fetch the kegiatan data from the database
                    if (isset($id_masjid)) {
                        $query_kegiatan = $db->query("SELECT * FROM tb_kegiatan WHERE id_masjid = ?", [$id_masjid]);
                        $tb_kegiatan = $query_kegiatan->getResultArray();
                    }
                } else {
                    echo "User ID not found in session.";
                }

                // Determine if there are images to display
                $hasImages = !empty($masjid['gambar1']) || !empty($masjid['gambar2']) || !empty($masjid['gambar3']);
                ?>
                <div class="carousel-inner">
                    <?php if ($hasImages) : ?>
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
                    <?php else : ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                            <p>No images available.</p>
                        </div>
                    <?php endif; ?>
                </div>
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
    </div>
</section>

<?php
// Membaca isi folder assets/images/
$directoryPath = 'assets/images/'; // Sesuaikan dengan path folder yang benar
$files = scandir($directoryPath);

// Mengirimkan data ke JavaScript melalui tag <script>
echo "<script>var files = " . json_encode($files) . ";</script>";
?>

<section data-bs-version="5.1" class="article11 cid-ueCj6ebiFP" id="article11-19">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <?php if (!empty($masjid)) : ?>
                    <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                        <strong><?= esc($masjid['nama_masjid']); ?></strong>
                    </h5>
                    <p class="mbr-section-text mbr-fonts-style mb-4 display-7">
                        <?= esc($masjid['deskripsi']); ?>
                    </p>
                    <p class="mbr-text mbr-fonts-style display-7"><?= esc($masjid['alamat_masjid']); ?></p>
                <?php else : ?>
                    <p>No data available for the given ID.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">
    <div class="widget-clock d-none d-md-block" style="position: absolute; left: 18px;"> <!-- Menambahkan kelas d-none d-md-block -->
        <iframe src="https://free.timeanddate.com/clock/i8b1n8jt/n108/szw160/szh160/hoc09f/hbw0/hfc09f/cf100/hnc09f/fas20/fdi86/mqcfff/mqs4/mql3/mqw4/mqd70/mhcfff/mhs2/mhl3/mhw4/mhd70/mmv0/hhcbbb/hhs2/hmcbbb/hms2/hscbbb" frameborder="0" width="160" height="160"></iframe>
        <div class="prayer-times" style="margin-top: 20px;">
            <table>
                <tr>
                    <td>Subuh:</td>
                    <td><span id="subuh-time"></span></td>
                </tr>
                <tr>
                    <td>Zuhur</td>
                    <td><span id="zuhur-time"></span></td>
                </tr>
                <tr>
                    <td>Asar</td>
                    <td><span id="asar-time"></span></td>
                </tr>
                <tr>
                    <td>Magrib</td>
                    <td><span id="magrib-time"></span></td>
                </tr>
                <tr>
                    <td>Isya</td>
                    <td><span id="isya-time"></span></td>
                </tr>
            </table>
            <script>
                function fetchPrayerTimes() {
                    const proxyURL = "https://cors-anywhere.herokuapp.com/";
                    const apiURL = "https://api.myquran.com/v1/sholat/jadwal/2610/";
                    fetch(proxyURL + apiURL)
                        .then(response => response.json())
                        .then(data => {
                            displayPrayerTimes(data);
                        })
                        .catch(error => console.error('Error fetching prayer times:', error));
                }

                function displayPrayerTimes(data) {
                    const times = data.data.jadwal;
                    document.getElementById('subuh-time').textContent = times.subuh;
                    document.getElementById('zuhur-time').textContent = times.dzuhur;
                    document.getElementById('asar-time').textContent = times.ashar;
                    document.getElementById('magrib-time').textContent = times.maghrib;
                    document.getElementById('isya-time').textContent = times.isya;
                }

                // Call fetchPrayerTimes on window load to display the times immediately
                window.onload = fetchPrayerTimes;
            </script>
        </div>
    </div>
    <div class="widget-calendar d-none d-md-block" style="position: absolute; right: 20px;"> <!-- Menambahkan kelas d-none d-md-block -->
        <div id="calendar-container">
            <div id="calendar-header">
                <span id="month-name"></span>
                <span id="year"></span>
            </div>
            <div id="calendar-dates">
                <table>
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            const today = new Date();
            let currentMonth = today.getMonth();
            let currentYear = today.getFullYear();

            function showCalendar(month, year) {
                let firstDay = (new Date(year, month)).getDay();
                let daysInMonth = 32 - new Date(year, month, 32).getDate();

                let tbl = document.getElementById("calendar-body");
                tbl.innerHTML = "";

                document.getElementById("month-name").innerHTML = monthNames[month];
                document.getElementById("year").innerHTML = year;

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    let row = document.createElement("tr");
                    for (let j = 0; j < 7; j++) {
                        if (i === 0 && j < firstDay) {
                            let cell = document.createElement("td");
                            let cellText = document.createTextNode("");
                            cell.appendChild(cellText);
                            row.appendChild(cell);
                        } else if (date > daysInMonth) {
                            break;
                        } else {
                            let cell = document.createElement("td");
                            let cellText = document.createTextNode(date);
                            if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                                cell.classList.add("bg-info");
                            }
                            cell.appendChild(cellText);
                            row.appendChild(cell);
                            date++;
                        }
                    }
                    tbl.appendChild(row);
                }
            }

            showCalendar(currentMonth, currentYear);
        </script>
    </div>
    <div class="d-flex justify-content-center"> <!-- Membungkus elemen row dengan d-flex justify-content-center -->
        <div class="row justify-content-center my-2" style="max-width: 690px;"> <!-- Menambahkan max-width untuk membatasi lebar -->
            <?php if (!empty($tb_kegiatan)) : ?>
                <?php foreach ($tb_kegiatan as $k) : ?>
                    <div class="col-12 mb-3"> <!-- Menggunakan col-12 untuk lebar penuh dan mb-3 untuk margin bawah -->
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('img/' . esc($masjid['sampul'])); ?>" alt="Profile Icon" style="width: 40px; height: 40px; border-radius: 20px;">
                                    <span class="ml-2"><?= esc($masjid['nama_masjid']); ?></span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background: none; padding: 0;">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Edit Postingan</a></li>
                                        <li><a class="dropdown-item" href="#">Hapus Postingan</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="image-wrapper d-flex justify-content-center mb-4">
                                <img src="<?= base_url('imgpostingan/' . esc($k['gambar_kegiatan'])); ?>" alt="Mobirise Website Builder">
                            </div>
                            <div class="card-content-text px-3"> <!-- Menambahkan padding horizontal -->
                                <p class="text-muted"><?= esc($k['tipe_postingan']); ?></p> <!-- Menambahkan kelas text-muted untuk warna teks -->
                                <h3 class="card-title mbr-fonts-style mbr-white mt-3 mb-4 display-2">
                                    <strong><?= esc($k['judul_kegiatan']); ?></strong>
                                </h3>
                                <p class="postingan"><?= esc($k['deskripsi_kegiatan']); ?></p>
                            </div>
                            <div class="d-flex justify-content-end mt-2 mb-2 px-3"> <!-- Menambahkan padding horizontal -->
                                <button style="border: none; background: none;">
                                    <i class="fas fa-thumbs-up"></i> Like
                                </button>
                                <button style="border: none; background: none; margin-left: 10px;">
                                    <i class="fas fa-comment"></i> Komentar
                                </button>
                                <button style="border: none; background: none; margin-left: 10px;">
                                    <i class="fas fa-share"></i> Share
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak Ada Postingan</p>
            <?php endif; ?>
        </div>
    </div>



    <div class="d-flex justify-content-center"> <!-- Membungkus elemen row dengan d-flex justify-content-center -->
        <div class="row justify-content-center my-2" style="max-width: 690px; height: 500px;"> <!-- Menambahkan max-width untuk membatasi lebar -->
            <div class="col-12 mb-3"> <!-- Menggunakan col-12 untuk lebar penuh dan mb-3 untuk margin bawah -->

            </div>
        </div>
    </div>
</section>

<?= $this->endSection('content'); ?>
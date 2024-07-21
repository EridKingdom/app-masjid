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
                    $query = $db->query("SELECT id AS id_masjid, nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3, sampul, kota_kab FROM db_data_masjid WHERE id_user = ?", [$id_user]);
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
$nama_masjid = '';
$gambar_masjid = '';
$id_masjid = null;
if ($id_user) {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT id, nama_masjid, sampul FROM db_data_masjid WHERE id_user = ?", [$id_user]);
    $result = $query->getRow();
    if ($result) {
        $id_masjid = $result->id;
        $nama_masjid = $result->nama_masjid;
        $gambar_masjid = $result->sampul;
    }
}
?>

<section data-bs-version="5.1" class="article11 cid-ueCj6ebiFP" id="article11-19">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <?php if (!empty($masjid)) : ?>
                    <div class="d-flex align-items-left"> <!-- Tambahkan div ini -->
                        <img class="profileHal-img" src="/img/<?= htmlspecialchars($gambar_masjid, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 120px; width: 120px; border-radius: 50%; margin-right: 50px;">
                        <!-- Tambahkan margin-right -->
                        <div>
                            <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                                <strong><?= esc($masjid['nama_masjid']); ?></strong>
                            </h5>
                            <p class="mbr-section-text mbr-fonts-style mb-4 display-7">
                                <?= esc($masjid['deskripsi']); ?>
                            </p>
                            <p class="mbr-text mbr-fonts-style display-7"><?= esc($masjid['alamat_masjid']); ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <p>No data available for the given ID.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">
    <div class="widget-clock d-none d-md-block" style="position: absolute; left: 18px;">
        <!-- Menambahkan kelas d-none d-md-block -->
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
                    const apiURLLocation = "https://api.myquran.com/v2/sholat/kota/cari/";
                    const apiURLPrayer = "https://api.myquran.com/v2/sholat/jadwal/";
                    const todayDate = new Date();
                    const formatDate = todayDate.getFullYear() + '-' + todayDate.getMonth() + '-' + todayDate.getDate();
                    const kota = '<?= $masjid['kota_kab'] ?>';
                    if (!kota) kota = 'Kota Padang';
                    fetch(apiURLLocation + kota)
                        .then(response => response.json())
                        .then(data => {
                            var idKota = data.status ? data.data[0].id : '0314';
                            fetch(apiURLPrayer + idKota + '/' + formatDate)
                                .then(response => response.json())
                                .then(d => {
                                    if (d.status) {
                                        displayPrayerTimes(d.data);
                                    }
                                });

                        })
                        .catch(error => console.error('Error fetching prayer times:', error));
                }

                function displayPrayerTimes(data) {
                    const times = data.jadwal;
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
    <div class="widget-calendar d-none d-md-block" style="position: absolute; right: 20px;">
        <!-- Menambahkan kelas d-none d-md-block -->
        <div id="calendar-container">
            <div id="calendar-header">
                <button id="prev-month" onclick="prevMonth()">&#9664;</button>
                <span id="month-name"></span>
                <span id="year"></span>
                <button id="next-month" onclick="nextMonth()">&#9654;</button>
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
        <?php
        // Fetch the dates to be highlighted from the database
        $highlightedDates = [];
        if ($id_user) {
            $db = \Config\Database::connect();
            $query = $db->query("SELECT tgl FROM agenda WHERE id_masjid = (SELECT id FROM db_data_masjid WHERE id_user = ?)", [$id_user]);
            $highlightedDates = $query->getResultArray();
        }

        // Debugging log to check the fetched data
        error_log(print_r($highlightedDates, true));

        // Convert the dates to a JavaScript-friendly format
        $highlightedDatesJS = array_map(function ($date) {
            return $date['tgl'];
        }, $highlightedDates);

        // Debugging log to check the converted data
        error_log(print_r($highlightedDatesJS, true));

        echo "<script>var highlightedDates = " . json_encode($highlightedDatesJS) . ";</script>";
        ?>
        <script>
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            const today = new Date();
            let currentMonth = today.getMonth();
            let currentYear = today.getFullYear();
            let selectedDate = null;

            console.log("Highlighted Dates:", highlightedDates); // Debugging log

            function prevMonth() {
                currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
                currentYear = (currentMonth === 11) ? currentYear - 1 : currentYear;
                showCalendar(currentMonth, currentYear);
                filterAgendaByMonth(currentMonth, currentYear);
            }

            function nextMonth() {
                currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
                currentYear = (currentMonth === 0) ? currentYear + 1 : currentYear;
                showCalendar(currentMonth, currentYear);
                filterAgendaByMonth(currentMonth, currentYear);
            }

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

                            // Check if the date is in the highlightedDates array
                            let formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                            console.log(`Checking date: ${formattedDate}`); // Debugging log
                            if (highlightedDates.includes(formattedDate)) {
                                console.log(`Highlighting date: ${formattedDate}`); // Debugging log
                                cell.classList.add("highlighted-date");
                            }

                            cell.appendChild(cellText);
                            cell.addEventListener('click', function() {
                                selectDate(cell, date, month, year);
                            });
                            row.appendChild(cell);
                            date++;
                        }
                    }
                    tbl.appendChild(row);
                }
            }

            function selectDate(cell, date, month, year) {
                if (selectedDate) {
                    selectedDate.classList.remove('selected');
                }
                cell.classList.add('selected');
                selectedDate = cell;

                console.log(`Selected date: ${cell.innerHTML} ${monthNames[month]} ${year}`);

                let dateForm = year + '-' + String((month + 1)).padStart(2, '0') + '-' + cell.innerHTML;

                fetch('/get-agenda/<?= $id_masjid ?>/' + dateForm)
                    .then(response => response.json())
                    .then(data => {
                        // ... existing code ...
                        console.log(data)
                        let divAgenda = document.getElementById('agendaList');
                        let agendaList = "";
                        for (let i = 0; i < data.length; i++) {
                            let time24 = data[i].jam_agenda;
                            let time12 = convertTo12HourFormat(time24);
                            agendaList += `
                                 <div class="col-13 mb-3 agenda-item" data-month="6" data-year="2024">
                                    <div class="kontenAgenda">
                                        <input type="checkbox" class="checkbox" name="checkbox" value="` + data[i].id_agenda + `">
                                        <label for="checkbox">
                                            <strong class="text-muted">` + time12 + `</strong>
                                            <strong>` + data[i].nama_agenda + `</strong>
                                        </label>
                                    </div>
                                </div>
                                `;
                        }

                        if (agendaList) {
                            divAgenda.innerHTML = agendaList;
                        } else {
                            divAgenda.innerText = 'Tidak ada agenda.'
                        }

                        function convertTo12HourFormat(time24) {
                            const [hours, minutes] = time24.split(':');
                            const period = hours >= 12 ? 'PM' : 'AM';
                            const hours12 = hours % 12 || 12;
                            return `${hours12}:${minutes} ${period}`;
                        }
                        // ... existing code ...


                    })
                    .catch(error => console.error('Error fetching agenda:', error));
            }

            function filterAgendaByMonth(month, year) {
                const agendaItems = document.querySelectorAll('.agenda-item');
                agendaItems.forEach(item => {
                    const itemMonth = parseInt(item.getAttribute('data-month'));
                    const itemYear = parseInt(item.getAttribute('data-year'));
                    if (itemMonth === month && itemYear === year) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Tampilkan kalender dan filter agenda berdasarkan bulan dan tahun saat ini
            showCalendar(currentMonth, currentYear);
            filterAgendaByMonth(currentMonth, currentYear);

            document.addEventListener('DOMContentLoaded', function() {
                const deleteAgenda = document.getElementById('deleteAgenda');

                deleteAgenda.addEventListener('click', function(event) {
                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        let data = Array.from(document.querySelectorAll("input[type=checkbox][name=checkbox]:checked"), e => e.value);
                        console.log(data)
                        if (data.length > 0) {
                            fetch('/hapus-agenda', {
                                    method: "POST",
                                    body: JSON.stringify({
                                        ids: data
                                    }),
                                    headers: {
                                        "Content-type": "application/json; charset=UTF-8"
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data);
                                    location.reload();
                                })
                                .catch(error => console.error('Error deleting agenda:', error));
                        } else {
                            alert('Tidak ada agenda yang dipilih');
                        }
                    }
                });

                fetch('/get-agenda/<?= $id_masjid ?>/' + today.toISOString().split('T')[0])
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        let divAgenda = document.getElementById('agendaList');
                        let agendaList = "";
                        for (let i = 0; i < data.length; i++) {
                            agendaList += `
                                 <div class="col-13 mb-3 agenda-item" data-month="6" data-year="2024">
                        <div class="kontenAgenda">
                            <input type="checkbox" class="checkbox" name="checkbox" value="` + data[i].id_agenda + `">
                            <label for="checkbox">
                                <strong class="text-muted">` + data[i].jam_agenda + `</strong>
                                <strong>` + data[i].nama_agenda + `</strong>
                            </label>
                        </div>
                    </div>`;
                        }

                        if (agendaList) {
                            divAgenda.innerHTML = agendaList;
                        } else {
                            divAgenda.innerText = 'Tidak ada agenda.'
                        }


                    })
                    .catch(error => console.error('Error fetching agenda:', error));

            });
        </script>
        <hr>
        <h5 class="text-center">Jadwal Agenda</h5>
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center my-2" style="max-width: 290px;">
                <div id="agendaList">
                    Tidak ada agenda.
                </div>

            </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="button" data-bs-toggle="modal" data-bs-target="#addAgendaModal">
                <i class="fas fa-plus"></i>
            </button>
            <button id="deleteAgenda">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addAgendaModal" tabindex="-1" aria-labelledby="addAgendaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgendaModalLabel">Tambah Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAgendaForm" method="post" action="/tambah-agenda/<?= $id_masjid ?>">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tgl" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_agenda" class="form-label">Nama Agenda</label>
                            <input type="text" class="form-control" id="nama_agenda" name="nama_agenda" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_agenda" class="form-label">Jam Agenda</label>
                            <input type="time" class="form-control" id="jam_agenda" name="jam_agenda" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center"> <!-- Membungkus elemen row dengan d-flex justify-content-center -->
        <div class="row justify-content-center my-2" style="max-width: 690px;">
            <!-- Menambahkan max-width untuk membatasi lebar -->
            <select id="filter-tipe-postingan" class="filterposting">
                <option value="">Semua Tipe Postingan</option>
                <?php foreach ($tipe_postingan_list as $tipe) : ?>
                    <option value="<?= esc($tipe['tipe_postingan']); ?>"><?= esc($tipe['tipe_postingan']); ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($tb_kegiatan)) : ?>
                <?php foreach ($tb_kegiatan as $k) : ?>
                    <div class="col-12 mb-3 kegiatan-item" data-tipe="<?= esc($k['tipe_postingan']); ?>">
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
                                        <li><a class="dropdown-item" href="<?= base_url('/edit-postingan/' . $k['id_kegiatan']); ?>">Edit
                                                Postingan</a></li>
                                        <li><a class="dropdown-item delete-postingan" href="<?= base_url('/delete-postingan/' . $k['id_kegiatan']); ?>">Hapus
                                                Postingan</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="image-wrapper d-flex justify-content-center mb-4">
                                <img src="<?= base_url('imgpostingan/' . esc($k['gambar_kegiatan'])); ?>" alt="Mobirise Website Builder">
                            </div>
                            <div class="card-content-text px-3"> <!-- Menambahkan padding horizontal -->
                                <p class="text-muted"><?= esc($k['tipe_postingan']); ?></p>
                                <!-- Menambahkan kelas text-muted untuk warna teks -->
                                <h3 class="card-title mbr-fonts-style mbr-white mt-3 mb-4 display-2">
                                    <strong><?= esc($k['judul_kegiatan']); ?></strong>
                                </h3>
                                <p class="text-muted"><?= esc($k['tgl']); ?>
                                <div class="postingan"><?= nl2br(esc($k['deskripsi_kegiatan'])); ?></div>
                                <!-- Menggunakan nl2br untuk mengubah newline menjadi <br> -->
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
        <div class="row justify-content-center my-2" style="max-width: 690px; height: 500px;">
            <!-- Menambahkan max-width untuk membatasi lebar -->
            <div class="col-12 mb-3"> <!-- Menggunakan col-12 untuk lebar penuh dan mb-3 untuk margin bawah -->

            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('filter-tipe-postingan').addEventListener('change', function() {
        var selectedTipe = this.value;
        var kegiatanItems = document.querySelectorAll('.kegiatan-item');

        kegiatanItems.forEach(function(item) {
            if (selectedTipe === "" || item.getAttribute('data-tipe') === selectedTipe) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('.delete-postingan').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            var url = this.href;
            if (confirm('Apa Kamu Yakin Menghapus Data?')) {
                window.location.href = url;
            }
        });
    });
</script>



<?= $this->endSection('content'); ?>
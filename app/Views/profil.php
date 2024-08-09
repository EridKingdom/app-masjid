<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<section data-bs-version="5.1" class="slider3 cid-ueOcGCqmku" id="slider03-1o">
    <div class="carousel slide" id="ueOkfUJH6x" data-interval="5000" data-bs-interval="5000">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Menentukan apakah ada gambar untuk ditampilkan
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

<style>
    .donation-kontainer {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .donation-btn {
        width: 230px;
        height: 50px;
        margin-bottom: 5px;
    }

    .donation-guide {
        text-align: right;
    }

    .donation-guide-link {
        color: #007bff !important; /* Warna biru */
        text-decoration: none; /* Menghilangkan garis bawah default */
        transition: color 0.3s ease; /* Efek transisi untuk hover */
    }

    .donation-guide-link:hover {
        color: #0056b3; /* Warna biru yang lebih gelap saat hover */
        text-decoration: underline; /* Menambahkan garis bawah saat hover */
    }
</style>

<section data-bs-version="5.1" class="article11 cid-ueCj6ebiFP" id="article11-19">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="title col-md-12 col-lg-10">
                <?php if (!empty($masjid)) : ?>
                    <div class="d-flex align-items-center">
                        <img class="profileHal-img" src="/img/<?= htmlspecialchars($masjid['sampul'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 120px; width: 120px; border-radius: 50%; margin-right: 50px;">
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
            <div class="d-flex justify-content-end">
                <div class="donation-kontainer">
                    <a href="<?= base_url('/donasi/' . $masjid['id']); ?>" class="btn btn-primary donation-btn">Donasi/Bayar Zakat</a>
                    <div class="donation-guide">
                        <a href="<?= base_url('/tutor-donasi'); ?>" class="small">Petunjuk donasi atau Pembayaran Zakat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
</section>

<div class="menuprofil">
    <a href="<?= base_url('/profil/' . $masjid['id']); ?>" class="linkdefault linkdefault-hover">Kegiatan</a>
    <a href="<?= base_url('/viewkasmasjid/' . $masjid['id']); ?>" class="linkmenu">Uang Kas</a>
    <a href="<?= base_url('/viewyatim/' . $masjid['id']); ?>" class="linkmenu">Infak Anak Yatim</a>
    <a href="<?= base_url('/viewzakat/' . $masjid['id']); ?>" class="linkmenu">Zakat</a>
    <a href="<?= base_url('/waktusholat/' . $masjid['id']); ?>" class="linkmenu">Waktu Sholat ( Full Screen )</a>
</div>

<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">
    <div class="widget-clock" style="position: absolute; left: 18px;">
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
                            console.log(idKota);
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
    <div class="widget-calendar" style="position: absolute; right: 20px;">
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
        <div id="agenda-list">
            <h5 style="text-align: center;">Jadwal Agenda</h5>
            <p><strong>Akan Dilaksanakan</strong></p>
            <ul id="todo-agenda-items"></ul>
            <p><strong>Telah Dilaksanakan</strong></p>
            <ul id="done-agenda-items"></ul>
        </div>
    </div>
    <script>
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();
        let selectedDate = null;
        let highlightedDates = [];

        document.addEventListener('DOMContentLoaded', function(event) {
            setTimeout(function() {
                fetch(`/profil/getAgenda/<?= $masjid['id'] ?>/` + today.toISOString().split('T')[0])
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        let doneDivAgenda = document.getElementById('done-agenda-items');
                        let todoDivAgenda = document.getElementById('todo-agenda-items');
                        let doneAgendaList = "";
                        let todoAgendaList = "";
                        let sudah = data["sudah"];
                        let belum = data["belum"];
                        for (let i = 0; i < sudah.length; i++) {
                            let time24 = sudah[i].jam_agenda;
                            let time12 = convertTo12HourFormat(time24);
                            doneAgendaList += `
                        <div class="col-13 mb-3 agenda-item">
                            <div class="kontenAgenda">
                                <label for="checkbox">
                                    <strong class="text-muted">${time12}</strong>
                                    <strong>${sudah[i].nama_agenda}</strong>
                                </label>
                            </div>
                        </div>
                    `;
                        }

                        if (doneAgendaList) {
                            doneDivAgenda.innerHTML = doneAgendaList;
                        } else {
                            doneDivAgenda.innerHTML = 'Tidak ada agenda.';
                        }

                        for (let i = 0; i < belum.length; i++) {
                            let time24 = belum[i].jam_agenda;
                            let time12 = convertTo12HourFormat(time24);
                            todoAgendaList += `
                        <div class="col-13 mb-3 agenda-item">
                            <div class="kontenAgenda">
                                <label for="checkbox">
                                    <strong class="text-muted">${time12}</strong>
                                    <strong>${belum[i].nama_agenda}</strong>
                                </label>
                            </div>
                        </div>
                    `;
                        }

                        if (todoAgendaList) {
                            todoDivAgenda.innerHTML = todoAgendaList;
                        } else {
                            todoDivAgenda.innerHTML = 'Tidak ada agenda.';
                        }

                        function convertTo12HourFormat(time24) {
                            const [hours, minutes] = time24.split(':');
                            const period = hours >= 12 ? 'PM' : 'AM';
                            const hours12 = hours % 12 || 12;
                            return `${hours12}:${minutes} ${period}`;
                        }
                    })
                    .catch(error => console.error('Error fetching agenda:', error));
            }, 1000);

        })

        // Fetch highlighted dates from server
        fetch(`/profil/getHighlightedDates/<?= $masjid['id'] ?>`)
            .then(response => response.json())
            .then(data => {
                highlightedDates = data.map(item => item.tgl);
                showCalendar(currentMonth, currentYear);
                filterAgendaByMonth(currentMonth, currentYear);
            })
            .catch(error => console.error('Error fetching highlighted dates:', error));

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
                        if (highlightedDates.includes(formattedDate)) {
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

            let dateForm = year + '-' + String((month + 1)).padStart(2, '0') + '-' + String(cell.innerHTML).padStart(2, '0');

            fetch(`/profil/getAgenda/<?= $masjid['id'] ?>/${dateForm}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    let doneDivAgenda = document.getElementById('done-agenda-items');
                    let todoDivAgenda = document.getElementById('todo-agenda-items');
                    let doneAgendaList = "";
                    let todoAgendaList = "";
                    let sudah = data["sudah"];
                    let belum = data["belum"];
                    for (let i = 0; i < sudah.length; i++) {
                        let time24 = sudah[i].jam_agenda;
                        let time12 = convertTo12HourFormat(time24);
                        doneAgendaList += `
                        <div class="col-13 mb-3 agenda-item" data-month="${month}" data-year="${year}">
                            <div class="kontenAgenda">
                                <label for="checkbox">
                                    <strong class="text-muted">${time12}</strong>
                                    <strong>${sudah[i].nama_agenda}</strong>
                                </label>
                            </div>
                        </div>
                    `;
                    }

                    if (doneAgendaList) {
                        doneDivAgenda.innerHTML = doneAgendaList;
                    } else {
                        doneDivAgenda.innerHTML = 'Tidak ada agenda.';
                    }

                    for (let i = 0; i < belum.length; i++) {
                        let time24 = belum[i].jam_agenda;
                        let time12 = convertTo12HourFormat(time24);
                        todoAgendaList += `
                        <div class="col-13 mb-3 agenda-item" data-month="${month}" data-year="${year}">
                            <div class="kontenAgenda">
                                <label for="checkbox">
                                    <strong class="text-muted">${time12}</strong>
                                    <strong>${belum[i].nama_agenda}</strong>
                                </label>
                            </div>
                        </div>
                    `;
                    }

                    if (todoAgendaList) {
                        todoDivAgenda.innerHTML = todoAgendaList;
                    } else {
                        todoDivAgenda.innerHTML = 'Tidak ada agenda.';
                    }

                    function convertTo12HourFormat(time24) {
                        const [hours, minutes] = time24.split(':');
                        const period = hours >= 12 ? 'PM' : 'AM';
                        const hours12 = hours % 12 || 12;
                        return `${hours12}:${minutes} ${period}`;
                    }
                })
                .catch(error => console.error('Error fetching agenda:', error));
        }

        function filterAgendaByMonth(month, year) {
            fetch(`/profil/getAgendaByMonth/<?= $masjid['id'] ?>/${month + 1}/${year}`)
                .then(response => response.json())
                .then(data => {
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
                })
                .catch(error => console.error('Error fetching agenda by month:', error));
        }
    </script>

    <div class="d-flex justify-content-center"> <!-- Membungkus elemen row dengan d-flex justify-content-center -->
        <div class="row justify-content-center my-2" style="max-width: 690px;"> <!-- Menambahkan max-width untuk membatasi lebar -->
            <div class="filterposting">
                <button class="filter-btn active" data-tipe="">Semua Tipe Postingan</button>
                <?php foreach ($tipe_postingan_list as $tipe) : ?>
                    <button class="filter-btn" data-tipe="<?= esc($tipe['tipe_postingan']); ?>"><?= esc($tipe['tipe_postingan']); ?></button>
                <?php endforeach; ?>
            </div>
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
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Edit Postingan</a></li>
                                        <li><a class="dropdown-item" href="#">Hapus Postingan</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="image-wrapper d-flex justify-content-center mb-4">
                                <img src="<?= base_url('imgpostingan/' . esc($k['gambar_kegiatan'])); ?>" alt="Mobirise Website Builder">
                            </div>
                            <div class="card-content-text px-3">
                                <p class="text-muted"><?= esc($k['tipe_postingan']); ?></p>
                                <h3 class="card-title mbr-fonts-style mbr-white mt-3 mb-4 display-2">
                                    <strong><?= esc($k['judul_kegiatan']); ?></strong>
                                </h3>
                                <p class="text-muted"><?= esc($k['tgl']); ?></p>
                                <div class="postingan"><?= nl2br(esc($k['deskripsi_kegiatan'])); ?></div>
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

<style>
    .get-in-touch {
        background-color: #9fe870;
        color: black;
        padding: 20px;
        text-align: center;
    }

    .section-title {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .contact-info {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .info-item {
        display: flex;
        align-items: center;
        margin: 10px;
    }

    .icon-wrapper {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 15px;
    }

    .icon-wrapper i {
        font-size: 24px;
    }

    .info-content {
        text-align: left;
    }

    .info-content h3 {
        font-size: 16px;
        margin: 0;
    }

    .info-content p {
        margin: 5px 0 0;
        font-size: 14px;
    }
</style>

<?php if (!empty($pengurus)) : ?>
    <div class="get-in-touch">
        <h2 class="section-title">INFORMASI PENGURUS</h2>
        <div class="contact-info">
            <div class="info-item">
                <div class="icon-wrapper">
                    <i class="fas fa-user"></i>
                </div>
                <div class="info-content">
                    <h3>PENGURUS</h3>
                    <p><?= esc($pengurus['nama_pengurus']); ?></p>
                </div>
            </div>
            <div class="info-item">
                <div class="icon-wrapper">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="info-content">
                    <h3>PHONE</h3>
                    <p><?= esc($pengurus['no_telp']); ?></p>
                </div>
            </div>
            <div class="info-item">
                <div class="icon-wrapper">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info-content">
                    <h3>EMAIL</h3>
                    <p><?= esc($pengurus['email']); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            var selectedTipe = this.getAttribute('data-tipe');
            var kegiatanItems = document.querySelectorAll('.kegiatan-item');

            kegiatanItems.forEach(function(item) {
                if (selectedTipe === "" || item.getAttribute('data-tipe') === selectedTipe) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>


<?= $this->endSection('content'); ?>
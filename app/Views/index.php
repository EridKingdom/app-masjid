<?= $this->extend('layout/template'); ?>
<?= $this->Section('content'); ?>

<section data-bs-version="5.1" class="features4 start cid-ueat2rmvUj" id="features04-v">
    <div class="mbr-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <!-- Content Head -->
            </div>
        </div>
        <div class="row flex-nowrap overflow-auto">
            <?php foreach ($db_data_masjid as $masjid) : ?>
                <div class="item features-image col-12 col-md-6 col-lg-3">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <img src="/img/<?= $masjid['sampul']; ?>" alt="Gambar masjid" data-slide-to="0" data-bs-slide-to="0">
                        </div>
                        <div class="item-content">
                            <h5 class="item-title mbr-fonts-style display-2">
                                <strong><?= $masjid['nama_masjid']; ?></strong>
                            </h5>
                            <p class="mbr-text mbr-fonts-style display-7"><?= $masjid['alamat_masjid']; ?></p>
                            <div class="mbr-section-btn item-footer">
                                <a href="<?= base_url('/profil/' . $masjid['id']); ?>" class="btn item-btn btn-primary display-7">Lihat Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">
    <div class="widget-clock d-none d-md-block" style="position: absolute; left: 18px;"> <!-- Menambahkan kelas d-none d-md-block -->
        <iframe src="https://free.timeanddate.com/clock/i8b1n8jt/n108/szw160/szh160/hoc09f/hbw0/hfc09f/cf100/hnc09f/fas20/fdi86/mqcfff/mqs4/mql3/mqw4/mqd70/mhcfff/mhs2/mhl3/mhw4/mhd70/mmv0/hhcbbb/hhs2/hmcbbb/hms2/hscbbb" frameborder="0" width="160" height="160"></iframe>
            <hr>
        <select name="kota" id="kota-select" class="form-select" onchange="fetchPrayerTimes()">
            <option value="">Pilih Kota</option>
            <option value="Kota Banda Aceh">Kota Banda Aceh</option>
            <option value="Kota Medan">Kota Medan</option>
            <option value="Kota Padang">Kota Padang</option>
            <option value="Kota Pekanbaru">Kota Pekanbaru</option>
            <option value="Kota Jambi">Kota Jambi</option>
            <option value="Kota Bengkulu">Kota Bengkulu</option>
            <option value="Kota Lampung">Kota Lampung</option>
            <option value="Kota Jakarta">Kota Jakarta</option>
            <option value="Kota Bandung">Kota Bandung</option>
            <option value="Kota Cirebon">Kota Cirebon</option>
            <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
            <option value="Kota Solo">Kota Solo</option>
            <option value="Kota Madiun">Kota Madiun</option>
            <option value="Kota Kediri">Kota Kediri</option>
            <option value="Kota Blitar">Kota Blitar</option>
            <option value="Kota Surabaya">Kota Surabaya</option>
            <option value="Kota Malang">Kota Malang</option>
            <option value="Kota Yogyakarta">Kota Yogyakarta</option>
            <option value="Kota Semarang">Kota Semarang</option>
            <option value="Kota Banjarmasin">Kota Banjarmasin</option>
            <option value="Kota Pontianak">Kota Pontianak</option>
            <option value="Kota Samarinda">Kota Samarinda</option>
            <option value="Kota Balikpapan">Kota Balikpapan</option>
            <option value="Kota Makassar">Kota Makassar</option>
            <option value="Kota Parepare">Kota Parepare</option>
            <option value="Kota Palangkaraya">Kota Palangkaraya</option>
            <option value="Kota Banjarbaru">Kota Banjarbaru</option>
            <option value="Kota Tarakan">Kota Tarakan</option>
            <option value="Kota Bitung">Kota Bitung</option>
            <option value="Kota Tual">Kota Tual</option>
            <option value="Kota Tidore">Kota Tidore</option>
            <option value="Kota Ambon">Kota Ambon</option>
            <option value="Kota Ternate">Kota Ternate</option>
            <option value="Kota Jayapura">Kota Jayapura</option>
        </select>
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
                    const kota = 'Kota Padang';
                    console.log(kota)
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
            <?php if (!empty($kegiatanWithMasjid)) : ?>
                <?php foreach ($kegiatanWithMasjid as $kegiatan) : ?>
                    <div class="col-12 mb-3"> <!-- Menggunakan col-12 untuk lebar penuh dan mb-3 untuk margin bawah -->
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <?php if (isset($kegiatan['sampul'])) : ?>
                                        <img src="<?= base_url('img/' . esc($kegiatan['sampul'])); ?>" alt="Profile Icon" style="width: 40px; height: 40px; border-radius: 20px;">
                                    <?php endif; ?>
                                    <span class="ml-2"><?= esc($kegiatan['nama_masjid']); ?></span>
                                </div>
                            </div>
                            <div class="image-wrapper d-flex justify-content-center mb-4">
                                <img src="<?= base_url('imgpostingan/' . esc($kegiatan['gambar_kegiatan'])); ?>" alt="Mobirise Website Builder">
                            </div>
                            <div class="card-content-text px-3"> <!-- Menambahkan padding horizontal -->
                                <p class="text-muted"><?= esc($kegiatan['tipe_postingan']); ?></p> <!-- Menambahkan kelas text-muted untuk warna teks -->
                                <h3 class="card-title mbr-fonts-style mbr-white mt-3 mb-4 display-2">
                                    <strong><?= esc($kegiatan['judul_kegiatan']); ?></strong>
                                </h3>
                                <p class="postingan"><?= esc($kegiatan['deskripsi_kegiatan']); ?></p>
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

</section>

<?= $this->endSection('content'); ?>
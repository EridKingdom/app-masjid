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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/js/kota.js"></script>


<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">
    <div class="widget-clock d-none d-md-block" style="position: absolute; left: 18px;"> <!-- Menambahkan kelas d-none d-md-block -->
        <iframe src="https://free.timeanddate.com/clock/i8b1n8jt/n108/szw160/szh160/hoc09f/hbw0/hfc09f/cf100/hnc09f/fas20/fdi86/mqcfff/mqs4/mql3/mqw4/mqd70/mhcfff/mhs2/mhl3/mhw4/mhd70/mmv0/hhcbbb/hhs2/hmcbbb/hms2/hscbbb" frameborder="0" width="160" height="160"></iframe>
        <hr>
        <select name="kota" id="kota-select" class="form-select" onchange="fetchPrayerTimes(event)">
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
                $('#kota-select').select2({
                    placeholder: "Pilih Kota",
                    data: kotaList,
                });

                function fetchPrayerTimes(event) {
                    var kotaId = event.target.value ?? '0314';
                    const apiURLPrayer = "https://api.myquran.com/v2/sholat/jadwal/";
                    const todayDate = new Date();
                    const formatDate = todayDate.getFullYear() + '-' + todayDate.getMonth() + '-' + todayDate.getDate();
                    fetch(apiURLPrayer + kotaId + '/' + formatDate)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                displayPrayerTimes(data.data);
                            }
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
            <select id="filter-tipe-postingan" class="filterposting">
                <option value="">Semua Tipe Postingan</option>
                <?php foreach ($tipe_postingan_list as $tipe) : ?>
                    <option value="<?= esc($tipe['tipe_postingan']); ?>"><?= esc($tipe['tipe_postingan']); ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($kegiatanWithMasjid)) : ?>
                <?php foreach ($kegiatanWithMasjid as $kegiatan) : ?>
                    <div class="col-12 mb-3 kegiatan-item" data-tipe="<?= esc($kegiatan['tipe_postingan']); ?>"> <!-- Menggunakan col-12 untuk lebar penuh dan mb-3 untuk margin bawah -->
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <?php if (isset($kegiatan['sampul'])) : ?>
                                        <img src="<?= base_url('img/' . esc($kegiatan['sampul'])); ?>" alt="Profile Icon" style="width: 40px; height: 40px; border-radius: 20px; margin-right: 20px;"> <!-- Menambahkan margin-right -->
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
                                <div class="postingan"><?= nl2br(esc($kegiatan['deskripsi_kegiatan'])); ?></div> <!-- Menggunakan nl2br untuk mengubah newline menjadi <br> -->
                            </div>
                            <div class="d-flex justify-content-end mt-2 mb-2 px-3"> <!-- Menambahkan padding horizontal -->
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
</script>

<?= $this->endSection('content'); ?>
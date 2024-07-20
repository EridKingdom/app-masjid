<?= $this->extend('layout/supertemplate'); ?>
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
        </div>
    </div>
</section>
<div class="menuprofil">
    <a href="<?= base_url('/profil-super/' . $masjid['id']); ?>" class="linkmenu">Kegiatan</a>
    <a href="<?= base_url('/view-kasmasjid-super/' . $masjid['id']); ?>" class="linkdefault linkdefault-hover">Uang Kas</a>
    <a href="<?= base_url('/view-zakat-super/' . $masjid['id']); ?>" class="linkmenu">Zakat</a>
    <a href="<?= base_url('/view-yatim-super/' . $masjid['id']); ?>" class="linkmenu">Infak Anak Yatim</a>
    <a href="<?= base_url('/biodata-pengurus/' . $masjid['id']); ?>" class="linkmenu">Biodata Pengurus</a>
</div>
<section data-bs-version="5.1" class="article8 cid-ueavU2rDWq" id="article08-x">

    <div class="widget-calendar" style="position: absolute; right: 20px;"> <!-- Menambahkan margin kanan 20px -->
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
    <div class="container">
        <div class="row justify-content-left">
            <div class="card col-md-20 col-lg-9">
                <div class="wrapper" style="height: 100%;">
                    <h3 class="text-center mb-3">Detail Kas</h3> <!-- Added title above the table -->
                    <div class="filter-buttons mb-3 text-center">
                        <button id="filterPemasukan" class="btn btn-success">Pemasukan:_ <span id="totalPemasukan" class="text-white">Rp 0</span></button>
                        <button id="filterPengeluaran" class="btn btn-danger">Pengeluaran:_ <span id="totalPengeluaran" class="text-white">Rp 0</span></button>
                        <button id="filterSelisih" class="btn btn-secondary">Selisih:_ <span id="totalSelisih" class="text-white">Rp 0</span></button>
                    </div>
                    <form class="cari" role="search" method="GET">
                        <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Kas Masjid" aria-label="Search">
                    </form>
                    <table id="kasTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jenis Kas</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody id="uangkas-table-body">
                            <?php $i = 1; ?>
                            <?php foreach ($kas_masjid as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $k['tgl']; ?></td>
                                    <td><?= $k['keterangan']; ?></td>
                                    <td><?= $k['jenis_kas']; ?></td>
                                    <td><?= 'Rp ' . number_format(esc($k['nominal']), 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <script>
                            const uangkastablebody = document.getElementById('uangkas-table-body');
                            for (let i = 0; i < 10; i++) {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        `;
                                uangkastablebody.appendChild(tr);
                            }
                        </script>
                    </table>
                    <div id="pagination-container" class="pagination-container"></div>
                    <div style="text-align: right;">
                        <h4>Total Saldo Masjid: <span id="totalSaldo">Rp 00.00</span></h4>
                        <!-- Added button for donation -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    window.onload = function() {
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('keyup', function(event) {
                const searchTerm = event.target.value.toLowerCase();
                const tableBody = document.getElementById('uangkas-table-body');
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    // Mengambil hanya kolom 'Keterangan' dan 'Jenis Kas'
                    const keterangan = row.cells[2].textContent.toLowerCase(); // Kolom 'Keterangan' adalah indeks 2
                    const jenisKas = row.cells[3].textContent.toLowerCase(); // Kolom 'Jenis Kas' adalah indeks 3
                    const rowText = keterangan + " " + jenisKas; // Gabungkan teks dari kedua kolom
                    row.style.display = rowText.includes(searchTerm) ? '' : 'none';
                });
            });
        } else {
            console.error('searchInput not found');
        }
    };
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.getElementById('uangkas-table-body').querySelectorAll('tr');
        let totalSaldo = 0;

        rows.forEach(row => {
            // Check if the row has the expected number of cells
            if (row.cells.length >= 5) {
                const jenisKas = row.cells[3].textContent.trim().toLowerCase();
                const nominalText = row.cells[4].textContent.trim();
                const nominal = parseInt(nominalText.replace(/[^0-9]/g, ''), 10);

                if (jenisKas === 'masuk') {
                    totalSaldo += nominal;
                } else if (jenisKas === 'keluar') {
                    totalSaldo -= nominal;
                }
            } else {
                console.log('Row does not have enough cells:', row);
            }
        });

        const totalSaldoElement = document.getElementById('totalSaldo');
        if (totalSaldoElement) {
            totalSaldoElement.textContent = `Rp ${totalSaldo.toLocaleString()}`;
        } else {
            console.error('totalSaldo element not found');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#uangkas-table-body tr');
        const rowsPerPage = 10;
        const paginationContainer = document.getElementById('pagination-container');
        let currentPage = 1;

        function displayRows(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
        }

        function setupPagination() {
            const pageCount = Math.ceil(rows.length / rowsPerPage);
            paginationContainer.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', () => {
                    currentPage = i;
                    displayRows(i);
                });
                paginationContainer.appendChild(button);
            }
        }

        setupPagination();
        displayRows(currentPage);
    });
    document.addEventListener('DOMContentLoaded', function() {
        const filterPemasukan = document.getElementById('filterPemasukan');
        const filterPengeluaran = document.getElementById('filterPengeluaran');
        const filterSelisih = document.getElementById('filterSelisih');
        const rows = document.querySelectorAll('#uangkas-table-body tr');

        let totalPemasukan = 0;
        let totalPengeluaran = 0;

        rows.forEach(row => {
            const jenisKas = row.cells[3].textContent.trim().toLowerCase();
            const nominalText = row.cells[4].textContent.trim();
            const nominal = parseInt(nominalText.replace(/[^0-9]/g, ''), 10);

            if (jenisKas === 'masuk') {
                totalPemasukan += nominal;
            } else if (jenisKas === 'keluar') {
                totalPengeluaran += nominal;
            }
        });

        const totalPemasukanElement = document.getElementById('totalPemasukan');
        const totalPengeluaranElement = document.getElementById('totalPengeluaran');
        const totalSelisihElement = document.getElementById('totalSelisih');

        if (totalPemasukanElement) {
            totalPemasukanElement.textContent = `Rp ${totalPemasukan.toLocaleString()}`;
        } else {
            console.error('totalPemasukan element not found');
        }

        if (totalPengeluaranElement) {
            totalPengeluaranElement.textContent = `Rp ${totalPengeluaran.toLocaleString()}`;
        } else {
            console.error('totalPengeluaran element not found');
        }

        if (totalSelisihElement) {
            const selisih = totalPemasukan - totalPengeluaran;
            totalSelisihElement.textContent = `Rp ${selisih.toLocaleString()}`;
        } else {
            console.error('totalSelisih element not found');
        }

        filterPemasukan.addEventListener('click', function() {
            rows.forEach(row => {
                const jenisKas = row.cells[3].textContent.trim().toLowerCase();
                row.style.display = (jenisKas === 'masuk') ? '' : 'none';
            });
        });

        filterPengeluaran.addEventListener('click', function() {
            rows.forEach(row => {
                const jenisKas = row.cells[3].textContent.trim().toLowerCase();
                row.style.display = (jenisKas === 'keluar') ? '' : 'none';
            });
        });

        filterSelisih.addEventListener('click', function() {
            rows.forEach(row => {
                row.style.display = '';
            });
        });
    });
</script>

<?= $this->endSection('content'); ?>
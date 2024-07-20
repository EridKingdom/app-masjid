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
    <a href="<?= base_url('/profil/' . $masjid['id']); ?>" class="linkmenu">Kegiatan</a>
    <a href="<?= base_url('/viewkasmasjid/' . $masjid['id']); ?>" class="linkmenu">Uang Kas</a>
    <a href="<?= base_url('/viewyatim/' . $masjid['id']); ?>" class="linkdefault linkdefault-hover">Infak Anak Yatim</a>
    <a href="<?= base_url('/viewzakat/' . $masjid['id']); ?>" class="linkmenu">Zakat</a>
    <a href="<?= base_url('/waktusholat/' . $masjid['id']); ?>" class="linkmenu">Details Waktu Sholat</a>
</div>
<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">

    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-12 col-md-8">
                <h2 class="judul">Informasi Infak Anak Yatim</h2>
                <form class="cari" role="search" method="GET">
                    <input class="form-control me-2" type="search" id="searchInput" name="keyword" placeholder="Cari Infak" aria-label="Search">
                </form>
                <table class="table table-striped" id="zakat-table">
                    <thead>
                        <tr>
                            <th>tgl</th>
                            <th>keterangan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="zakat-table-body">
                        <?php foreach ($infak_anak_yatim as $k) : ?>
                            <tr>
                                <td><?= $k['tgl']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td><?= 'Rp ' . number_format(esc($k['nominal']), 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    const zakatTableBody = document.getElementById('zakat-table-body');
                    for (let i = 0; i < 10; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        `;
                        zakatTableBody.appendChild(tr);
                    }
                </script>
                <!-- Pagination controls -->
                <div id="pagination-controls" style="text-align: center;">
                    <button id="prev-page" disabled>Previous</button>
                    <span id="page-numbers"></span>
                    <button id="next-page">Next</button>
                </div>
                <hr>
                <div style="text-align: right;">
                    <h4>Total Saldo Zakat: <span id="totalSaldo">Rp 00.00</span></h4>

                </div>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rowsPerPage = 10;
        const tableBody = document.getElementById('zakat-table-body');
        const rows = tableBody.getElementsByTagName('tr');
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);
        let currentPage = 1;

        const prevPageButton = document.getElementById('prev-page');
        const nextPageButton = document.getElementById('next-page');
        const pageNumbers = document.getElementById('page-numbers');

        function showPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            Array.from(rows).forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            updatePageNumbers();
            prevPageButton.disabled = page === 1;
            nextPageButton.disabled = page === totalPages;
        }

        function updatePageNumbers() {
            pageNumbers.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const pageNumber = document.createElement('span');
                pageNumber.textContent = i;
                pageNumber.style.cursor = 'pointer';
                pageNumber.style.margin = '0 5px';
                pageNumber.style.padding = '5px 10px';
                pageNumber.style.border = '1px solid #007bff';
                pageNumber.style.borderRadius = '5px';
                pageNumber.style.backgroundColor = i === currentPage ? '#007bff' : '#fff';
                pageNumber.style.color = i === currentPage ? '#fff' : '#007bff';

                pageNumber.addEventListener('click', function() {
                    currentPage = i;
                    showPage(currentPage);
                });

                pageNumbers.appendChild(pageNumber);
            }
        }

        prevPageButton.addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        nextPageButton.addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        showPage(currentPage);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('zakat-table-body');
        const rows = tableBody.getElementsByTagName('tr');
        const totalSaldoElement = document.getElementById('totalSaldo');

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

        function calculateTotal() {
            let total = 0;
            Array.from(rows).forEach(function(row) {
                const cells = row.getElementsByTagName('td');
                const nominal = cells[2].textContent.trim();
                if (nominal) {
                    total += parseFloat(nominal.replace(/[^0-9,-]+/g, ""));
                }
            });
            totalSaldoElement.textContent = formatRupiah(total.toString(), 'Rp ');
        }

        searchInput.addEventListener('keyup', function() {
            const searchText = searchInput.value.toLowerCase();
            Array.from(rows).forEach(function(row) {
                const cells = row.getElementsByTagName('td');
                let found = false;
                Array.from(cells).forEach(function(cell) {
                    if (cell.textContent.toLowerCase().includes(searchText)) {
                        found = true;
                    }
                });
                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            calculateTotal();
        });

        calculateTotal();
    });
</script>

<?= $this->endSection('content'); ?>
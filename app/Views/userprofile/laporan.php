<?= $this->extend('layout/admintemplate'); ?>
<?= $this->Section('content'); ?>

<?php
// Handle AJAX request to fetch table data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $tableName = $data->type ?? '';
    $startDate = $data->startDate ?? '';
    $endDate = $data->endDate ?? '';

    error_log("Received tableName: $tableName");
    error_log("Received startDate: $startDate");
    error_log("Received endDate: $endDate");

    if ($tableName && $startDate && $endDate) {
        $db = \Config\Database::connect();
        $builder = $db->table($tableName);

        // Apply date filter
        $builder->where('tgl >=', $startDate);
        $builder->where('tgl <=', $endDate);

        $query = $builder->getCompiledSelect();
        error_log("Compiled SQL query: $query");

        $result = $builder->get()->getResultArray();
        error_log("Query result: " . json_encode($result));

        if (!empty($result)) {
            echo json_encode(['headers' => array_keys($result[0]), 'rows' => array_map('array_values', $result)]);
        } else {
            echo json_encode(['error' => 'No data found for the specified dates']);
        }
    } else {
        echo json_encode(['error' => 'Required parameters are missing']);
    }
    exit;
}
?>

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
                if ($id_user) {
                    $db = \Config\Database::connect();
                    $query = $db->query("SELECT nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3 FROM db_data_masjid WHERE id_user = ?", [$id_user]);
                    $result = $query->getRowArray();
                    if ($result) {
                        $masjid = $result;
                    } else {
                        echo "No data found for the given user ID.";
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
// Mengambil data user dari session
$session = session();
$userData = $session->get('user_data');
$id_user = $userData['id_user'] ?? null;

// Fetch the masjid data from the database
$masjid = [];
if ($id_user) {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT nama_masjid, deskripsi, alamat_masjid FROM db_data_masjid WHERE id_user = ?", [$id_user]);
    $result = $query->getRowArray();
    if ($result) {
        $masjid = $result;
    }
}
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

<section data-bs-version="5.1" class="header09 startm5 cid-ubP7pTTB9Y mbr-fullscreen" id="header09-c">
    <div class="container-fluid">
        <div class="row">
            <div class="content-wrap col-16 col-md-10">
                <h2 class="judul">Laporan</h2>
                <form class="report-filter-form" method="POST">
                    <div class="form-group">
                        <label for="reportType">Tipe Laporan:</label>
                        <select class="form-control" id="reportType" name="reportType" onchange="updateTableColumns();">
                            <option value="kas_masjid">Uang Kas</option>
                            <option value="zakat">Zakat</option>
                            <option value="infak_anak_yatim">Infak Anak Yatim</option>
                            <option value="tb_kegiatan">Laporan Kegiatan</option>
                        </select>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-responsive" id="reportTable">
                        <thead id="reportTableHead"></thead>
                        <tbody id="reportTableBody"></tbody>
                    </table>
                </div>
                <table id="kasTable" class="table table-bordered" style="display: none;">
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
                                <td><?= $k['nominal']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    const uangkasTableBody = document.getElementById('uangkas-table-body');
                    for (let i = 0; i < 10; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        `;
                        uangkasTableBody.appendChild(tr);
                    }
                </script>
                <table class="table table-striped" id="zakat-table" style="display: none;">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="zakat-table-body">
                        <?php foreach ($zakat as $k) : ?>
                            <tr>
                                <td><?= $k['tgl']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td><?= $k['nominal']; ?></td>
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
                <table class="table table-striped" id="kegiatan-table" style="display: none;">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody id="kegiatan-table-body">
                        <?php foreach ($tb_kegiatan as $k) : ?>
                            <tr>
                                <td><?= $k['tgl']; ?></td>
                                <td><img src="/imgpostingan/<?= $k['gambar_kegiatan']; ?>" alt="Gambar tidak ditemukan" class="sampul"></td>
                                <td><?= $k['judul_kegiatan']; ?></td>
                                <td><?= $k['tipe_postingan']; ?></td>
                                <td><?= $k['deskripsi_kegiatan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    const kegiatanTableBody = document.getElementById('kegiatan-table-body');
                    for (let i = 0; i < 10; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        `;
                        kegiatanTableBody.appendChild(tr);
                    }
                </script>
                <table id="infak_anak_yatim-table" class="table table-bordered" style="display: none;">
                    <thead>
                        <tr>
                            <th>tgl</th>
                            <th>keterangan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="infak-table-body">
                        <?php foreach ($infak_anak_yatim as $k) : ?>
                            <tr>
                                <td><?= $k['tgl']; ?></td>
                                <td><?= $k['keterangan']; ?></td>
                                <td><?= $k['nominal']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    const infakTableBody = document.getElementById('infak-table-body');
                    for (let i = 0; i < 10; i++) {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        `;
                        infakTableBody.appendChild(tr);
                    }
                </script>

                <form class="date-filter-form" method="POST" style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <div class="form-group" style="margin-right: 10px;">
                        <label for="startDate">Dari Tanggal:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">Sampai Tanggal:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate">
                    </div>
                </form>
                <div class="filter-button-container">
                    <button class="filter-button" id="filterButton">Filter</button>
                </div>
                <div class="print-button-container">
                    <button class="print-button" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('reportType').addEventListener('change', function() {
        // Sembunyikan semua tabel terlebih dahulu
        document.getElementById('kasTable').style.display = 'none';
        document.getElementById('zakat-table').style.display = 'none';
        document.getElementById('kegiatan-table').style.display = 'none';
        document.getElementById('infak_anak_yatim-table').style.display = 'none';

        // Tampilkan tabel berdasarkan pilihan
        var selectedOption = this.value;
        switch (selectedOption) {
            case 'kas_masjid':
                document.getElementById('kasTable').style.display = '';
                break;
            case 'zakat':
                document.getElementById('zakat-table').style.display = '';
                break;
            case 'infak_anak_yatim':
                document.getElementById('infak_anak_yatim-table').style.display = '';
                break;
            case 'tb_kegiatan':
                document.getElementById('kegiatan-table').style.display = '';
                break;
        }
    });
    document.querySelector('.print-button').addEventListener('click', function() {
        var selectedOption = document.getElementById('reportType').value;
        document.getElementById('kasTable').style.display = 'none';
        document.getElementById('zakat-table').style.display = 'none';
        document.getElementById('kegiatan-table').style.display = 'none';
        document.getElementById('infak_anak_yatim-table').style.display = 'none';

        switch (selectedOption) {
            case 'kas_masjid':
                document.getElementById('kasTable').style.display = 'table';
                break;
            case 'zakat':
                document.getElementById('zakat-table').style.display = 'table';
                break;
            case 'infak_anak_yatim':
                document.getElementById('infak_anak_yatim-table').style.display = 'table';
                break;
            case 'tb_kegiatan':
                document.getElementById('kegiatan-table').style.display = 'table';
                break;
        }

        window.print();
    });
</script>

<script>
    document.getElementById('filterButton').addEventListener('click', function(event) {
        event.preventDefault();
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;
        var reportType = document.getElementById('reportType').value;

        fetch('/laporan/filter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    startDate: startDate,
                    endDate: endDate,
                    type: reportType
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    updateTable(data.headers, data.rows);
                }
            })
            .catch(error => console.error('Error:', error));
    });

    function updateTable(headers, rows) {
        var reportType = document.getElementById('reportType').value;
        var tableId = reportType + '-table'; // Pastikan ini sesuai dengan ID tabel di HTML
        var table = document.getElementById(tableId);

        if (!table) {
            console.error('Tabel dengan ID ' + tableId + ' tidak ditemukan.');
            return;
        }

        var tableHead = table.getElementsByTagName('thead')[0];
        var tableBody = table.getElementsByTagName('tbody')[0];

        // Clear existing table data
        tableHead.innerHTML = '';
        tableBody.innerHTML = '';

        // Create new header row
        var headerRow = tableHead.insertRow(0);
        headers.forEach(header => {
            var cell = headerRow.insertCell();
            cell.outerHTML = `<th>${header}</th>`;
        });

        // Insert new rows
        rows.forEach(row => {
            var newRow = tableBody.insertRow();
            row.forEach(cellData => {
                var cell = newRow.insertCell();
                cell.textContent = cellData;
            });
        });

        // Show the table
        table.style.display = '';
    }
</script>

<?= $this->endSection('content'); ?>
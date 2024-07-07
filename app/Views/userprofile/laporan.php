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

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>


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
                    $query = $db->query("SELECT id, nama_masjid, deskripsi, alamat_masjid, gambar1, gambar2, gambar3 FROM db_data_masjid WHERE id_user = ?", [$id_user]);
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
    $query = $db->query("SELECT id, nama_masjid, deskripsi, alamat_masjid FROM db_data_masjid WHERE id_user = ?", [$id_user]);
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
            <div id="print-section" class="content-wrap col-16 col-md-10">
                <h2 class="judul">Laporan</h2>
                <form class="report-filter-form" method="POST">
                    <div class="form-group">
                        <label for="reportType">Tipe Laporan:</label>
                        <select class="form-control" id="reportType" name="reportType">
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
                <div id="divkas" style="display: none;">
                    <table id="kas_masjid-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jenis Kas</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="divzakat" style="display: none;">
                    <table class="table table-striped" id="zakat-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="divkegiatan" style="display: none;">
                    <table class="table table-striped" id="tb_kegiatan-table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Gambar</td>
                                <td>Judul</td>
                                <td>Deksripsi</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="divinfak" style="display: none;">
                    <table id="infak_anak_yatim-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>keterangan</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                    </table>
                </div>

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
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        function updateKas(from = null, to = null) {
            var url = '/laporan/filter/<?= $masjid['id'] ?>/kas_masjid';
            if (from && to) {
                url += '/' + from + '/' + to;
            }
            $('#kas_masjid-table').DataTable({
                ajax: {
                    url: url,
                    dataSrc: 'data'
                },
                layout: {
                    bottomEnd: {
                        buttons: [{
                            extend: 'print',
                            title: 'Laporan Kas Masjid',
                        }]
                    }
                },
                "bDestroy": true,
                columns: [{
                        "data": "id_transaksi",
                        "name": "No"
                    },
                    {
                        "data": "tgl",
                        "name": "Tanggal"
                    },
                    {
                        "data": "keterangan",
                        "name": "Keterangan"
                    },
                    {
                        "data": "jenis_kas",
                        "name": "Jenis Kas"
                    },
                    {
                        "data": "nominal",
                        "name": "Nominal"
                    },
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td:eq(0)', nRow).html(iDisplayIndexFull + 1);
                }
            });
        }

        function updateZakat(from = null, to = null) {
            var url = '/laporan/filter/<?= $masjid['id'] ?>/zakat';
            if (from && to) {
                url += '/' + from + '/' + to;
            }
            $('#zakat-table').DataTable({
                ajax: {
                    url: url,
                    dataSrc: 'data'
                },
                layout: {
                    bottomEnd: {
                        buttons: [{
                            extend: 'print',
                            title: 'Laporan Zakat Masjid'
                        }]
                    }
                },
                "bDestroy": true,
                columns: [{
                        "data": "id_zakat",
                        "name": "No"
                    },
                    {
                        "data": "tgl",
                        "name": "Tanggal"
                    },
                    {
                        "data": "keterangan",
                        "name": "Keterangan"
                    },
                    {
                        "data": "nominal",
                        "name": "Nominal"
                    },
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td:eq(0)', nRow).html(iDisplayIndexFull + 1);
                }
            });
        }

        function updateKegiatan(from = null, to = null) {
            var url = '/laporan/filter/<?= $masjid['id'] ?>/tb_kegiatan';
            if (from && to) {
                url += '/' + from + '/' + to;
            }
            $('#tb_kegiatan-table').DataTable({
                ajax: {
                    url: url,
                    dataSrc: 'data'
                },
                layout: {
                    bottomEnd: {
                        buttons: [{
                            extend: 'print',
                            title: 'Laporan Kegiatan Masjid'
                        }]
                    }
                },
                "bDestroy": true,
                columns: [{
                        "data": "id_kegiatan",
                        "name": "No"
                    },
                    {
                        "data": "gambar_kegiatan",
                        "name": "Gambar",
                        "render": function(data) {
                            return '<img src="/imgpostingan/' + data + '" width="40px">';
                        }
                    },
                    {
                        "data": "judul_kegiatan",
                        "name": "Judul"
                    },
                    {
                        "data": "deskripsi_kegiatan",
                        "name": "Deskripsi"
                    },
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td:eq(0)', nRow).html(iDisplayIndexFull + 1);
                }
            });
        }

        function updateInfak(from = null, to = null) {
            var url = '/laporan/filter/<?= $masjid['id'] ?>/infak_anak_yatim';
            if (from && to) {
                url += '/' + from + '/' + to;
            }
            $('#infak_anak_yatim-table').DataTable({
                ajax: {
                    url: url,
                    dataSrc: 'data'
                },
                layout: {
                    bottomEnd: {
                        buttons: [{
                            extend: 'print',
                            title: 'Laporan Infak Anak Yatim'
                        }]
                    }
                },
                "bDestroy": true,
                columns: [{
                        "data": "id_infak",
                        "name": "No"
                    },
                    {
                        "data": "tgl",
                        "name": "Tanggal"
                    },
                    {
                        "data": "keterangan",
                        "name": "Keterangan"
                    },
                    {
                        "data": "nominal",
                        "name": "Nominal"
                    },
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('td:eq(0)', nRow).html(iDisplayIndexFull + 1);
                }
            });
        }

        updateKas();
        updateInfak();
        updateZakat();
        updateKegiatan();
        $('.buttons-excel, .buttons-print').each(function() {
            $(this).removeClass('btn-default').addClass('btn-primary')
        })

        document.getElementById('filterButton').addEventListener('click', function(event) {
            event.preventDefault();
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;
            var reportType = document.getElementById('reportType').value;

            switch (reportType) {
                case 'kas_masjid':
                    updateKas(startDate, endDate);
                    break;
                case 'zakat':
                    updateZakat(startDate, endDate);
                    break;
                case 'infak_anak_yatim':
                    updateInfak(startDate, endDate);
                    break;
                case 'tb_kegiatan':
                    updateKegiatan(startDate, endDate);
                    break;
            }
        });

        document.getElementById('reportType').addEventListener('change', function() {
            $('#divkas').hide();
            $('#divzakat').hide();
            $('#divinfak').hide();
            $('#divkegiatan').hide();
            var selectedOption = this.value;
            switch (selectedOption) {
                case 'kas_masjid':
                    $('#divkas').show();
                    $('#kas_masjid-table').removeAttr('style');
                    break;
                case 'zakat':
                    $('#divzakat').show();
                    $('#zakat-table').removeAttr('style');
                    break;
                case 'infak_anak_yatim':
                    $('#divinfak').show();
                    $('#infak_anak_yatim-table').removeAttr('style');
                    break;
                case 'tb_kegiatan':
                    $('#divkegiatan').show();
                    $('#tb_kegiatan-table').removeAttr('style');
                    break;
            }
        });
    });
</script>

<?= $this->endSection('content'); ?>
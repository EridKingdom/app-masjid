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
    $query = $db->query("SELECT nama_masjid, nama_pengurus, sampul, deskripsi, alamat_masjid, provinsi, kota_kab, jenis_tipologi, tahun_berdiri, luas_bangunan, surat_takmir, sertifikat, no_rekening, nama_bank, gambar1, gambar2, gambar3, no_rekening, nama_bank FROM db_data_masjid WHERE id_user = ?", [$id_user]);
    $result = $query->getRowArray();
    if ($result) {
        $masjid = $result;
    }
}
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
                    <div class="d-flex align-items-center"> <!-- Tambahkan div ini -->
                        <img class="profile-img" src="/img/<?= htmlspecialchars($gambar_masjid, ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 120px; width: 120px; border-radius: 50%; margin-right: 50px;"> <!-- Tambahkan margin-right -->
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-20 col-lg-9">
                <div class="card-body">
                    <h3 class="text-center mb-3">Edit Profil Masjid</h3>
                    <form method="POST" action="<?= base_url('editP/updateProfile'); ?>" enctype="multipart/form-data">
                        <div class="mb-3 text-center">
                            <input hidden name="sampul" value="/img/<?= htmlspecialchars($masjid['sampul'], ENT_QUOTES, 'UTF-8'); ?>" type="file" class="form-control text-center" id="fotoProfil" name="fotoProfil" accept="image/*">
                            <img class="profile-img" id="fotoProfilImg" src="/img/<?= htmlspecialchars($masjid['sampul'], ENT_QUOTES, 'UTF-8'); ?>" alt="Profile Logo" style="height: 50px; width: 50px; border-radius: 50%;">
                            <label for="fotoProfil" class="form-label">Upload Foto Profil Masjid</label>
                            <script>
                                document.getElementById('fotoProfil').addEventListener('change', function() {
                                    if (this.files.length > 0) {
                                        var fr = new FileReader();
                                        var showImg = document.getElementById('fotoProfilImg');
                                        fr.onload = function(e) {
                                            showImg.setAttribute('src', this.result)
                                        };
                                        this.nextElementSibling.innerHTML = this.files[0].name;
                                        fr.readAsDataURL(this.files[0]);
                                    }
                                });
                                document.getElementById('fotoProfilImg').addEventListener('click', function() {
                                    var img = document.getElementById('fotoProfil');
                                    img.click();
                                });
                            </script>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="namaMasjid" class="form-label">Nama Masjid</label>
                            <input type="text" class="form-control" id="namaMasjid" name="nama_masjid" value="<?= esc($masjid['nama_masjid'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="namaPengurus" class="form-label">Nama Pengurus</label>
                            <input type="text" class="form-control" id="namaPengurus" name="nama_pengurus" value="<?= esc($masjid['nama_pengurus'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar1" class="form-label">Upload Gambar 1</label>
                            <input type="file" class="form-control" id="gambar1" name="gambar1" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="gambar2" class="form-label">Upload Gambar 2</label>
                            <input type="file" class="form-control" id="gambar2" name="gambar2" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="gambar3" class="form-label">Upload Gambar 3</label>
                            <input type="file" class="form-control" id="gambar3" name="gambar3" accept="image/*">
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="deskripsiMasjid" class="form-label">Deskripsi Masjid</label>
                            <textarea class="form-control" id="deskripsiMasjid" name="deskripsi" rows="3" required><?= esc($masjid['deskripsi'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat_masjid" rows="3" required><?= esc($masjid['alamat_masjid'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= esc($masjid['provinsi'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota_kab" value="<?= esc($masjid['kota_kab'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Bank</label>
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?= esc($masjid['nama_bank'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?= esc($masjid['no_rekening'] ?? ''); ?>" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('/profile'); ?>" class="btn btn-primary">Batalkan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection('content'); ?>
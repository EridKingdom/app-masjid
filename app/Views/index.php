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
    <div class="widget-clock d-none d-md-block" style="position: absolute; left: 20px;">
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
                    const apiURL = "https://jadwalsholat.org/adzan/ajax.row.php?id=265";
                    fetch(apiURL)
                        .then(response => response.text())
                        .then(data => {
                            document.querySelector('.prayer-times').innerHTML = data;
                        })
                        .catch(error => console.error('Error fetching prayer times:', error));
                }

                window.onload = fetchPrayerTimes;
            </script>
        </div>
    </div>
    <div class="widget-calendar d-none d-md-block" style="position: absolute; right: 10px;">
        <p style="text-align: right;">
            <iframe src="https://jadwalsholat.org/hijri/hijri.php" frameborder="0" width="400" height="315"></iframe>
        </p>
        <div class="digital-calendar" style="text-align: center; margin-top: 20px;">
            <p id="current-date"></p>
            <script>
                function updateCalendar() {
                    const today = new Date();
                    const day = String(today.getDate()).padStart(2, '0');
                    const month = String(today.getMonth() + 1).padStart(2, '0');
                    const year = today.getFullYear();
                    const formattedDate = `${day}/${month}/${year}`;
                    document.getElementById('current-date').textContent = formattedDate;
                }

                window.onload = updateCalendar;
            </script>
        </div>
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="text-center">Form Pengaduan</h2>
                    </div>

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>

                    <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>

                    <form method="post" action="<?= base_url('warga/buat_laporan') ?>">
                        <div class="form-group">
                            <label for="judul">Judul Pengaduan</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="<?= set_value('judul') ?>" placeholder="Masukkan judul pengaduan">
                        </div>
                        <div class="form-group">
                            <label for="isi_laporan">Isi Laporan</label>
                            <textarea name="isi_laporan" id="isi_laporan" class="form-control" rows="4" placeholder="Tulis laporan Anda di sini"><?= set_value('isi_laporan') ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Kirim Pengaduan</button>
                        <a href="<?= base_url('pengaduan') ?>" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

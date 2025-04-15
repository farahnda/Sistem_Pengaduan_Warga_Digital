<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pengaduan Saya</h2>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pengaduan Saya</h5>
        </div>
        <div class="card-body">
            <?php if (!empty($pengaduan)): ?>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Laporan</th>
                            <th>Status</th>
                            <th>Respon Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pengaduan as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['judul'] ?></td>
                        <td><?= $p['isi_laporan'] ?></td>
                        <td><?= ucfirst($p['status']) ?></td>
                        <td><?= $p['respon'] ?? '-' ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Tidak ada pengaduan untuk ditampilkan.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="text-left">
        <a href="<?= base_url('warga/form_pengaduan') ?>" class="btn btn-primary mt-3">Buat Pengaduan Baru</a>
        <a href="<?= base_url('pengaduan') ?>" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
    </div>
</div>

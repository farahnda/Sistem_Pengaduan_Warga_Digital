<?php $this->load->view('templates/header'); ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pengaduan</h2>
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
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
                        <td>
                            <a href="<?= base_url('admin/ubah_status/'.$p['id']) ?>" class="btn btn-warning">Ubah Status</a>
                        </td>
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
</div>

<?php $this->load->view('templates/footer'); ?>

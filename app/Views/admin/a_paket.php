<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Paket Penjualan
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-12 ">
        <div class="card my-2 mx-4">
            <div class="col-md-4">
                <a href="javascript:void(0);" class="btn btn-success mb-3 my-3">+ Tambah Konten</a>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                        <th scope="col" style="width: 20%;">Deskripsi Paket</th>
                        <th scope="col" style="width: 25%;">Gambar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($paket as $p) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td><?= $p['nama_paket']; ?></td>
                            <td><?= $p['harga_paket']; ?></td>
                            <td><?= $p['deskripsi_paket']; ?></td>
                            <td><?= $p['image']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-warning"> Edit </a>
                                <a href="javascript:void(0);" class="btn btn-danger"> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
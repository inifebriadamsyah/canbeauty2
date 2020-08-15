<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Paket Penjualan
        </h2>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('hapus'); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('update')) : ?>
        <div class="alert alert-warning" role="alert">
            <?= session()->getFlashdata('update'); ?>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-12 ">
        <div class="card my-2 mx-4">
            <div class="col-md-4">
                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#createContent" class="btn btn-success mb-3 my-3"> + Tambah Konten </a>
            </div>
            <div class="modal fade" id="createContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Tambah Paket Penjualan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="paket/save" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nama_paket" class="col-form-label">Nama Paket:</label>
                                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi_paket" class="col-form-label">Deskripsi Paket:</label>
                                    <textarea class="form-control" id="deskripsi_paket" name="deskripsi_paket" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="harga_paket" class="col-form-label">Harga Paket:</label>
                                    <input type="text" class="form-control" id="harga_paket" name="harga_paket" required>
                                </div>

                                <p>Gambar</p>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <img src="/asset_main/sval/images/paket1.png" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#editContent<?= $p['id']; ?>" class="btn btn-warning"> Edit </a>
                                <a href="/paket/delete/<?= $p['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus baris ini?');"> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($paket as $p) : ?>
                        <div class="modal fade" id="editContent<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Paket Penjualan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="paket/update/<?= $p['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="oldImage" , value="<?= $p['image']; ?>">
                                            <div class="form-group">
                                                <label for="nama_paket" class="col-form-label">Nama Paket:</label>
                                                <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $p['nama_paket']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi_paket" class="col-form-label">Deskripsi Paket:</label>
                                                <input class="form-control" id="deskripsi_paket" name="deskripsi_paket" value="<?= $p['deskripsi_paket']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="harga_paket" class="col-form-label">Harga Paket:</label>
                                                <input type="text" class="form-control" id="harga_paket" name="harga_paket" value="<?= $p['harga_paket']; ?>" required>
                                            </div>

                                            <p>Gambar</p>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <img src="/img/<?= $p['image']; ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" value="<?= $p['image']; ?>" onchange="previewEdit()">
                                                        <div class="inavlid-feedback">
                                                            <?= $validation->getError('image') ?>
                                                        </div>
                                                        <label class="custom-file-label" for="image"><?= $p['image']; ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer mt-4">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    function previewImg() {
        const image = document.querySelector('#image');
        const imageLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imageLabel.textContent = image.files[0].name;

        const fileimage = new FileReader();
        fileimage.readAsDataURL(image.files[0]);

        fileimage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    function previewEdit() {
        const image2 = document.querySelector('#image');
        const imageLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imageLabel.textContent = image2.files[0].name;

        const fileimage = new FileReader();
        fileimage.readAsDataURL(image2.files[0]);

        fileimage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>
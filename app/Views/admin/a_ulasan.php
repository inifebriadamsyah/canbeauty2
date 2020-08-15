<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Ulasan
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
                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#createContent" class="btn btn-success mb-3 my-3">+ Tambah Konten</a>
            </div>
            <div class="modal fade" id="createContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Tambah Data Ulasan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="ulasan/save" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="ulasan_teks" class="col-form-label">Ulasan Teks:</label>
                                    <textarea class="form-control" id="ulasan_teks" name="ulasan_teks" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pembeli" class="col-form-label">Nama Pembeli:</label>
                                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
                                </div>

                                <p>Gambar Pembeli</p>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <img src="/asset_main/sval/images/paket1.png" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('image_pembeli')) ? 'is-invalid' : ''; ?>" id="image_pembeli" name="image_pembeli" onchange="previewImg()">
                                            <label class="custom-file-label" for="image_pembeli">Choose file</label>
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
                        <th scope="col" style="width: 40%;">Ulasan</th>
                        <th scope="col">Gambar Pembeli</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ulasan as $u) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td><?= $u['ulasan_teks']; ?></td>
                            <td><?= $u['image_pembeli']; ?></td>
                            <td><?= $u['nama_pembeli']; ?></td>
                            <td>
                                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#editContent<?= $u['id']; ?>" class="btn btn-warning"> Edit </a>
                                <a href="/ulasan/delete/<?= $u['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus baris ini?');"> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($ulasan as $u) : ?>
                        <div class="modal fade" id="editContent<?= $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Data Ulasan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="ulasan/update/<?= $u['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="oldImage" , value="<?= $u['image_pembeli']; ?>">

                                            <div class="form-group">
                                                <label for="ulasan_teks" class="col-form-label">Ulasan Teks:</label>
                                                <input type="text" class="form-control" id="ulasan_teks" name="ulasan_teks" value="<?= $u['ulasan_teks']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pembeli" class="col-form-label">Nama Pembeli:</label>
                                                <input class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?= $u['nama_pembeli']; ?>" required>
                                            </div>

                                            <p>Gambar Pembeli</p>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <img src="/img/<?= $u['image_pembeli']; ?>" class="img-thumbnail img-preview">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image_pembeli')) ? 'is-invalid' : ''; ?>" id="image_pembeli" name="image_pembeli" onchange="previewEdit()">
                                                        <label class="custom-file-label" for="image_pembeli"><?= $u['image_pembeli']; ?></label>
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
        const image = document.querySelector('#image_pembeli');
        const imageLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imageLabel.textContent = image_pembeli.files[0].name;

        const fileimage = new FileReader();
        fileimage.readAsDataURL(image.files[0]);

        fileimage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    function previewEdit() {
        const image2 = document.querySelector('#image_pembeli');
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
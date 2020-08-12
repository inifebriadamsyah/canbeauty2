<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Hero Area | Beranda
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
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Tambah Hero Carousel Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="hero/save" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="judul" class="col-form-label">Judul:</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="button" class="col-form-label">Button:</label>
                                    <input type="text" class="form-control" id="button" name="button" required>
                                </div>

                                <p>Background</p>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <img src="/asset_main/sval/images/slide3.jpeg" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('background')) ? 'is-invalid' : ''; ?>" id="background" name="background" onchange="previewImg()">
                                            <label class="custom-file-label" for="background">Choose file</label>
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
                        <th scope="col">Judul</th>
                        <th scope="col" style="width: 30%;">Deskripsi</th>
                        <th scope="col">Button</th>
                        <th scope="col">Background</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($hero as $h) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td><?= $h['judul']; ?></td>
                            <td><?= $h['deskripsi']; ?></td>
                            <td><?= $h['button']; ?></td>
                            <td><?= $h['background']; ?></td>
                            <td>
                                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#editContent<?= $h['id']; ?>" class="btn btn-warning"> Edit </a>
                                <a href="/hero/delete/<?= $h['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus baris ini?');"> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php foreach ($hero as $h) : ?>
                        <div class="modal fade" id="editContent<?= $h['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Hero Carousel Area</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="hero/update/<?= $h['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="oldBackground" , value="<?= $h['background']; ?>">
                                            <div class="form-group">
                                                <label for="judul" class="col-form-label">Judul:</label>
                                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $h['judul']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                                                <input class="form-control" id="deskripsi" name="deskripsi" value="<?= $h['deskripsi']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="button" class="col-form-label">Button:</label>
                                                <input type="text" class="form-control" id="button" name="button" value="<?= $h['button']; ?>" required>
                                            </div>

                                            <p>Background</p>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <img src="/img/<?= $h['background']; ?>" class="img-thumbnail img-preview" id="editImage">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('background')) ? 'is-invalid' : ''; ?>" id="background" name="background" value="<?= $h['background']; ?>" onchange="previewEdit()">
                                                        <div class="inavlid-feedback">
                                                            <?= $validation->getError('background') ?>
                                                        </div>
                                                        <label class="custom-file-label" for="background" id="backgroundLabel"><?= $h['background']; ?></label>
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
<script>
    function previewImg() {
        const background = document.querySelector('#background');
        const backgroundLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        backgroundLabel.textContent = background.files[0].name;

        const fileBackground = new FileReader();
        fileBackground.readAsDataURL(background.files[0]);

        fileBackground.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    function previewEdit() {
        const background = document.querySelector('#background');
        const backgroundLabel = document.querySelector('#backgroundLabel');
        const imgPreview = document.querySelector('#editImage');

        backgroundLabel.textContent = background.files[0].name;

        const fileBackground = new FileReader();
        fileBackground.readAsDataURL(background.files[0]);

        fileBackground.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    function previewImgPaket() {
        const background = document.querySelector('#image');
        const backgroundLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        backgroundLabel.textContent = background.files[0].name;

        const fileBackground = new FileReader();
        fileBackground.readAsDataURL(background.files[0]);

        fileBackground.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>
<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Profil Perusahaan
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
    <div class="col-12">
        <div class="card my-2 mx-4 overflow-auto">
            <!--
            <div class="col-md-4">
                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#createTugas" class="btn btn-success mb-3 my-3"> + Tambah Konten </a>
            </div>
            -->
            <table class="table my-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sub Title</th>
                        <th scope="col">Deskripsi Sub Title</th>
                        <th scope="col">Deskripsi Sub Title 2</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($profile as $p) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td><?= $p['sub_title']; ?></td>
                            <td><?= $p['2nd_desc']; ?></td>
                            <td><?= $p['3nd_desc']; ?></td>
                            <td><?= $p['image']; ?></td>
                            <td>
                                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#editContent<?= $p['id']; ?>" class="btn btn-warning"> Edit </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($profile as $p) : ?>
                        <div class="modal fade" id="editContent<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Data Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="profile/update/<?= $p['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="oldimage" , value="<?= $p['image']; ?>">
                                            <div class="form-group">
                                                <label for="sub_title" class="col-form-label">Sub Title Profile</label>
                                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?= $p['sub_title']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="2nd_desc" class="col-form-label">Deskripsi Sub Title:</label>
                                                <input class="form-control" id="2nd_desc" name="2nd_desc" value="<?= $p['2nd_desc']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="3nd_desc" class="col-form-label">Deskripsi Sub Title 2:</label>
                                                <input type="text" class="form-control" id="3nd_desc" name="3nd_desc" value="<?= $p['3nd_desc']; ?>" required>
                                            </div>

                                            <p>Image</p>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <img src="/img/<?= $p['image']; ?>" class="img-thumbnail img-preview" id="editImage">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" value="<?= $p['image']; ?>" onchange="previewEdit()">
                                                        <div class="inavlid-feedback">
                                                            <?= $validation->getError('image') ?>
                                                        </div>
                                                        <label class="custom-file-label" for="image" id="imageLabel"><?= $p['image']; ?></label>
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
        const imageLabel = document.querySelector('#imageLabel');
        const imgPreview = document.querySelector('#editImage');

        imageLabel.textContent = image2.files[0].name;

        const fileimage = new FileReader();
        fileimage.readAsDataURL(image2.files[0]);

        fileimage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>
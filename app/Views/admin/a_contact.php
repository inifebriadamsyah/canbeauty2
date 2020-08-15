<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Kontak Perusahaan
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
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Link Alamat</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Link WhatsApp</th>
                        <th scope="col">Facebook</th>
                        <th scope="col">Link Facebook</th>
                        <th scope="col">Instagram</th>
                        <th scope="col">Link Instagram</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kontak as $k) : ?>
                        <tr>
                            <th scope="row"> <?= $i++; ?> </th>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['alamat_link']; ?></td>
                            <td><?= $k['whatsapp']; ?></td>
                            <td><?= $k['whatsapp_link']; ?></td>
                            <td><?= $k['facebook']; ?></td>
                            <td><?= $k['facebook_link']; ?></td>
                            <td><?= $k['instagram']; ?></td>
                            <td><?= $k['instagram_link']; ?></td>
                            <td>
                                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#editContent<?= $k['id']; ?>" class="btn btn-warning"> Edit </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($kontak as $k) : ?>
                        <div class="modal fade" id="editContent<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Paket Penjualan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="kontak/update/<?= $k['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $k['alamat']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_link" class="col-form-label">Link Alamat</label>
                                                <input type="text" class="form-control" id="alamat_link" name="alamat_link" value="<?= $k['alamat_link']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="whatsapp" class="col-form-label">WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= $k['whatsapp']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="whatsapp_link" class="col-form-label">WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" value="<?= $k['whatsapp_link']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook" class="col-form-label">Facebook</label>
                                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $k['facebook']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook_link" class="col-form-label">Facebook Link</label>
                                                <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="<?= $k['facebook_link']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram" class="col-form-label">Instagram</label>
                                                <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $k['instagram']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram_link" class="col-form-label">Instagram Link</label>
                                                <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="<?= $k['instagram_link']; ?>" required>
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
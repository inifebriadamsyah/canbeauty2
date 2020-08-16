<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800" style="font-weight: 700;">
            Footer Area
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
        <div class="card my-2 mx-4 overflow-auto">

            <div class="modal fade" id="createTugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Footer Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Footer Text:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Link Facebook:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Link Instagram:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Format Pengumpulan
                                        File</label>
                                    <select name="ctl00$MainContent$ddltipe" id="MainContent_ddltipe" class="form-control form-control-rounded" required="required">
                                        <option value="Please Select">Please Select</option>
                                        <option value="LAPORAN">Dokumen (PDF/Doc/xlx)</option>
                                        <option value="LAPORAN">Gambar (PNG/JPG)</option>
                                        <option value="ABSENSI">Video</option>

                                    </select>
                                </div>
                                -->

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Footer Text</th>
                        <th scope="col" style="width: 8%;">Link Facebook</th>
                        <th scope="col" style="width: 8%;">Link Instagram</th>
                        <th scope="col" style="width: 8%;">Link WhatsApp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($footer as $f) : ?>
                        <tr>
                            <th scope="row">
                                <?= $i++; ?>
                            </th>
                            <td><?= $f['footer_text']; ?></td>
                            <td><?= $f['facebook']; ?></td>
                            <td><?= $f['instagram']; ?></td>
                            <td><?= $f['whatsapp']; ?></td>
                            <td>
                                <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#editContent<?= $f['id']; ?>" class="btn btn-warning"> Edit </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($footer as $f) : ?>
                        <div class="modal fade" id="editContent<?= $f['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Edit Paket Penjualan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="footer/update/<?= $f['id']; ?>" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="footer_text" class="col-form-label">Footer Text</label>
                                                <input type="text" class="form-control" id="footer_text" name="footer_text" value="<?= $f['footer_text']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="facebook" class="col-form-label">Link Facebook</label>
                                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $f['facebook']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram" class="col-form-label">Link Instagram</label>
                                                <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $f['instagram']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="whatsapp" class="col-form-label">Link WhatsApp</label>
                                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= $f['whatsapp']; ?>" required>
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